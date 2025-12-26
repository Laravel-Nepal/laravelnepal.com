<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\SkipExcluded;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

#[ScopedBy(SkipExcluded::class)]
final class Author extends Model
{
    use Orbital;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('name');
        $blueprint->string('username');
        $blueprint->string('email')->nullable();
        $blueprint->string('linkedin')->nullable();
        $blueprint->string('github')->nullable();
        $blueprint->string('x')->nullable();
        $blueprint->string('website')->nullable();
        $blueprint->string('bio')->nullable();
    }

    public function getKeyName(): string
    {
        return 'username';
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    /** @return HasMany<Tip, $this> */
    public function tips(): HasMany
    {
        return $this->hasMany(Tip::class, 'author_username', 'username');
    }

    /** @return HasMany<Package, $this> */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class, 'author_username', 'username');
    }

    /** @return HasMany<Project, $this> */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'author_username', 'username');
    }

    /**
     * @return Attribute<string, null>
     */
    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $imageDirectory = sprintf('storage/images/profile/%s.avif', $this->username);

                if (file_exists(public_path($imageDirectory))) {
                    return asset($imageDirectory);
                }

                /** @var string $email */
                $email = $this->getAttribute('email');
                /** @var string $email */
                $name = $this->getAttribute('name');

                if (filled($email)) {
                    $emailHash = md5(mb_strtolower(trim($email)));

                    return sprintf('https://www.gravatar.com/avatar/%s?s=128&d=identicon', $emailHash);
                }

                $nameIsValid = filled($name) && is_string($name);
                /** @phpstan-var string $name */
                $name = $nameIsValid ? $name : 'Laravel Nepal';

                return 'https://ui-avatars.com/api/?name='.urlencode($name).'&size=128';
            },
        )->withoutObjectCaching();
    }
}

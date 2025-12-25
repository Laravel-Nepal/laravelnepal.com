<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\SkipExcluded;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
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

    public function getIncrementing(): bool
    {
        return false;
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: function (): string {
                $imageDirectory = sprintf('storage/images/profile/%s.avif', $this->username);

                if (file_exists(public_path($imageDirectory))) {
                    return asset($imageDirectory);
                }

                if (filled($this->email)) {
                    $emailHash = md5(mb_strtolower(trim($this->email)));

                    return sprintf('https://www.gravatar.com/avatar/%s?s=128&d=identicon', $emailHash);
                }

                return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&size=128';
            },
        );
    }
}

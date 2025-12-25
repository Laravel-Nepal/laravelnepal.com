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
/**
 * @property string $name
 * @property string $username
 * @property string|null $email
 * @property string|null $linkedin
 * @property string|null $github
 * @property string|null $x
 * @property string|null $website
 * @property string|null $bio
 * @property string|null $content
 * @property int $excluded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $avatar
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereGithub($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereLinkedin($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Author whereX($value)
 *
 * @mixin \Eloquent
 */
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

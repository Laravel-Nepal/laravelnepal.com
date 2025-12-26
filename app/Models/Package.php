<?php

namespace App\Models;

use AchyutN\LaravelHelpers\Traits\HasTheSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

final class Package extends Model
{
    use Orbital;
    use HasTheSlug;

    protected string $sluggableColumn = 'name';

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('name');
        $blueprint->string('slug')->nullable();
        $blueprint->string('author_username');
        $blueprint->string('github')->nullable();
        $blueprint->string('packagist')->nullable();
        $blueprint->json('tags');
    }

    public function getKeyName(): string
    {
        return 'slug';
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_username', 'username');
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}

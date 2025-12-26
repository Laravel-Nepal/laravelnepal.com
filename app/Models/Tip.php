<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Scopes\SkipExcluded;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $title
 * @property string $slug
 * @property string $author_username
 * @property string $date
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property int $excluded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class Tip extends Model
{
    use Orbital;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('title');
        $blueprint->string('slug');
        $blueprint->string('author_username');
        $blueprint->date('date');
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

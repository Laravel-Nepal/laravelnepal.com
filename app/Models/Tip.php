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
 * @property string $author
 * @property string $date
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property int $excluded
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|Tip newModelQuery()
 * @method static Builder<static>|Tip newQuery()
 * @method static Builder<static>|Tip query()
 * @method static Builder<static>|Tip whereAuthor($value)
 * @method static Builder<static>|Tip whereContent($value)
 * @method static Builder<static>|Tip whereCreatedAt($value)
 * @method static Builder<static>|Tip whereDate($value)
 * @method static Builder<static>|Tip whereExcluded($value)
 * @method static Builder<static>|Tip whereSlug($value)
 * @method static Builder<static>|Tip whereTags($value)
 * @method static Builder<static>|Tip whereTitle($value)
 * @method static Builder<static>|Tip whereUpdatedAt($value)
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

    public function getKeyName()
    {
        return 'slug';
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    /** @return BelongsTo<Author> */
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

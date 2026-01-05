<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Schemas\BlogSchema;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Models\Scopes\SkipExcluded;
use App\Traits\HasReadTime;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $title
 * @property string|null $slug
 * @property string $author_username
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $canonical_url
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property int $excluded
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read int $minutes_read
 * @property-read string $minutes_read_text
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCanonicalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereExcluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
final class Post extends Model implements HasMarkup
{
    use BlogSchema;
    use HasReadTime;
    use InteractsWithSEO;
    use Orbital;

    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('title');
        $blueprint->string('slug')->nullable();
        $blueprint->string('author_username');
        $blueprint->date('date');
        $blueprint->string('canonical_url')->nullable();
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

    public function authorValue(): ?string
    {
        return $this->author?->name;
    }

    public function authorUrlValue(): ?string
    {
        return route('page.artisan.view', $this->author);
    }

    public function publisherValue(): ?string
    {
        return config('app.name');
    }

    public function publisherUrlValue(): ?string
    {
        return route('page.landingPage');
    }

    public function urlValue(): ?string
    {
        return route('page.post.view', $this);
    }

    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Posts', route('page.post.index')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'date' => 'date',
        ];
    }
}

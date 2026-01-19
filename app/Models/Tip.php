<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use AchyutN\LaravelSEO\Data\Breadcrumb;
use AchyutN\LaravelSEO\Traits\InteractsWithSEO;
use App\Contracts\Contentable;
use App\Models\Scopes\SkipExcluded;
use App\Schemas\PostSchema;
use App\Traits\HasReadTime;
use App\Traits\IsContent;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $title
 * @property string $slug
 * @property string $author_username
 * @property \Illuminate\Support\Carbon $date
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read int $minutes_read
 * @property-read string $minutes_read_text
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read int $total_views
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tip withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Tip extends Model implements Contentable, HasMarkup, Viewable
{
    use HasReadTime;
    use InteractsWithSEO;
    use InteractsWithViews;
    use IsContent;
    use PostSchema;

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

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_username', 'username');
    }

    public function authorValue(): ?string
    {
        /** @phpstan-var string|null */
        return $this->author?->getAttribute('name');
    }

    public function authorUrlValue(): string
    {
        return route('page.artisan.view', $this->author);
    }

    public function publisherValue(): ?string
    {
        /** @phpstan-var string|null */
        return config('app.name');
    }

    public function publisherUrlValue(): string
    {
        return route('page.landingPage');
    }

    public function urlValue(): string
    {
        return route('page.tips.view', $this);
    }

    public function categoryValue(): string
    {
        return 'Tips';
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Tips', route('page.tips.index')),
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

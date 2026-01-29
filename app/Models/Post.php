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
use App\Traits\IsOrbital;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Schema\Blueprint;
use Throwable;

#[ScopedBy(SkipExcluded::class)]
/**
 * @property string $title
 * @property string|null $slug
 * @property string $author_username
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $canonical_url
 * @property array<array-key, mixed> $tags
 * @property string|null $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read bool $is_news
 * @property-read bool $is_submitted_to_laravel_news
 * @property-read int $minutes_read
 * @property-read string $minutes_read_text
 * @property-read News|null $news
 * @property-read \AchyutN\LaravelSEO\Models\SEO|null $seo
 * @property-read Seriesable|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Series> $series
 * @property-read int|null $series_count
 * @property-read LaravelNewsSubmission|null $submission
 * @property-read int $total_views
 * @property-read int $total_votes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \CyrildeWit\EloquentViewable\View> $views
 * @property-read int|null $views_count
 * @property-read bool $voted
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post orderByViews(string $direction = 'desc', ?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post submissions()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereAuthorUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCanonicalUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Post withViewsCount(?\CyrildeWit\EloquentViewable\Support\Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Post extends Model implements Contentable, HasMarkup, Viewable
{
    use HasReadTime;
    use InteractsWithSEO;
    use InteractsWithViews;
    use IsContent;
    use PostSchema;
    use IsOrbital;

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
        return route('page.post.view', $this);
    }

    public function categoryValue(): string
    {
        return $this->is_news ? 'News' : 'Blog';
    }

    /** @return array<Breadcrumb> */
    public function breadcrumbs(): array
    {
        return [
            new Breadcrumb('Home', route('page.landingPage')),
            new Breadcrumb('Posts', route('page.post.index')),
            new Breadcrumb($this->getTitleValue(), $this->getURLValue()),
        ];
    }

    public function makeNews(): bool
    {
        try {
            News::on('mysql')
                ->create([
                    'post_slug' => $this->slug,
                ]);
            cache()->forget('post:is_news:'.$this->slug);

            return true;
        } catch (Throwable) {
            return false;
        }
    }

    /** @return HasOne<News, $this> */
    public function news(): HasOne
    {
        return $this->hasOne(News::class, 'post_slug', 'slug');
    }

    /** @return MorphToMany<Series, $this> */
    public function series(): MorphToMany
    {
        return $this->morphToMany(Series::class, 'seriesable')
            ->using(Seriesable::class)
            ->withPivot('order')
            ->orderBy('pivot_order');
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'date' => 'date',
        ];
    }

    /** @return Attribute<bool, null> */
    protected function isNews(): Attribute
    {
        return Attribute::make(
            get: fn (): bool => cache()
                ->rememberForever(
                    'post:is_news:'.$this->slug,
                    fn (): bool => $this->news()->exists(),
                ),
        );
    }
}

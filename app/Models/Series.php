<?php

declare(strict_types=1);

namespace App\Models;

use CyrildeWit\EloquentViewable\Support\Period;
use AchyutN\LaravelHelpers\Traits\HasTheSlug;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $author_id
 * @property string|null $description
 * @property array<array-key, mixed>|null $tags
 * @property Carbon|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Author|null $author
 * @property-read int $post_count
 * @property-read Collection $post_list
 * @property-read Seriesable|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Post> $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, View> $views
 * @property-read int|null $views_count
 *
 * @method static Builder<static>|Series findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder<static>|Series newModelQuery()
 * @method static Builder<static>|Series newQuery()
 * @method static Builder<static>|Series orderByUniqueViews(string $direction = 'desc', $period = null, ?string $collection = null, string $as = 'unique_views_count')
 * @method static Builder<static>|Series orderByViews(string $direction = 'desc', ?Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 * @method static Builder<static>|Series query()
 * @method static Builder<static>|Series whereAuthorId($value)
 * @method static Builder<static>|Series whereCreatedAt($value)
 * @method static Builder<static>|Series whereDescription($value)
 * @method static Builder<static>|Series whereId($value)
 * @method static Builder<static>|Series wherePublishedAt($value)
 * @method static Builder<static>|Series whereSlug($value)
 * @method static Builder<static>|Series whereTags($value)
 * @method static Builder<static>|Series whereTitle($value)
 * @method static Builder<static>|Series whereUpdatedAt($value)
 * @method static Builder<static>|Series withUniqueSlugConstraints(Model $model, string $attribute, array $config, string $slug)
 * @method static Builder<static>|Series withViewsCount(?Period $period = null, ?string $collection = null, bool $unique = false, string $as = 'views_count')
 *
 * @mixin \Eloquent
 */
final class Series extends Model implements Viewable
{
    use HasTheSlug;
    use InteractsWithViews;

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    /** @return MorphToMany<Post, $this> */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'seriesable')
            ->using(Seriesable::class)
            ->withPivot('order')
            ->orderBy('pivot_order');
    }

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    /** @return Attribute<Collection<int, Post>, null> */
    protected function postList(): Attribute
    {
        return Attribute::make(
            get: fn (): Collection => Post::on('orbit')
                ->whereIn(
                    'slug',
                    Seriesable::query()->where('series_id', $this->id)
                        ->where('seriesable_type', Post::class)
                        ->pluck('seriesable_id')
                )
                ->orderBy('order')
                ->get(),
        );
    }

    /** @return Attribute<int, null> */
    protected function postCount(): Attribute
    {
        return Attribute::make(
            get: fn (): int => Seriesable::query()
                ->where('series_id', $this->id)
                ->where('seriesable_type', Post::class)
                ->count(),
        );
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
            'published_at' => 'datetime',
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use AchyutN\LaravelHelpers\Traits\HasTheSlug;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use DB;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

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

    /** @return Attribute<Collection<int, Post>, null> */
    public function postList(): Attribute
    {
        return Attribute::make(
            get: fn (): Collection => Post::on('orbit')
                ->whereIn(
                    'slug',
                    Seriesable::where('series_id', $this->id)
                        ->where('seriesable_type', Post::class)
                        ->pluck('seriesable_id')
                )
                ->orderBy('order')
                ->get(),
        );
    }

    /** @return Attribute<int, null> */
    public function postCount(): Attribute
    {
        return Attribute::make(
            get: fn (): int => Seriesable::query()
                ->where('series_id', $this->id)
                ->where('seriesable_type', Post::class)
                ->count(),
        );
    }

    /** @return BelongsTo<Author, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

final class Series extends Model
{
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
        return $this->belongsTo(Author::class);
    }
}

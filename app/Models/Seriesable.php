<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class Seriesable extends MorphPivot
{
    protected $table = 'seriesables';

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    /** @return BelongsTo<Series, $this> */
    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    // @phpstan-ignore-next-line
    /** @return MorphTo */
    public function seriesable(): MorphTo
    {
        return $this->morphTo();
    }
}

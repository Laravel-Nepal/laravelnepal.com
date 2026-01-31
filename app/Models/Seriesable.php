<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $series_id
 * @property string $seriesable_type
 * @property string $seriesable_id
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Series $series
 * @property-read Model|Eloquent $seriesable
 *
 * @method static Builder<static>|Seriesable newModelQuery()
 * @method static Builder<static>|Seriesable newQuery()
 * @method static Builder<static>|Seriesable query()
 * @method static Builder<static>|Seriesable whereCreatedAt($value)
 * @method static Builder<static>|Seriesable whereId($value)
 * @method static Builder<static>|Seriesable whereOrder($value)
 * @method static Builder<static>|Seriesable whereSeriesId($value)
 * @method static Builder<static>|Seriesable whereSeriesableId($value)
 * @method static Builder<static>|Seriesable whereSeriesableType($value)
 * @method static Builder<static>|Seriesable whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
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
    public function seriesable(): MorphTo
    {
        return $this->morphTo();
    }
}

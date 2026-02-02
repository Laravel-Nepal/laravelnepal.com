<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class Vote extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    // @phpstan-ignore-next-line
    public function votable(): MorphTo
    {
        return $this->morphTo('votable');
    }

    /** @return BelongsTo<Guest, $this> */
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'visitor', 'visitor_id');
    }
}

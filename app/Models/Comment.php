<?php

declare(strict_types=1);

namespace App\Models;

use App\Contracts\Votable;
use App\Traits\CanBeVoted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Comment extends Model implements Votable
{
    use CanBeVoted;

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }

    /** @return BelongsTo<Guest, $this> */
    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class, 'visitor', 'visitor_id');
    }
}

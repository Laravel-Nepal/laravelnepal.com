<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Comment extends Model
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
}

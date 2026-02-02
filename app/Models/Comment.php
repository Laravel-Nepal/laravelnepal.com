<?php

namespace App\Models;

use App\Contracts\Votable;
use App\Traits\CanBeVoted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

final class Comment extends Model implements Votable
{
    use CanBeVoted;

    public function getConnectionName(): ?string
    {
        /** @var string|null */
        return config('database.default');
    }
}

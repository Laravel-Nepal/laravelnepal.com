<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

final class LaravelNewsSubmission extends Model
{
    public function submittable(): MorphTo
    {
        return $this->morphTo('submittable');
    }
}

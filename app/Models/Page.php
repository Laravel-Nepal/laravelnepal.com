<?php

namespace App\Models;

use AchyutN\LaravelHelpers\Traits\HasTheSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class Page extends Model
{
    use HasTheSlug;
    use SoftDeletes;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}

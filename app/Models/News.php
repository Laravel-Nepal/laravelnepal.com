<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

final class News extends Model
{
    use SoftDeletes;

    public function post(): Post
    {
        return cache()->rememberForever(
            'news:post_'.$this->post_slug,
            fn () => Post::query()
                ->where('slug', $this->post_slug)
                ->firstOrFail()
        );
    }
}

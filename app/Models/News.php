<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static Builder<static>|News newModelQuery()
 * @method static Builder<static>|News newQuery()
 * @method static Builder<static>|News onlyTrashed()
 * @method static Builder<static>|News query()
 * @method static Builder<static>|News withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|News withoutTrashed()
 *
 * @mixin \Eloquent
 */
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

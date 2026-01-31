<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $votable_type
 * @property string $votable_id
 * @property string $visitor
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $votable
 *
 * @method static Builder<static>|Vote newModelQuery()
 * @method static Builder<static>|Vote newQuery()
 * @method static Builder<static>|Vote query()
 * @method static Builder<static>|Vote whereCreatedAt($value)
 * @method static Builder<static>|Vote whereId($value)
 * @method static Builder<static>|Vote whereUpdatedAt($value)
 * @method static Builder<static>|Vote whereVisitor($value)
 * @method static Builder<static>|Vote whereVotableId($value)
 * @method static Builder<static>|Vote whereVotableType($value)
 *
 * @mixin Eloquent
 */
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
}

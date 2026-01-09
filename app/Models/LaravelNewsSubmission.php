<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $submittable_id
 * @property string $submittable_type
 * @property int $response_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|Eloquent $submittable
 *
 * @method static Builder<static>|LaravelNewsSubmission newModelQuery()
 * @method static Builder<static>|LaravelNewsSubmission newQuery()
 * @method static Builder<static>|LaravelNewsSubmission query()
 * @method static Builder<static>|LaravelNewsSubmission whereCreatedAt($value)
 * @method static Builder<static>|LaravelNewsSubmission whereId($value)
 * @method static Builder<static>|LaravelNewsSubmission whereResponseId($value)
 * @method static Builder<static>|LaravelNewsSubmission whereSubmittableId($value)
 * @method static Builder<static>|LaravelNewsSubmission whereSubmittableType($value)
 * @method static Builder<static>|LaravelNewsSubmission whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
final class LaravelNewsSubmission extends Model
{
    public function submittable(): MorphTo
    {
        return $this->morphTo('submittable');
    }
}

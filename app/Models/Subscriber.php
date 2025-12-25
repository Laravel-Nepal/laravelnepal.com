<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $email
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $unsubscribed_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder<static>|Subscriber newModelQuery()
 * @method static Builder<static>|Subscriber newQuery()
 * @method static Builder<static>|Subscriber query()
 * @method static Builder<static>|Subscriber whereCreatedAt($value)
 * @method static Builder<static>|Subscriber whereEmail($value)
 * @method static Builder<static>|Subscriber whereId($value)
 * @method static Builder<static>|Subscriber whereIpAddress($value)
 * @method static Builder<static>|Subscriber whereUnsubscribedAt($value)
 * @method static Builder<static>|Subscriber whereUpdatedAt($value)
 * @method static Builder<static>|Subscriber whereUserAgent($value)
 *
 * @mixin \Eloquent
 */
final class Subscriber extends Model
{
    //
}

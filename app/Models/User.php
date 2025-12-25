<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserRole;
use App\Models\Scopes\LowerRoleOnly;
use Awcodes\Gravatar\Gravatar;
use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[ScopedBy(LowerRoleOnly::class)]
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property UserRole $role
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $avatar
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 *
 * @method static UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User onlyTrashed()
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereRole($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|User withoutTrashed()
 *
 * @mixin \Eloquent
 */
final class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        // Update this method to control access to the Filament panel.
        // Here, we allow access only to users with the Developer or Admin role.
        return in_array($this->role, [
            UserRole::Admin,
            UserRole::Maintainer,
        ]);
    }

    /** @return array<int, UserRole> */
    public function lowerRoles(): array
    {
        if (! auth()->user() instanceof self) {
            return [];
        }

        return match (auth()->user()->role) {
            UserRole::Admin => [UserRole::Admin, UserRole::Maintainer, UserRole::User],
            UserRole::Maintainer => [UserRole::Maintainer, UserRole::User],
            UserRole::User => [UserRole::User],
            default => [],
        };
    }

    public function isLowerInRole(): bool
    {
        if (! auth()->user() instanceof self) {
            return false;
        }

        if (auth()->user()->role === UserRole::Admin) {
            return true;
        }

        return in_array($this->role, auth()->user()->lowerRoles());
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }

    /**
     * @return Attribute<string, null>
     */
    protected function avatar(): Attribute
    {
        $gravatar = Gravatar::get(
            email: $this->email,
            size: 200,
            default: 'initials'
        );

        return Attribute::make(
            get: fn (): string => $gravatar,
        );
    }
}

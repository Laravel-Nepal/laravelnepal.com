<?php

declare(strict_types=1);

use App\Enums\UserRole;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('returns correct lowerRoles for Admin', function (): void {
    /** @var User $admin */
    $admin = User::factory()->make(['role' => UserRole::Admin]);
    actingAs($admin);

    expect($admin->lowerRoles())->toBe([
        UserRole::Admin,
        UserRole::Maintainer,
        UserRole::User,
    ]);
});

test('admin can see another admins as lower in role', function (): void {
    /** @var User $admin1 */
    $admin1 = User::factory()->make(['role' => UserRole::Admin]);
    actingAs($admin1);

    /** @var User $admin2 */
    $admin2 = User::factory()->make(['role' => UserRole::Admin]);

    expect($admin2->isLowerInRole())->toBeTrue();
});

test('maintainer and user does not see admin as lower in role', function (): void {
    $target = User::factory()->make(['role' => UserRole::Admin]);

    /** @var User $maintainer */
    $maintainer = User::factory()->make(['role' => UserRole::Maintainer]);
    actingAs($maintainer);

    expect($target->isLowerInRole())->toBeFalse();

    /** @var User $user */
    $user = User::factory()->make(['role' => UserRole::User]);
    actingAs($user);

    expect($target->isLowerInRole())->toBeFalse();
});

it('can access filament panel after logging in', function (): void {
    $filamentPanel = filament()->getPanel('admin');

    /** @var User $user */
    $user = User::factory()->make(['role' => UserRole::Admin]);

    expect($user->canAccessPanel($filamentPanel))->toBeTrue();
});

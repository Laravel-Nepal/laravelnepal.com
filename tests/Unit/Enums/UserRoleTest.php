<?php

declare(strict_types=1);

use App\Enums\UserRole;
use Filament\Support\Colors\Color;

describe('label', function (): void {
    it('returns correct label for each role', function (UserRole $userRole, string $expectedLabel): void {
        expect($userRole->getLabel())->toBe($expectedLabel);
    })->with([
        [UserRole::Maintainer, 'Maintainer'],
        [UserRole::Admin, 'Admin'],
        [UserRole::User, 'User'],
    ]);
});

describe('color', function (): void {
    it('returns correct color for each role', function (UserRole $userRole, Color|array $expectedColor): void {
        expect($userRole->getColor())->toBe($expectedColor);
    })->with([
        [UserRole::Admin, Color::Red],
        [UserRole::Maintainer, Color::Blue],
        [UserRole::User, Color::Green],
    ]);
});

describe('value', function (): void {
    it('has expected string values', function (UserRole $userRole, string $expectedValue): void {
        expect($userRole->value)->toBe($expectedValue);
    })->with([
        [UserRole::Maintainer, 'maintainer'],
        [UserRole::Admin, 'admin'],
        [UserRole::User, 'user'],
    ]);
});

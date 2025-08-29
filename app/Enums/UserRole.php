<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum UserRole: string implements HasColor, HasLabel
{
    case Admin = 'admin';
    case Maintainer = 'maintainer';
    case User = 'user';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::Maintainer => 'Maintainer',
            self::User => 'User',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Admin => Color::Red,
            self::Maintainer => Color::Blue,
            self::User => Color::Green,
        };
    }
}

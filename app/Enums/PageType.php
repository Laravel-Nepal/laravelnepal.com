<?php

declare(strict_types=1);

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;
use Illuminate\Contracts\Support\Htmlable;

enum PageType: string implements HasColor, HasLabel
{
    case LandingPage = 'landing_page';
    case IndexPage = 'index_page';
    case ContentPage = 'content_page';
    case PageWithForm = 'page_with_form';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::LandingPage => Color::Green,
            self::IndexPage => Color::Blue,
            self::ContentPage => Color::Gray,
            self::PageWithForm => Color::Yellow,
        };
    }

    public function getLabel(): string|Htmlable|null
    {
        return match ($this) {
            self::LandingPage => 'Landing Page',
            self::IndexPage => 'Index Page',
            self::ContentPage => 'Content Page',
            self::PageWithForm => 'Page with Form',
        };
    }
}

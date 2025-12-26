<?php

declare(strict_types=1);

namespace App\Filament\Schemas;

use App\Filament\Resources\Authors\AuthorResource;
use Closure;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Contracts\Support\Htmlable;
use Override;

final class AuthorRelation
{
    public static function make(
        string|array|Htmlable|Closure|null $heading = 'Author',
        string|array|Htmlable|Closure|null $description = 'Details about the author',
        string $relationship = 'author',
        bool $aside = true,
    ): Section {
        return Section::make($heading)
            ->description($description)
            ->schema([
                ImageEntry::make('avatar')
                    ->columnSpanFull()
                    ->circular()
                    ->placeholder('N/A')
                    ->hiddenLabel(),
                TextEntry::make('bio')
                    ->columnSpanFull()
                    ->weight(FontWeight::Bold)
                    ->size(TextSize::Large)
                    ->placeholder('N/A')
                    ->hiddenLabel(),
                TextEntry::make('name')
                    ->placeholder('N/A'),
                TextEntry::make('username')
                    ->url(fn (string $state): string => AuthorResource::getUrl('view', ['record' => $state]))
                    ->placeholder('N/A'),
                TextEntry::make('email')
                    ->url(fn (string $state): string => 'mailto:'.$state)
                    ->placeholder('N/A'),
            ])
            ->columns()
            ->columnSpanFull()
            ->relationship($relationship)
            ->aside($aside);
    }
}

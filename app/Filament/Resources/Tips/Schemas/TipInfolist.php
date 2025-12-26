<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips\Schemas;

use App\Filament\Resources\Authors\AuthorResource;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

final class TipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('About')
                    ->description('Basic tip information')
                    ->columns()
                    ->columnSpanFull()
                    ->aside()
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('date')
                            ->label('Published at')
                            ->date(),
                        TextEntry::make('tags')
                            ->columnSpanFull()
                            ->badge(),
                    ]),
                Section::make('Content')
                    ->description('The tip content')
                    ->columns()
                    ->columnSpanFull()
                    ->aside()
                    ->components([
                        TextEntry::make('content')
                            ->hiddenLabel()
                            ->placeholder('-')
                            ->markdown()
                            ->columnSpanFull(),
                    ]),
                Section::make('Author')
                    ->description('Details about the author')
                    ->relationship('author')
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
                    ->aside(),
            ]);
    }
}

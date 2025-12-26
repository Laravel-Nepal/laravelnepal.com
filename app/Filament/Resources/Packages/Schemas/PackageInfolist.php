<?php

declare(strict_types=1);

namespace App\Filament\Resources\Packages\Schemas;

use App\Filament\Resources\Authors\AuthorResource;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

final class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('About')
                    ->description('Basic package information')
                    ->columns()
                    ->columnSpanFull()
                    ->aside()
                    ->components([
                        TextEntry::make('name'),
                        TextEntry::make('tags')
                            ->badge(),
                        TextEntry::make('github')
                            ->url(fn (string $state): string => 'https://github.com/'.$state)
                            ->openUrlInNewTab()
                            ->placeholder('-'),
                        TextEntry::make('packagist')
                            ->url(fn (string $state): string => 'https://packagist.org/packages/'.$state)
                            ->openUrlInNewTab()
                            ->placeholder('-'),
                    ]),
                Section::make('Content')
                    ->description('The package content')
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

<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Schemas\AuthorRelation;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PostInfolist
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
                        TextEntry::make('title'),
                        TextEntry::make('date')
                            ->date(),
                        TextEntry::make('canonical_url')
                            ->label('Canonical URL')
                            ->url(fn (string $state): string => $state)
                            ->openUrlInNewTab()
                            ->columnSpanFull()
                            ->placeholder('-'),
                        TextEntry::make('tags')
                            ->columnSpanFull()
                            ->badge(),
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
                AuthorRelation::make(),
            ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

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
                        TextEntry::make('slug'),
                        TextEntry::make('date')
                            ->label('Published at')
                            ->date(),
                        TextEntry::make('tags')
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
            ]);
    }
}

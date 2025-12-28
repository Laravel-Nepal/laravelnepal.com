<?php

declare(strict_types=1);

namespace App\Filament\Resources\Tips\Schemas;

use App\Filament\Schemas\AuthorRelation;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class TipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
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
                AuthorRelation::make(),
            ]);
    }
}

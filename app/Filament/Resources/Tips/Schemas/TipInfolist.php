<?php

namespace App\Filament\Resources\Tips\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TipInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns()
                    ->columnSpanFull()
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('author'),
                        TextEntry::make('date')
                            ->date(),
                        TextEntry::make('tags')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->placeholder('-')
                            ->markdown()
                            ->columnSpanFull(),
                        IconEntry::make('excluded')
                            ->boolean(),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}

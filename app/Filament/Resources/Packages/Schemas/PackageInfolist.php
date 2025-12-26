<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PackageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns()
                    ->columnSpanFull()
                    ->components([
                        TextEntry::make('name'),
                        TextEntry::make('slug')
                            ->placeholder('-'),
                        TextEntry::make('author_username'),
                        TextEntry::make('github')
                            ->placeholder('-'),
                        TextEntry::make('packagist')
                            ->placeholder('-'),
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

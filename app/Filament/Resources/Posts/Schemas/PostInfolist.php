<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PostInfolist
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
                        TextEntry::make('slug')
                            ->placeholder('-'),
                        TextEntry::make('author_username'),
                        TextEntry::make('date')
                            ->date(),
                        TextEntry::make('canonical_url')
                            ->placeholder('-'),
                        TextEntry::make('tags')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->placeholder('-')
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

<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\PageType;
use App\Models\Page;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageInfolist
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
                        TextEntry::make('type')
                            ->badge(),
                        TextEntry::make('name')
                            ->columnSpanFull()
                            ->visible(fn (Page $page) => in_array($page->type, [PageType::IndexPage, PageType::PageWithForm]))
                            ->label('Route Name'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->markdown()
                            ->visible(fn (Page $page) => $page->type === PageType::ContentPage)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

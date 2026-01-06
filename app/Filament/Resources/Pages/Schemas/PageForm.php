<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\PageType;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Select::make('type')
                    ->options(PageType::class)
                    ->default(PageType::ContentPage)
                    ->live()
                    ->required(),
                TextInput::make('name')
                    ->visible(fn (Get $get) => in_array($get('type'), [PageType::IndexPage, PageType::PageWithForm]))
                    ->columnSpanFull()
                    ->label('Route Name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                MarkdownEditor::make('content')
                    ->visible(fn (Get $get) => $get('type') === PageType::ContentPage)
                    ->columnSpanFull(),
            ]);
    }
}

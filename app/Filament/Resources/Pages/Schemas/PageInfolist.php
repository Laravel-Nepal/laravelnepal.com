<?php

declare(strict_types=1);

namespace App\Filament\Resources\Pages\Schemas;

use App\Enums\PageType;
use App\Models\Page;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;

final class PageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns()
                    ->columnSpanFull()
                    ->components([
                        TextEntry::make('title')
                            ->prefixAction(
                                Action::make('preview')
                                    ->color(Color::Green)
                                    ->visible(fn (Page $page): bool => $page->getURLValue() !== null)
                                    ->icon(Heroicon::ArrowTopRightOnSquare)
                                    ->url(fn (Page $page): ?string => $page->getURLValue())
                                    ->openUrlInNewTab()
                            ),
                        TextEntry::make('type')
                            ->badge(),
                        TextEntry::make('tags')
                            ->badge(),
                        TextEntry::make('name')
                            ->columnSpanFull()
                            ->visible(fn (Page $page): bool => in_array($page->type, [PageType::IndexPage, PageType::PageWithForm]))
                            ->label('Route Name'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->markdown()
                            ->visible(fn (Page $page): bool => $page->type === PageType::ContentPage)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}

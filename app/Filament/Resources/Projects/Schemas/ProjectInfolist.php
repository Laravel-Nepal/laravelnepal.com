<?php

declare(strict_types=1);

namespace App\Filament\Resources\Projects\Schemas;

use App\Filament\Schemas\AuthorRelation;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ProjectInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('About')
                    ->description('Basic project information')
                    ->columns()
                    ->columnSpanFull()
                    ->aside()
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('tags')
                            ->badge(),
                        TextEntry::make('github')
                            ->url(fn (string $state): string => 'https://github.com/'.$state)
                            ->openUrlInNewTab()
                            ->placeholder('-'),
                        TextEntry::make('website')
                            ->url(fn (string $state): string => $state)
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
                AuthorRelation::make(),
            ]);
    }
}

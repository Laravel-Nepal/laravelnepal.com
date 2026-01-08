<?php

declare(strict_types=1);

namespace App\Filament\Resources\Packages\Schemas;

use App\Filament\Schemas\AuthorRelation;
use App\Models\Package;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PackageInfolist
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
                        TextEntry::make('name'),
                        TextEntry::make('tags')
                            ->badge(),
                        TextEntry::make('github')
                            ->url(fn (Package $package): ?string => $package->github_url)
                            ->badge()
                            ->openUrlInNewTab()
                            ->placeholder('-'),
                        TextEntry::make('packagist')
                            ->url(fn (Package $package): ?string => $package->packagist_url)
                            ->badge()
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

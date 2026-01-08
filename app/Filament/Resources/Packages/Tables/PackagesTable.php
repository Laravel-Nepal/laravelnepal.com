<?php

declare(strict_types=1);

namespace App\Filament\Resources\Packages\Tables;

use App\Models\Package;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('github')
                    ->url(fn (Package $package): ?string => $package->github_url)
                    ->badge()
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('packagist')
                    ->url(fn (Package $package): ?string => $package->packagist_url)
                    ->badge()
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('total_views')
                    ->label('Views')
                    ->color(
                        fn (int $state): array => $state > 0 ? Color::Green : Color::Neutral
                    )
                    ->badge(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}

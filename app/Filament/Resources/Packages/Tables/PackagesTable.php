<?php

declare(strict_types=1);

namespace App\Filament\Resources\Packages\Tables;

use Filament\Actions\ViewAction;
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
                    ->url(fn (string $state): string => 'https://github.com/'.$state)
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('packagist')
                    ->url(fn (string $state): string => 'https://packagist.org/packages/'.$state)
                    ->openUrlInNewTab()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}

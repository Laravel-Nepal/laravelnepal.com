<?php

declare(strict_types=1);

namespace App\Filament\Resources\Authors\Tables;

use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class AuthorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->circular()
                    ->placeholder('N/A')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('username')
                    ->badge()
                    ->searchable(),
                TextColumn::make('website')
                    ->url(fn (string $state): string => str_starts_with($state, 'http') ? $state : 'https://'.$state)
                    ->openUrlInNewTab()
                    ->searchable(),
                TextColumn::make('bio')
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

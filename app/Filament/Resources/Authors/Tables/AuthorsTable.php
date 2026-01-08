<?php

declare(strict_types=1);

namespace App\Filament\Resources\Authors\Tables;

use App\Models\Author;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
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
                    ->url(fn (Author $author): string => $author->getURLValue())
                    ->badge()
                    ->searchable(),
                TextColumn::make('bio')
                    ->wrap()
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

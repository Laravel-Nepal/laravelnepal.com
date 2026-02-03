<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts\Tables;

use App\Filament\Components\PreviewAction;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
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
            ->defaultSort('date', 'desc')
            ->recordActions([
                PreviewAction::make(),
                ViewAction::make(),
                EditAction::make(),
                Action::make('push-to-news')
                    ->label('Push to News')
                    ->color(Color::Green)
                    ->action(fn (Post $post): bool => $post->makeNews())
                    ->hidden(fn (Post $post): bool => $post->is_news)
                    ->requiresConfirmation()
                    ->successNotificationTitle('Post pushed to News successfully!')
                    ->icon(Heroicon::ArrowUpTray),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

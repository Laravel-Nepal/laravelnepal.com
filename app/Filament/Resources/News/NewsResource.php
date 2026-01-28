<?php

declare(strict_types=1);

namespace App\Filament\Resources\News;

use App\Filament\Resources\News\Pages\ManageNews;
use App\Filament\Resources\Posts\PostResource;
use App\Models\News;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

final class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleStack;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|UnitEnum|null $navigationGroup = 'Content Management';

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('post.title'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (News $news): bool => $news->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('post.title')
                    ->url(fn (News $news): string => PostResource::getUrl('view', ['record' => $news->post]))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Published as News')
                    ->dateTimeTooltip()
                    ->since()
                    ->sortable(),
            ])
            ->recordActions([
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageNews::route('/'),
        ];
    }
}

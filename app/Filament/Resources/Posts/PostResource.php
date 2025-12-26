<?php

declare(strict_types=1);

namespace App\Filament\Resources\Posts;

use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Filament\Resources\Posts\Pages\ViewPost;
use App\Filament\Resources\Posts\Schemas\PostInfolist;
use App\Filament\Resources\Posts\Tables\PostsTable;
use App\Models\Post;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

final class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleStack;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $recordTitleAttribute = 'title';

    public static function infolist(Schema $schema): Schema
    {
        return PostInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PostsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPosts::route('/'),
            'view' => ViewPost::route('/{record}'),
        ];
    }
}

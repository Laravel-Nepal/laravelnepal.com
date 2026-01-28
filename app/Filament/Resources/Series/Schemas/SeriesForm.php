<?php

declare(strict_types=1);

namespace App\Filament\Resources\Series\Schemas;

use App\Models\Post;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

final class SeriesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->columnSpanFull()
                    ->required(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
                Select::make('seriesable_type')
                    ->label('Model')
                    ->options([
                        Post::class => 'Post',
                    ])
                    ->default(Post::class)
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Repeater::make('posts')
                    ->columnSpanFull()
                    ->simple(
                        Select::make('seriesable_id')
                            ->label('Post')
                            ->options(
                                Post::on('orbit')
                                    ->orderBy('title')
                                    ->pluck('title', 'slug')
                            )
                            ->required(),
                    ),
            ]);
    }
}

<?php

namespace App\Filament\Resources\Series\Schemas;

use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use Filament\Actions\Action;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class SeriesInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns()
                    ->columnSpanFull()
                    ->components([
                        TextEntry::make('title'),
                        TextEntry::make('author.name')
                            ->label('Author'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        RepeatableEntry::make('post_list')
                            ->label('Posts')
                            ->columns()
                            ->columnSpanFull()
                            ->contained(false)
                            ->components([
                                TextEntry::make('title')
                                    ->hiddenLabel()
                                    ->prefixActions([
                                        Action::make('preview')
                                            ->label('Preview')
                                            ->icon(Heroicon::ArrowTopRightOnSquare)
                                            ->url(fn (Post $post): string => $post->getURLValue())
                                            ->openUrlInNewTab(),
                                        Action::make('view')
                                            ->label('View (In Panel)')
                                            ->icon(Heroicon::Link)
                                            ->url(fn (Post $post): string => PostResource::getUrl('view', ['record' => $post]))
                                            ->openUrlInNewTab(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}

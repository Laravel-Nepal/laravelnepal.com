<?php

namespace App\Filament\Resources\Comments;

use AchyutN\LaravelSEO\Contracts\HasMarkup;
use App\Contracts\Contentable;
use App\Filament\Resources\Comments\Pages\ManageComments;
use App\Models\Comment;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder as Query;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleStack;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedRectangleStack;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('commentable')
                    ->formatStateUsing(fn (Comment $comment) => sprintf('%s (%s)', $comment->commentable->getTitleValue(), class_basename($comment->commentable))),
                TextEntry::make('guest.name')
                    ->label('Guest Name'),
                TextEntry::make('content')
                    ->markdown()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('commentable')
                    ->formatStateUsing(fn (Comment $comment) => sprintf('%s (%s)', $comment->commentable->getTitleValue(), class_basename($comment->commentable))),
                TextColumn::make('guest.name'),
                TextColumn::make('votes_count')
                    ->counts('votes')
                    ->badge()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('pending_only')
                    ->label('Pending Only')
                    ->toggle()
                    ->default()
                    ->baseQuery(
                        fn (Query $query) => $query->whereNull('viewed_at')
                    ),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                Action::make('mark_as_viewed')
                    ->label('Mark as Viewed')
                    ->icon(Heroicon::EyeSlash)
                    ->color(Color::Green)
                    ->action(function (Comment $comment) {
                        $comment->update(['viewed_at' => now()]);
                    })
                    ->visible(fn (Comment $comment) => $comment->viewed_at === null),
                ViewAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    BulkAction::make('mark_as_viewed')
                        ->label('Mark as Viewed')
                        ->icon(Heroicon::EyeSlash)
                        ->color(Color::Green)
                        ->action(function (Collection $records) {
                            $records->each(fn (Comment $comment) => $comment->update(['viewed_at' => now()]));
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageComments::route('/'),
        ];
    }
}

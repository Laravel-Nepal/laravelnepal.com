<?php

declare(strict_types=1);

namespace App\Filament\Resources\Series\Pages;

use App\Filament\Resources\Series\SeriesResource;
use App\Models\Post;
use App\Models\Series;
use App\Models\Seriesable;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

final class EditSeries extends EditRecord
{
    protected static string $resource = SeriesResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var Series $record */
        $record = $this->record;

        $data['seriesable_type'] = Post::class;

        $data['posts'] = $record->post_list->map(fn (Post $post) => $post->slug)->toArray();

        return $data;
    }

    /**
     * @param  Series  $record
     * @param  array{'title': string, 'author_id': string, 'description'?: string, 'tags'?: array<int, string>, 'seriesable_type': string, 'posts': array<int, string>}  $data
     */
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update([
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'description' => $data['description'] ?? null,
            'tags' => $data['tags'] ?? null,
        ]);

        Seriesable::query()
            ->where('series_id', $record->id)
            ->delete();

        foreach ($data['posts'] as $order => $postSlug) {
            Seriesable::query()->create([
                'series_id' => $record->id,
                'seriesable_type' => $data['seriesable_type'],
                'seriesable_id' => $postSlug,
                'order' => $order + 1,
            ]);
        }

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

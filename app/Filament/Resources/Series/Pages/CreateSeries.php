<?php

declare(strict_types=1);

namespace App\Filament\Resources\Series\Pages;

use App\Filament\Resources\Series\SeriesResource;
use App\Models\Series;
use App\Models\Seriesable;
use Filament\Resources\Pages\CreateRecord;

final class CreateSeries extends CreateRecord
{
    protected static string $resource = SeriesResource::class;

    protected function handleRecordCreation(array $data): Series
    {
        $series = Series::create([
            'title' => $data['title'],
            'author_id' => $data['author_id'],
            'description' => $data['description'] ?? null,
        ]);

        foreach ($data['posts'] as $order => $postSlug) {
            Seriesable::create([
                'series_id' => $series->id,
                'seriesable_type' => $data['seriesable_type'],
                'seriesable_id' => $postSlug,
                'order' => $order + 1,
            ]);
        }

        return $series;
    }
}

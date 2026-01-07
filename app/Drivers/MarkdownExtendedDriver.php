<?php

declare(strict_types=1);

namespace App\Drivers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Orbit\Drivers\Markdown;
use Override;
use SplFileInfo;

final class MarkdownExtendedDriver extends Markdown
{
    /**
     * @return array<string, mixed|bool>
     */
    #[Override]
    protected function parseContent(SplFileInfo $file): array
    {
        /** @var array<string, mixed> $parent */
        $parent = parent::parseContent($file);
        $fileName = Str::of($file->getPathname())
            ->afterLast('/')
            ->beforeLast('.')
            ->value();

        $timestamps = $this->getTimestamps($file);

        return array_merge(
            $parent,
            [
                'slug' => array_key_exists('slug', $parent) ? $parent['slug'] : $fileName,
            ],
            $timestamps
        );
    }

    protected function getTimestamps(SplFileInfo $file): array
    {
        return [
            'created_at' => Carbon::parse($file->getCTime()),
            'updated_at' => Carbon::parse($file->getMTime()),
        ];
    }
}

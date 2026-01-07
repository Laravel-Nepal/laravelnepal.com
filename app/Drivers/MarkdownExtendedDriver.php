<?php

declare(strict_types=1);

namespace App\Drivers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
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

        /** @var array<string, Carbon> $timestamps */
        $timestamps = $this->getTimestamps($file);

        return array_merge(
            $parent,
            [
                'slug' => array_key_exists('slug', $parent) ? $parent['slug'] : $fileName,
            ],
            $timestamps
        );
    }

    /** @return array{'created_at': Carbon, 'updated_at': Carbon} */
    protected function getTimestamps(SplFileInfo $file): array
    {
        return [
            'created_at' => Date::parse($file->getCTime()),
            'updated_at' => Date::parse($file->getMTime()),
        ];
    }
}

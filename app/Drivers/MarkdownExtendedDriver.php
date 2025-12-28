<?php

declare(strict_types=1);

namespace App\Drivers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Orbit\Drivers\Markdown;
use Override;
use SplFileInfo;

final class MarkdownExtendedDriver extends Markdown
{
    #[Override]
    public function schema(Blueprint $blueprint): void
    {
        parent::schema($blueprint);

        if (! $blueprint->hasColumn('excluded')) {
            $blueprint->boolean('excluded');
        }
    }

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

        return array_merge(
            $parent,
            [
                'slug' => array_key_exists('slug', $parent) ? $parent['slug'] : $fileName,
                'excluded' => $file->getFilename() === 'README.md',
            ]
        );
    }
}

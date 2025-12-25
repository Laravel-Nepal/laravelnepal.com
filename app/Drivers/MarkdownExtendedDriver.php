<?php

declare(strict_types=1);

namespace App\Drivers;

use Illuminate\Database\Schema\Blueprint;
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
        return array_merge(
            $parent,
            ['excluded' => $file->getFilename() === 'README.md']
        );
    }
}

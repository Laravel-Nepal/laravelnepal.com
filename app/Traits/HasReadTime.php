<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * @property string $contentColumn
 * @property-read int $minutes_read
 *
 * @method string|null contentValue()
 */
trait HasReadTime
{
    public function getContent(): ?string
    {
        /** @phpstan-ignore function.alreadyNarrowedType */
        if (method_exists($this, 'contentValue') && $this->contentValue() !== null) {
            return $this->contentValue();
        }

        /** @phpstan-var string */
        return data_get($this, $this->contentColumn());
    }

    /**
     * @return Attribute<int, null>
     */
    protected function minutesRead(): Attribute
    {
        /** @phpstan-var string $content */
        $content = $this->getContent() ?? '';

        return Attribute::make(
            get: fn (): int => max(1, (int) ceil(str_word_count(strip_tags($content ?? '')) / 200)),
        );
    }

    /**
     * @return Attribute<string, null>
     */
    protected function minutesReadText(): Attribute
    {
        $singular = $this->minutes_read <= 1;

        return Attribute::make(
            get: fn (): string => $this->minutes_read.' min'.($singular ? '' : 's').' read',
        );
    }

    protected function contentColumn(): string
    {
        return property_exists($this, 'contentColumn')
            ? $this->contentColumn
            : 'content';
    }
}

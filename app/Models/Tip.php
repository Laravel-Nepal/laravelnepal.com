<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

final class Tip extends Model
{
    use Orbital;
    use SoftDeletes;
    public static function schema(Blueprint $blueprint): void
    {
        $blueprint->string('title');
        $blueprint->string('slug');
        $blueprint->string('author');
        $blueprint->date('date');
        $blueprint->json('tags');
    }

    public function getKeyName(): string
    {
        return 'slug';
    }

    public function getIncrementing(): bool
    {
        return false;
    }

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}

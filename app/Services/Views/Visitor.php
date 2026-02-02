<?php

declare(strict_types=1);

namespace App\Services\Views;

use App\Models\Guest;
use CyrildeWit\EloquentViewable\Visitor as BaseVisitor;

final class Visitor extends BaseVisitor
{
    public function guest(): Guest
    {
        return Guest::query()
            ->firstOrCreate(
                ['visitor_id' => $this->id()]
            );
    }
}

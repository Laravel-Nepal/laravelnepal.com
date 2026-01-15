<?php

declare(strict_types=1);

namespace App\Schemas;

use AchyutN\LaravelSEO\Data\ResolvedSEO;
use App\Models\Author;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait ProjectSchema
{
    public function buildSchema(SchemaCollection $schema, ResolvedSEO $resolvedSEO): SchemaCollection
    {
        /** @var Author $model */
        $model = $resolvedSEO->getModel();

        return $schema
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => $this->blogSchemaType(),
                '@id' => $resolvedSEO->url,
                'name' => $resolvedSEO->title,
                'applicationCategory' => $resolvedSEO->category,
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                'image' => $resolvedSEO->image,
                'author' => $resolvedSEO->authorArray(),
                'sameAs' => array_values($model->social_links),
            ]);
    }

    protected function blogSchemaType(): string
    {
        return 'SoftwareApplication';
    }
}

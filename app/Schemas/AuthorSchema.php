<?php

declare(strict_types=1);

namespace App\Schemas;

use AchyutN\LaravelSEO\Data\ResolvedSEO;
use App\Models\Author;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait AuthorSchema
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
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                /** @phpstan-var string|null $email */
                'email' => $model->getAttribute('email'),
                'image' => $resolvedSEO->image,
                'sameAs' => $model->social_links,
            ]);
    }

    protected function blogSchemaType(): string
    {
        return 'Person';
    }
}

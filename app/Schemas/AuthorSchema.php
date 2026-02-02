<?php

declare(strict_types=1);

namespace App\Schemas;

use App\Models\Author;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait AuthorSchema
{
    public function buildSchema(SchemaCollection $schema): SchemaCollection
    {
        $resolvedSEO = $this->resolveSEO();

        /** @var Author $model */
        $model = $resolvedSEO->getModel();

        return $schema
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => $this->blogSchemaType(),
                '@id' => $resolvedSEO->url,
                'mainEntityOfPage' => $resolvedSEO->url,
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                /** @phpstan-var string|null $email */
                'email' => $model->getAttribute('email'),
                'image' => $resolvedSEO->image,
                'sameAs' => array_values($model->social_links),
                'interactionStatistic' => [
                    [
                        '@type' => 'InteractionCounter',
                        'interactionType' => 'http://schema.org/UserPageVisits',
                        'userInteractionCount' => $model->total_views,
                    ],
                    [
                        '@type' => 'InteractionCounter',
                        'interactionType' => 'http://schema.org/PlusOnes',
                        'userInteractionCount' => $model->getTotalVotes(),
                    ],
                ],
            ]);
    }

    protected function blogSchemaType(): string
    {
        return 'Person';
    }
}

<?php

declare(strict_types=1);

namespace App\Schemas;

use App\Models\Author;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait ProjectSchema
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
                'name' => $resolvedSEO->title,
                'applicationCategory' => $resolvedSEO->category,
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                'image' => $resolvedSEO->image,
                'author' => $resolvedSEO->authorArray(),
                'sameAs' => array_values($model->social_links),
            ])
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => 'SocialMediaPosting',
                '@id' => $resolvedSEO->url,
                'url' => $resolvedSEO->url,
                'mainEntityOfPage' => $resolvedSEO->url,
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
                'image' => $resolvedSEO->image,
                'headline' => $resolvedSEO->title,
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'isAccessibleForFree' => 'http://schema.org/True',
                'thumbnailUrl' => $resolvedSEO->image,
                'articleSection' => 'Project',
                'datePublished' => $resolvedSEO->publishedAt,
                'dateModified' => $resolvedSEO->modifiedAt,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorAndPublisher(),
            ]);
    }

    protected function blogSchemaType(): string
    {
        return 'SoftwareApplication';
    }
}

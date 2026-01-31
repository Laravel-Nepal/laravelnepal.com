<?php

declare(strict_types=1);

namespace App\Schemas;

use App\Models\Page;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait PageSchema
{
    public function buildSchema(SchemaCollection $schema): SchemaCollection
    {
        $resolvedSEO = $this->resolveSEO();

        /** @var Page $model */
        $model = $resolvedSEO->getModel();

        return $schema
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => $resolvedSEO->pageType ?? $this->pageSchemaType(),
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorArray(),
                'publisher' => $resolvedSEO->publisherArray(),
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
                        'userInteractionCount' => $model->loadCount('views')->views_count,
                    ],
                ],
                'image' => $resolvedSEO->image,
                'headline' => $resolvedSEO->title,
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'isAccessibleForFree' => 'http://schema.org/True',
                'thumbnailUrl' => $resolvedSEO->image,
                'articleSection' => 'Artisan',
                'datePublished' => $resolvedSEO->publishedAt,
                'dateModified' => $resolvedSEO->modifiedAt,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorAndPublisher(),
            ]);
    }

    protected function pageSchemaType(): string
    {
        return 'WebPage';
    }
}

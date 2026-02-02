<?php

declare(strict_types=1);

namespace App\Schemas;

use App\Models\Author;
use App\Models\Package;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait PackageSchema
{
    public function buildSchema(SchemaCollection $schema): SchemaCollection
    {
        $resolvedSEO = $this->resolveSEO();

        /** @var Package $model */
        $model = $resolvedSEO->getModel();

        return $schema
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => $this->blogSchemaType(),
                '@id' => $resolvedSEO->url,
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                'image' => $resolvedSEO->image,
                /** @phpstan-var string|null $codeRepository */
                'codeRepository' => $model->getAttribute('github_url'),
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
                        'interactionType' => 'http://schema.org/UserPlusOnes',
                        'userInteractionCount' => $model->getTotalVotes(),
                    ],
                    [
                        '@type' => 'InteractionCounter',
                        'interactionType' => 'http://schema.org/UserComments',
                        'userInteractionCount' => $model->total_comments,
                    ],
                ],
                'image' => $resolvedSEO->image,
                'headline' => $resolvedSEO->title,
                'name' => $resolvedSEO->title,
                'description' => $resolvedSEO->description,
                'isAccessibleForFree' => 'http://schema.org/True',
                'thumbnailUrl' => $resolvedSEO->image,
                'articleSection' => 'Package',
                'datePublished' => $resolvedSEO->publishedAt,
                'dateModified' => $resolvedSEO->modifiedAt,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorAndPublisher(),
            ]);
    }

    protected function blogSchemaType(): string
    {
        return 'SoftwareSourceCode';
    }
}

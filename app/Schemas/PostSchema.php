<?php

declare(strict_types=1);

namespace App\Schemas;

use AchyutN\LaravelSEO\Data\ResolvedSEO;
use App\Models\Post;
use App\Models\Tip;
use Illuminate\Support\Collection;
use RalphJSmit\Laravel\SEO\Schema\ArticleSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;

trait PostSchema
{
    public function buildSchema(SchemaCollection $schema, ResolvedSEO $resolvedSEO): SchemaCollection
    {
        /** @var Post|Tip $model */
        $model = $resolvedSEO->getModel();

        return $schema
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => $resolvedSEO->pageType ?? $this->blogSchemaType(),
                '@id' => $resolvedSEO->url,
                'headline' => $resolvedSEO->title,
                'keywords' => implode(', ', $resolvedSEO->tags),
                'description' => $resolvedSEO->description,
                'url' => $resolvedSEO->url,
                'thumbnailUrl' => $resolvedSEO->image,
                'articleSection' => $resolvedSEO->category,
                'datePublished' => $resolvedSEO->publishedAt,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorAndPublisher(),
            ])
            ->add(fn (): array => [
                '@context' => 'https://schema.org',
                '@type' => 'SocialMediaPosting',
                '@id' => $resolvedSEO->url,
                'url' => $resolvedSEO->url,
                'mainEntityOfPage' => $resolvedSEO->url,
                'timeRequired' => 'PT'.$model->minutes_read.'M',
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
                'keywords' => implode(', ', $resolvedSEO->tags),
                'description' => $resolvedSEO->description,
                'isAccessibleForFree' => 'http://schema.org/True',
                'thumbnailUrl' => $resolvedSEO->image,
                'articleSection' => $resolvedSEO->category,
                'datePublished' => $resolvedSEO->publishedAt,
                'dateModified' => $resolvedSEO->modifiedAt,
                'inLanguage' => 'en',
                'author' => $resolvedSEO->authorAndPublisher(),
            ])
            ->addArticle(fn (ArticleSchema $articleSchema): ArticleSchema => $articleSchema->markup(fn (Collection $markup): Collection => $markup
                ->put('headline', $resolvedSEO->title)
                ->put('description', $resolvedSEO->description)
                ->put('url', $resolvedSEO->url)
                ->put('image', $resolvedSEO->image)
                ->put('publisher', $resolvedSEO->publisherArray())
                ->put('author', $resolvedSEO->authorArray())
                ->put('datePublished', $resolvedSEO->publishedAt?->toIso8601String())
                ->put('dateModified', $resolvedSEO->modifiedAt?->toIso8601String())
            ));
    }

    protected function blogSchemaType(): string
    {
        return 'BlogPosting';
    }
}

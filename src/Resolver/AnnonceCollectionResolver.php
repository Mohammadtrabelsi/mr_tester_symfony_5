<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;


final  class AnnonceCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].
        dd($context['args']);
        foreach ($collection as $category) {
            $category->setName("name");
            $category->setSlug("slug");
        }
        return $collection;
    }
}
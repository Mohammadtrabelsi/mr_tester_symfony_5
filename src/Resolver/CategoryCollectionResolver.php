<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;


final  class CategoryCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].
        foreach ($collection as $category) {
            $category->setName("c name");
        }
        return $collection;
    }
}
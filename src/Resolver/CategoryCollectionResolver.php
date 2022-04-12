<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;


/**
 * CategoryCollectionResolver
 */
final  class CategoryCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        foreach ($collection as $category) {
            $category->setName("c name");
        }
        return $collection;
    }
}
<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;


/**
 * AnnonceCollectionResolver
 */
final  class AnnonceCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        foreach ($collection as $annonce) {
            $annonce->setTitle("Title");
            $annonce->setContent("Content");
        }
        return $collection;
    }
}
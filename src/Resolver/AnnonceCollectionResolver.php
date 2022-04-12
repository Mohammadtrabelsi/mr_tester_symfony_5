<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryCollectionResolverInterface;


/**
 *
 */
final  class AnnonceCollectionResolver implements QueryCollectionResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke(iterable $collection, array $context): iterable
    {
        // Query arguments are in $context['args'].
        foreach ($collection as $annonce) {
            $annonce->setTitle("Title");
            $annonce->setContent("Content");
        }
        return $collection;
    }
}
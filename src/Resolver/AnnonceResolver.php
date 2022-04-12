<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;

/**
 * AnnonceResolver
 */
final class AnnonceResolver implements QueryItemResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        $item->setTitle("Title");
        $item->setContent("Content");
        return $item;
    }
}
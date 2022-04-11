<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;

final class AnnonceResolver implements QueryItemResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        // TODO: Implement __invoke() method.
        $item->setName("name");
        $item->setSlug("slug");
        return $item;
    }
}
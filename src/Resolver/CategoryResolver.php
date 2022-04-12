<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\QueryItemResolverInterface;

/**
 * CategoryResolver
 */
final  class CategoryResolver implements QueryItemResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        return $item;
    }
}
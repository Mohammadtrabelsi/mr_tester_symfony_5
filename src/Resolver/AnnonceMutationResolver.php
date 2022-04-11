<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;

final class CategoryMutationResolver implements MutationResolverInterface
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
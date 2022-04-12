<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Category;

final class AnnonceMutationResolver implements MutationResolverInterface
{

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        $item->setTitle("Title");
        $item->setContent("Content");
        $item->setContent("Content");
        return $item;
    }
}
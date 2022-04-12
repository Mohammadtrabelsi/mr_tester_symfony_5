<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Service\SluggerService;

/**
 *
 */
final class CategoryMutationResolver implements MutationResolverInterface
{
    /**
     * @var SluggerService
     */
    private SluggerService $slugger;

    /**
     * @param SluggerService $slugger
     */
    public function __construct(SluggerService $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        $name = $context['args']['input']['name'];
        $item->setName($name);
        $item->setSlug($this->slugger->slugify($name));
        return $item;
    }
}
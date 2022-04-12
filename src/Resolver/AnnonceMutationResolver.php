<?php

namespace App\Resolver;

use ApiPlatform\Core\GraphQl\Resolver\MutationResolverInterface;
use App\Entity\Category;
use App\Repository\CategoryRepository;

/**
 * AnnonceMutationResolver
 */
final class AnnonceMutationResolver implements MutationResolverInterface
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($item, array $context)
    {
        $item->setTitle($context['args']['input']['title']);
        $item->setContent($context['args']['input']['content']);
        $item->setCategories($this->categoryRepository->find($context['args']['input']['categoryId']));
        return $item;
    }
}
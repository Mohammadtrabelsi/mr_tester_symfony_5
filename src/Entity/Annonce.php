<?php

namespace App\Entity;

use App\Resolver\AnnonceResolver;
use App\Resolver\AnnonceMutationResolver;
use App\Resolver\AnnonceCollectionResolver;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 *
 * @ApiResource(
 *     graphql={
 *          "item_query",
 *          "collection_query",
 *          "delete",
 *          "update",
 *          "create",
 *          "getCustomQuery"={
 *              "item_query"=AnnonceResolver::class,
 *              "args"={
 *                  "id"={"type"="ID!"},
 *                  "shearch"={"type"="String!"},
 *              }
 *          },
 *          "getCollectionQuery"={
 *              "collection_query"=AnnonceCollectionResolver::class,
 *              "args"={
 *                  "shearch"={"type"="String!"},
 *              }
 *          },
 *          "customCreateMutation"={
 *              "mutation"=AnnonceMutationResolver::class,
 *              "args"={
 *                  "title"={"type"="String", "description"="Annonce title text"},
 *                  "content"={"type"="String", "description"="Annonce content text"},
 *                  "categoryId"={"type"="String", "description"="Annonce category Id"}
 *              }
 *          },
 *         }
 * )
 * )
 *
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Category|null
     */
    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    /**
     * @param Category|null $categories
     * @return $this
     */
    public function setCategories(?Category $categories): self
    {
        $this->categories = $categories;

        return $this;
    }
}

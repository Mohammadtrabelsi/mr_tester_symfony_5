<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use App\Resolver\CategoryResolver;
use App\Resolver\CategoryMutationResolver;
use App\Resolver\CategoryCollectionResolver;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 *
 * @ApiResource(
 *     graphql={
 *          "item_query",
 *          "collection_query",
 *          "delete",
 *          "update",
 *          "create",
 *          "getCustomQuery"={
 *              "item_query"=CategoryResolver::class,
 *              "args"={
 *                  "id"={"type"="ID!"},
 *                  "shearch"={"type"="String!"},
 *              }
 *          },
 *          "getCollectionQuery"={
 *              "collection_query"=CategoryCollectionResolver::class,
 *              "args"={
 *                  "shearch"={"type"="String!"},
 *              }
 *          },
 *          "customCreateMutation"={
 *              "mutation"=CategoryMutationResolver::class,
 *              "args"={
 *                  "name"={"type"="String", "description"="Category description text"}
 *              }
 *          },
 *         }
 * )
 *
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;


    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="categories")
     */
    private $annonces;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonces(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setCategories($this);
        }

        return $this;
    }

    public function removeAnnonces(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getCategories() === $this) {
                $annonce->setCategories(null);
            }
        }

        return $this;
    }
}

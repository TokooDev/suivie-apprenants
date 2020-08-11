<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *  @ApiResource()
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libellé  ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le libellé doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libellé ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeDeTag::class, mappedBy="tags")
     */
    private $groupeDeTags;

    public function __construct()
    {
        $this->groupeDeTags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    

    /**
     * @return Collection|GroupeDeTag[]
     */
    public function getGroupeDeTags(): Collection
    {
        return $this->groupeDeTags;
    }

    public function addGroupeDeTag(GroupeDeTag $groupeDeTag): self
    {
        if (!$this->groupeDeTags->contains($groupeDeTag)) {
            $this->groupeDeTags[] = $groupeDeTag;
            $groupeDeTag->addTag($this);
        }

        return $this;
    }

    public function removeGroupeDeTag(GroupeDeTag $groupeDeTag): self
    {
        if ($this->groupeDeTags->contains($groupeDeTag)) {
            $this->groupeDeTags->removeElement($groupeDeTag);
            $groupeDeTag->removeTag($this);
        }

        return $this;
    }
}

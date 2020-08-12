<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(

 *
 *      collectionOperations={
 *          "createTag"={
 *              "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/grptag",
 *              
 *          },
 *
 * 
 * 
 * },)
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"groupetag:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupetag:read"})
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

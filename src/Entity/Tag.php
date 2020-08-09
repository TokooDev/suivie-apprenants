<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(

 *
 *      collectionOperations={
 *          "createTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
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
     * @Groups({"groupetag:read"})
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeTag::class, inversedBy="tags")
     
     */
    private $GroupeTag;

    public function __construct()
    {
        $this->GroupeTag = new ArrayCollection();
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
     * @return Collection|GroupeTag[]
     */
    public function getGroupeTag(): Collection
    {
        return $this->GroupeTag;
    }

    public function addGroupeTag(GroupeTag $groupeTag): self
    {
        if (!$this->GroupeTag->contains($groupeTag)) {
            $this->GroupeTag[] = $groupeTag;
        }

        return $this;
    }

    public function removeGroupeTag(GroupeTag $groupeTag): self
    {
        if ($this->GroupeTag->contains($groupeTag)) {
            $this->GroupeTag->removeElement($groupeTag);
        }

        return $this;
    }

    
}

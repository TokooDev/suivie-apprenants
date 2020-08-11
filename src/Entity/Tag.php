<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

>>>>>>> diouf

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
 * 
 *               
 *          }
 * },
 * )
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  @Groups({"groupetag:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     *  @Groups({"groupetag:read"})
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=GroupeTag::class, inversedBy="tags")
=======
     * @ORM\ManyToMany(targetEntity=GroupeDeTag::class, inversedBy="tags")
>>>>>>> diouf
     */
    private $groupeTag;

    public function __construct()
    {
        $this->groupeTag = new ArrayCollection();
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
        return $this->groupeTag;
    }

    public function addGroupeTag(GroupeTag $groupeTag): self
    {
        if (!$this->groupeTag->contains($groupeTag)) {
            $this->groupeTag[] = $groupeTag;
        }

        return $this;
    }

    public function removeGroupeTag(GroupeTag $groupeTag): self
    {
        if ($this->groupeTag->contains($groupeTag)) {
            $this->groupeTag->removeElement($groupeTag);
        }

        return $this;
    }

}

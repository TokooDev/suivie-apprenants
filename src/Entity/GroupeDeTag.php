<?php

namespace App\Entity;

<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeDeTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
=======

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeDeTagRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"groupetag:read"}},
 *
 *      collectionOperations={
 *          "getTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grptag",
 *              
 * 
 * 
 *               
 *          },
 *          
 * 
 * },
 * itemOperations={
 *      "getTagGrp"={
 *          "method"= "GET",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 *      "getGpTag"={
 *          "method"= "GET",
 *          "path"= "/admin/grptag/{id}/tag",   
 *      },
 *      "ajouttag"={
 *             "method"="PUT",
 *             "path" = "/admin/grptag/{id}",
 *      },
 *      "delete_profil"={
 *             "method"="DELETE",
 *             "path" = "/admin/grptag/{id}",
 *      },
 * 
 * },)
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 * @ORM\Entity(repositoryClass=GroupeDeTagRepository::class)
 */
class GroupeDeTag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
=======
     * @Groups({"groupetag:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $id;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libellé  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libellé doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libellé ne doit pas dépasser {{ limit }} charactères"
     * )
=======
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupetag:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="groupeDeTags")
=======
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="GroupeTag")
     * @Groups({"groupetag:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

<<<<<<< HEAD
    public function setLibelle(string $libelle): self
=======
    public function setLibelle(?string $libelle): self
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
<<<<<<< HEAD
=======
            $tag->addGroupeTag($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
<<<<<<< HEAD
=======
            $tag->removeGroupeTag($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }
}

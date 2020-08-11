<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeDeTagRepository;
=======

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeDeTagRepository;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"groupetag:read"}},
 * collectionOperations={
=======
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(
 *  normalizationContext={"groups"={"groupetag:read"}},
 *
 *      collectionOperations={
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 *          "getTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grptag",
<<<<<<< HEAD
 * 
 *               
 *          }, 
=======
 *              
 * 
 * 
 *               
 *          },
 *          
 * 
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 * },
 * itemOperations={
 *      "getTagGrp"={
 *          "method"= "GET",
 *          "path"= "/admin/grptag/{id}",   
 *      },
<<<<<<< HEAD
 *  "getGpTag"={
 *          "method"= "PUT",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 * "delete_tag"={
 *          "method"= "DELETE",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 * 
 * },
 * )
=======
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
     * @Groups({"groupetag:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     *  * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupetag:read"})
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="groupeTag")
     * @Groups({"groupetag:read"})
     *  @ApiSubresource
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

    public function setLibelle(?string $libelle): self
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
            $tag->addGroupeTag($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeGroupeTag($this);
        }

        return $this;
    }
}

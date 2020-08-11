<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
<<<<<<< HEAD
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
=======
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(

>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 *
 *      collectionOperations={
 *          "createTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/grptag",
<<<<<<< HEAD

 * 
 * 
 *               
 *          }
 * },
 * )
=======
 *              
 *          },
 *
 * 
 * 
 * },)
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
     *  @Groups({"groupetag:read"})
=======
     * @Groups({"groupetag:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
<<<<<<< HEAD
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     *  @Groups({"groupetag:read"})
=======
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupetag:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
<<<<<<< HEAD
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

=======
     * @ORM\ManyToMany(targetEntity=GroupeDeTag::class, inversedBy="tags")
     
     */
    private $GroupeTag;

    public function __construct()
    {
        $this->GroupeTag = new ArrayCollection();
    }

   

>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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
<<<<<<< HEAD
        return $this->groupeTag;
=======
        return $this->GroupeTag;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    }

    public function addGroupeTag(GroupeTag $groupeTag): self
    {
<<<<<<< HEAD
        if (!$this->groupeTag->contains($groupeTag)) {
            $this->groupeTag[] = $groupeTag;
=======
        if (!$this->GroupeTag->contains($groupeTag)) {
            $this->GroupeTag[] = $groupeTag;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeGroupeTag(GroupeTag $groupeTag): self
    {
<<<<<<< HEAD
        if ($this->groupeTag->contains($groupeTag)) {
            $this->groupeTag->removeElement($groupeTag);
=======
        if ($this->GroupeTag->contains($groupeTag)) {
            $this->GroupeTag->removeElement($groupeTag);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

<<<<<<< HEAD
=======
    
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
}

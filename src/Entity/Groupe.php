<?php

namespace App\Entity;

<<<<<<< HEAD
<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
=======
use Doctrine\ORM\Mapping as ORM;
=======
use App\Entity\Apprenant;
use App\Entity\Formateur;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

>>>>>>> diouf

/**
 * @ApiResource()
=======

/**
 * @ApiResource(
 *  collectionOperations={
 *          "getgroup"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/groupes",
 *              "normalization_context"={"groups"={"grpe:read"}}, 
 *              
 *            
 *          },
 *          "getGrp"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/groupes/apprenants",
 *              "normalization_context"={"groups"={"grap:read"}}, 
 *              
 *            
 *          },
 *          "ajoutAF"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/groupes",
 *              "normalization_context"={"groups"={"apfor:read"}},
 *               
 *              
 *            
 *          },
 * 
 * },)
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @Groups({"promo:read"})
>>>>>>> diouf
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Apprenant::class, mappedBy="Groupe")
     */
    private $apprenants;

    /**
     * @ORM\ManyToOne(targetEntity=Formateur::class, inversedBy="Groupe")
<<<<<<< HEAD
     */
    private $formateur;

=======
     * @Groups({"promo:read"})
=======
     * @Groups({"grpe:read","apfor:read",})
     */
    private $id;

    

    /**
     * @ORM\ManyToMany(targetEntity=Formateur::class, inversedBy="groupes")
     * @Groups({"grpe:read","apfor:read","promo:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $formateur;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
=======
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","apfor:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le projet ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le projet ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le projet ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $projet;



>>>>>>> diouf
    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
=======
     * @ORM\ManyToMany(targetEntity=Apprenant::class, inversedBy="groupes")
     * @Groups({"grpe:read","apfor:read"})
     */
    private $apprenant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le projet ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "Le projet doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le projet ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","apfor:read"})
     */
    private $projet;

    

    public function __construct()
    {
        
        $this->formateur = new ArrayCollection();
        $this->apprenant = new ArrayCollection();
        
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    }

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    /**
     * @return Collection|Apprenant[]
     */
    public function getApprenants(): Collection
    {
        return $this->apprenants;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenants->contains($apprenant)) {
            $this->apprenants[] = $apprenant;
            $apprenant->addGroupe($this);
=======
   

    /**
     * @return Collection|Formateur[]
     */
    public function getFormateur(): Collection
    {
        return $this->formateur;
    }

    public function addFormateur(Formateur $formateur): self
    {
        if (!$this->formateur->contains($formateur)) {
            $this->formateur[] = $formateur;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            $apprenant->removeGroupe($this);
=======
    public function removeFormateur(Formateur $formateur): self
    {
        if ($this->formateur->contains($formateur)) {
            $this->formateur->removeElement($formateur);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

<<<<<<< HEAD
    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): self
    {
        $this->formateur = $formateur;
=======
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

        return $this;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
=======
    /**
     * @return Collection|Apprenant[]
     */
    public function getApprenant(): Collection
    {
        return $this->apprenant;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenant->contains($apprenant)) {
            $this->apprenant[] = $apprenant;
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenant->contains($apprenant)) {
            $this->apprenant->removeElement($apprenant);
        }

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

        return $this;
    }

    public function getProjet(): ?string
    {
        return $this->projet;
    }

<<<<<<< HEAD
    public function setProjet(string $projet): self
=======
    public function setProjet(?string $projet): self
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    {
        $this->projet = $projet;

        return $this;
    }

<<<<<<< HEAD
>>>>>>> diouf
=======
    
   

   
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
}

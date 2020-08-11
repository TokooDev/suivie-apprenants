<?php

namespace App\Entity;

use App\Entity\Apprenant;
use App\Entity\Formateur;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

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
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"grpe:read","apfor:read",})
     */
    private $id;

    

    /**
     * @ORM\ManyToMany(targetEntity=Formateur::class, inversedBy="groupes")
     * @Groups({"grpe:read","apfor:read","promo:read"})
     */
    private $formateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","apfor:read"})
     */
    private $libelle;

    /**
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
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   

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
        }

        return $this;
    }

    public function removeFormateur(Formateur $formateur): self
    {
        if ($this->formateur->contains($formateur)) {
            $this->formateur->removeElement($formateur);
        }

        return $this;
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

        return $this;
    }

    public function getProjet(): ?string
    {
        return $this->projet;
    }

    public function setProjet(?string $projet): self
    {
        $this->projet = $projet;

        return $this;
    }

    
   

   
}

<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ApprenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
<<<<<<< HEAD
 * @ApiResource()
=======
 * @ApiResource(* attributes={
* "security"="is_granted('ROLE_ADMIN')",
* "security_message"="Vous n'avez pas access à cette Ressource"
* }
)
>>>>>>> master
 * @ORM\Entity(repositoryClass=ApprenantRepository::class)
 */
class Apprenant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatar;

    /**
<<<<<<< HEAD
     * @ORM\ManyToOne(targetEntity=profilDeSortie::class, inversedBy="apprenants")
     */
    private $profildesortie;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, inversedBy="apprenants")
     */
    private $competence;
=======
     * @ORM\ManyToMany(targetEntity=Groupe::class, inversedBy="apprenants")
     */
    private $Groupe;

    /**
     * @ORM\ManyToOne(targetEntity=ProfilDeSortie::class, inversedBy="apprenants")
     */
    private $profilDeSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Promo::class, inversedBy="apprenants")
     */
    private $Promo;

>>>>>>> master

    public function __construct()
    {
        $this->competence = new ArrayCollection();
<<<<<<< HEAD
=======
        $this->Groupe = new ArrayCollection();
>>>>>>> master
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

<<<<<<< HEAD
    public function getProfildesortie(): ?profilDeSortie
=======
    public function getProfildesortie(): ?ProfilDeSortie
>>>>>>> master
    {
        return $this->profildesortie;
    }

<<<<<<< HEAD
    public function setProfildesortie(?profilDeSortie $profildesortie): self
=======
    public function setProfildesortie(?ProfilDeSortie $profildesortie): self
>>>>>>> master
    {
        $this->profildesortie = $profildesortie;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return Collection|Competence[]
     */
    public function getCompetence(): Collection
    {
        return $this->competence;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competence->contains($competence)) {
            $this->competence[] = $competence;
=======
     * @return Collection|Groupe[]
     */
    public function getGroupe(): Collection
    {
        return $this->Groupe;
    }

    public function addGroupe(Groupe $groupe): self
    {
        if (!$this->Groupe->contains($groupe)) {
            $this->Groupe[] = $groupe;
>>>>>>> master
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeCompetence(Competence $competence): self
    {
        if ($this->competence->contains($competence)) {
            $this->competence->removeElement($competence);
=======
    public function removeGroupe(Groupe $groupe): self
    {
        if ($this->Groupe->contains($groupe)) {
            $this->Groupe->removeElement($groupe);
>>>>>>> master
        }

        return $this;
    }
<<<<<<< HEAD
=======

    public function getPromo(): ?Promo
    {
        return $this->Promo;
    }

    public function setPromo(?Promo $Promo): self
    {
        $this->Promo = $Promo;

        return $this;
    }
>>>>>>> master
}

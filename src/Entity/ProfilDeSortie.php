<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfilDeSortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProfilDeSortieRepository::class)
 */
class ProfilDeSortie
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
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profildesortie")
=======
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profilDeSortie")
>>>>>>> master
     */
    private $apprenants;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
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
<<<<<<< HEAD
            $apprenant->setProfildesortie($this);
=======
            $apprenant->setProfilDeSortie($this);
>>>>>>> master
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($apprenant->getProfildesortie() === $this) {
                $apprenant->setProfildesortie(null);
=======
            if ($apprenant->getProfilDeSortie() === $this) {
                $apprenant->setProfilDeSortie(null);
>>>>>>> master
            }
        }

        return $this;
    }
<<<<<<< HEAD
=======

>>>>>>> master
}

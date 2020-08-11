<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfilDeSortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> diouf

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
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profilDeSortie")
=======
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profildesortie")
>>>>>>> diouf
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
            $apprenant->setProfilDeSortie($this);
=======
            $apprenant->setProfildesortie($this);
>>>>>>> diouf
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
            if ($apprenant->getProfilDeSortie() === $this) {
                $apprenant->setProfilDeSortie(null);
=======
            if ($apprenant->getProfildesortie() === $this) {
                $apprenant->setProfildesortie(null);
>>>>>>> diouf
            }
        }

        return $this;
    }

<<<<<<< HEAD
=======
    

>>>>>>> diouf
}

<?php

namespace App\Entity;

<<<<<<< HEAD
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

=======
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ProfilDeSortieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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
<<<<<<< HEAD
=======
     * @Groups({"grap:read"})
     * 
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
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
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grap:read"})
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profilDeSortie")
=======
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="profildesortie")
>>>>>>> diouf
=======
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="ProfilDeSortie")
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $apprenants;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
    }

<<<<<<< HEAD
=======
   

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
<<<<<<< HEAD
            $apprenant->setProfilDeSortie($this);
=======
            $apprenant->setProfildesortie($this);
>>>>>>> diouf
=======
            $apprenant->setProfilDeSortie($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            // set the owning side to null (unless already changed)
<<<<<<< HEAD
<<<<<<< HEAD
            if ($apprenant->getProfilDeSortie() === $this) {
                $apprenant->setProfilDeSortie(null);
=======
            if ($apprenant->getProfildesortie() === $this) {
                $apprenant->setProfildesortie(null);
>>>>>>> diouf
=======
            if ($apprenant->getProfilDeSortie() === $this) {
                $apprenant->setProfilDeSortie(null);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
            }
        }

        return $this;
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    

>>>>>>> diouf
=======
   
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
}

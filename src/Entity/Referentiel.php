<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ReferentielRepository::class)
 */
class Referentiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"promo:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "La libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $libelle;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *@Assert\NotBlank(message="Le programme ne doit pas être vide")
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "Le programme ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le programme debut ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $programme;


    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, inversedBy="referentiels")
     */
    private $Promo;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeDeCompetence::class, inversedBy="referentiels")
     */
    private $groupeDeCompetences;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="La presentation ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      
     *      minMessage = "La presentation ne doit avoir au moins {{ limit }} charactères",
     *  )    
     */
    private $presentation;

    /**
     * @ORM\Column(type="text")
     *  @Assert\NotBlank(message="Le critere d'evaluation ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      
     *      minMessage = "le critere d'evaluation ne doit avoir au moins {{ limit }} charactères",
     *  )    
     */
    private $critereEvaluation;

    /**
     * @ORM\Column(type="text")
     *  @Assert\NotBlank(message="Le critere d'admission ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      
     *      minMessage = "le critere d'admission ne doit avoir au moins {{ limit }} charactères",
     *  )    
     */
    private $critereAdmission;

    public function __construct()
    {
        $this->Promo = new ArrayCollection();
        $this->groupeDeCompetences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getlibelle(): ?string
    {
        return $this->libelle;
    }

    public function setlibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(?string $programme): self
    {
        $this->programme = $programme;

        return $this;
    }
    /**
     * @return Collection|Promo[]
     */
    public function getPromo(): Collection
    {
        return $this->Promo;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->Promo->contains($promo)) {
            $this->Promo[] = $promo;
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->Promo->contains($promo)) {
            $this->Promo->removeElement($promo);
        }

        return $this;
    }

    /**
     * @return Collection|GroupeCompetence[]
     */
    public function getGroupeDeCompetences(): Collection
    {
        return $this->groupeDeCompetences;
    }

    public function addGroupeDeCompetence(GroupeCompetence $groupeDeCompetence): self
    {
        if (!$this->groupeDeCompetences->contains($groupeDeCompetence)) {
            $this->groupeDeCompetences[] = $groupeDeCompetence;
        }

        return $this;
    }

    public function removeGroupeDeCompetence(GroupeCompetence $groupeDeCompetence): self
    {
        if ($this->groupeDeCompetences->contains($groupeDeCompetence)) {
            $this->groupeDeCompetences->removeElement($groupeDeCompetence);
        }

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getCritereEvaluation(): ?string
    {
        return $this->critereEvaluation;
    }

    public function setCritereEvaluation(string $critereEvaluation): self
    {
        $this->critereEvaluation = $critereEvaluation;

        return $this;
    }

    public function getCritereAdmission(): ?string
    {
        return $this->critereAdmission;
    }

    public function setCritereAdmission(string $critereAdmission): self
    {
        $this->critereAdmission = $critereAdmission;

        return $this;
    }
}

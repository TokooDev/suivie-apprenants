<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libellé  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libellé doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libellé ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"afficherUnePromoReferentiel:read"})
     * 
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="La description  ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères"
     * )
     * @Groups({"afficherUnePromoReferentiel:read"})
     */
    private $description;
    /**
     * @ORM\ManyToMany(targetEntity=GroupeDeCompetence::class, mappedBy="competences")
     */
    private $groupeDeCompetences;

    /**
     * @ORM\ManyToMany(targetEntity=NiveauDevaluation::class, mappedBy="competences")
     */
    private $niveauDevaluations;

    public function __construct()
    {
        $this->groupeDeCompetences = new ArrayCollection();
        $this->niveauDevaluations = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|GroupeDeCompetence[]
     */
    public function getGroupeDeCompetences(): Collection
    {
        return $this->groupeDeCompetences;
    }

    public function addGroupeDeCompetence(GroupeDeCompetence $groupeDeCompetence): self
    {
        if (!$this->groupeDeCompetences->contains($groupeDeCompetence)) {
            $this->groupeDeCompetences[] = $groupeDeCompetence;
            $groupeDeCompetence->addCompetence($this);
        }

        return $this;
    }

    public function removeGroupeDeCompetence(GroupeDeCompetence $groupeDeCompetence): self
    {
        if ($this->groupeDeCompetences->contains($groupeDeCompetence)) {
            $this->groupeDeCompetences->removeElement($groupeDeCompetence);
            $groupeDeCompetence->removeCompetence($this);
        }

        return $this;
    }

    /**
     * @return Collection|NiveauDevaluation[]
     */
    public function getNiveauDevaluations(): Collection
    {
        return $this->niveauDevaluations;
    }

    public function addNiveauDevaluation(NiveauDevaluation $niveauDevaluation): self
    {
        if (!$this->niveauDevaluations->contains($niveauDevaluation)) {
            $this->niveauDevaluations[] = $niveauDevaluation;
            $niveauDevaluation->addCompetence($this);
        }

        return $this;
    }

    public function removeNiveauDevaluation(NiveauDevaluation $niveauDevaluation): self
    {
        if ($this->niveauDevaluations->contains($niveauDevaluation)) {
            $this->niveauDevaluations->removeElement($niveauDevaluation);
            $niveauDevaluation->removeCompetence($this);
        }

        return $this;
    }
}

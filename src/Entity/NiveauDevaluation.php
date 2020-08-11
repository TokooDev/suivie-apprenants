<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauDevaluationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=NiveauDevaluationRepository::class)
 */
class NiveauDevaluation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="L'action ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "L'action doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "L'action ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $actions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le critere ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      max = 255,
     *      minMessage = "Le critere doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le critere ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $critere;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="NiveauEvaluation")
     */
    private $competences;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActions(): ?string
    {
        return $this->actions;
    }

    public function setActions(?string $actions): self
    {
        $this->actions = $actions;

        return $this;
    }

    public function getCritere(): ?string
    {
        return $this->critere;
    }

    public function setCritere(?string $critere): self
    {
        $this->critere = $critere;

        return $this;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->addNiveauEvaluation($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            $competence->removeNiveauEvaluation($this);
        }

        return $this;
    }
}

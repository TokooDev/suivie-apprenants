<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;


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
     * @Groups({"competence:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libele ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libele doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libele ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"competence:read","grpco:read","grpcom:read","afficherGr:read","affiGr:write","grpcom:write"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="La description ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères",
     *)
     * @Groups({"competence:read","grpco:read","grpcom:read","afficherGr:read","affiGr:write","grpcom:write"})
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeDeCompetence::class, inversedBy="competences")
     * @ApiSubresource
     */
    private $GroupeDeCompetence;

    /**
     * @ORM\ManyToMany(targetEntity=NiveauDevaluation::class, inversedBy="competences")
     * @ApiSubresource
     * 
     */
    private $NiveauDevaluation;

    public function __construct()
    {
        $this->GroupeDeCompetence = new ArrayCollection();
        $this->NiveauDevaluation = new ArrayCollection();
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
    public function getGroupeDeCompetence(): Collection
    {
        return $this->GroupeDeCompetence;
    }

    public function addGroupeDeCompetence(GroupeDeCompetence $GroupeDeCompetence): self
    {
        if (!$this->GroupeDeCompetence->contains($GroupeDeCompetence)) {
            $this->GroupeDeCompetence[] = $GroupeDeCompetence;
        }

        return $this;
    }

    public function removeGroupeDeCompetence(GroupeDeCompetence $GroupeDeCompetence): self
    {
        if ($this->GroupeDeCompetence->contains($GroupeDeCompetence)) {
            $this->GroupeDeCompetence->removeElement($GroupeDeCompetence);
        }

        return $this;
    }

    /**
     * @return Collection|NiveauDevaluation[]
     */
    public function getNiveauDevaluation(): Collection
    {
        return $this->NiveauDevaluation;
    }

    public function addNiveauDevaluation(NiveauDevaluation $NiveauDevaluation): self
    {
        if (!$this->NiveauDevaluation->contains($NiveauDevaluation)) {
            $this->NiveauDevaluation[] = $NiveauDevaluation;
        }

        return $this;
    }

    public function removeNiveauDevaluation(NiveauDevaluation $NiveauDevaluation): self
    {
        if ($this->NiveauDevaluation->contains($NiveauDevaluation)) {
            $this->NiveauDevaluation->removeElement($NiveauDevaluation);
        }

        return $this;
    }

   
    
}

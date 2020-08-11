<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeDeCompetenceRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(
 * collectionOperations={
 *          "createGroupeCompetence"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/referentiels",
 *              
 *          }, 
 * },)
 * @ORM\Entity(repositoryClass=GroupeDeCompetenceRepository::class)
 */
class GroupeDeCompetence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"ref_grpe:read","competence:read","grpcom:write","afficherGr:read"})
     * 
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"ref_grpe:read","competence:read","grpcom:write","afficherGr:read"})
     * 
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="La description ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères",
     *)
     * @Groups({"ref_grpe:read","competence:read","grpcom:write","afficherGr:read"})
     *
     */
    private $descriptiion;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="GroupeCompetence")
     *
     */
    private $referentiels;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="GroupeCompetence")
     * @ApiSubresource
     * @Groups({"ref_grpe:read","competence:read","grpco:read","grpcom:write","afficherGr:read"})
     * 
     */
    private $competences;

    public function __construct()
    {
        $this->referentiels = new ArrayCollection();
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescriptiion(): ?string
    {
        return $this->descriptiion;
    }

    public function setDescriptiion(?string $descriptiion): self
    {
        $this->descriptiion = $descriptiion;

        return $this;
    }

    /**
     * @return Collection|Referentiel[]
     */
    public function getReferentiels(): Collection
    {
        return $this->referentiels;
    }

    public function addReferentiel(Referentiel $referentiel): self
    {
        if (!$this->referentiels->contains($referentiel)) {
            $this->referentiels[] = $referentiel;
            $referentiel->addGroupeCompetence($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->contains($referentiel)) {
            $this->referentiels->removeElement($referentiel);
            $referentiel->removeGroupeCompetence($this);
        }

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
            $competence->addGroupeCompetence($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            $competence->removeGroupeCompetence($this);
        }

        return $this;
    }
}

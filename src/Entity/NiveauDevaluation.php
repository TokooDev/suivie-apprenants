<?php

namespace App\Entity;

<<<<<<< HEAD
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauDevaluationRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

=======
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\NiveauDevaluationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

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
<<<<<<< HEAD
     * @Groups({"groupecomp:read","compgetid:read","compget:write"})
=======
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     *  @Assert\NotBlank(message="L'action ne doit pas être vide")
=======
     * @Assert\NotBlank(message="L'action ne doit pas être vide")
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     * @Assert\Length(
     *      min = 10,
     *      max = 100,
     *      minMessage = "L'action doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "L'action ne doit pas dépasser {{ limit }} charactères"
     * )
<<<<<<< HEAD
     * @Groups({"groupecomp:read","compgetid:read","compget:write"})
=======
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $actions;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     *  @Assert\NotBlank(message="La critere ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      max = 255,
     *      minMessage = "La critere doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le critere ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupecomp:read","compgetid:read","compget:write"})
=======
     * @Assert\NotBlank(message="Le critere ne doit pas être vide")
     * @Assert\Length(
     *      min = 100,
     *      max = 255,
     *      minMessage = "Le critere doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le critere ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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
<<<<<<< HEAD
            $competence->addNiveauDevaluation($this);
=======
            $competence->addNiveauEvaluation($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
<<<<<<< HEAD
            $competence->removeNiveauDevaluation($this);
=======
            $competence->removeNiveauEvaluation($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }
}

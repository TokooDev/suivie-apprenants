<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeDeCompetenceRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *       collectionOperations={
 *          "getcompetences"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grpecompetences",  
 *              "normalization_context"={"groups"={"groupecomp:read"}},  
 *          }, 
 *      "getGrpcompCompetences"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grpecompetences/competences", 
 *              "normalization_context"={"groups"={"groupecompcomp:read"}},
 *                 
 *          }, 
 *        "getGrpcompetenceCompetences"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="admin/grpecompetences", 
 *              "normalization_context"={"groups"={"groupecompcomp:read"}},
 *                 
 *          }, 
 },

 itemOperations={
 *     "getcompetencebyID"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grpecompetences/{id}",  
 *              "normalization_context"={"groups"={"groupecomp:read"}},  
 *          }, 
 * "getgrpcompetencescompetencebyID"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grpecompetences/{id}/competences ",  
 *              "normalization_context"={"groups"={"groupecompcomp:read"}},  
 *          }, 
 * "putcompetencebyID"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="PUT",
 *              "path"="/admin/grpecompetences/{id}",  
 *              "normalization_context"={"groups"={"groupecomp:read"}},  
 *          }, 
 * },
 * )
=======

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
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 * @ORM\Entity(repositoryClass=GroupeDeCompetenceRepository::class)
 */
class GroupeDeCompetence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
     * @Groups({"groupecomp:read","groupecompcomp:read"},)
=======
     * @Groups({"ref_grpe:read","competence:read","grpcom:write","afficherGr:read"})
     * 
     * 
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
<<<<<<< HEAD
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     *  @Groups({"groupecomp:read","groupecompcomp:read"})
=======
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"ref_grpe:read","competence:read","grpcom:write","afficherGr:read"})
     * 
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     * * @Assert\NotBlank(message="La description ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 255,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le description ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupecomp:read", "groupecompcomp:read"})
     * 
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="groupeDeCompetences")
     * @ApiSubresource
=======
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
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $referentiels;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="groupeDeCompetence")
     * @ApiSubresource
     *  @Groups({"groupecomp:read","groupecompcomp:read"})
=======
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="GroupeCompetence")
     * @ApiSubresource
     * @Groups({"ref_grpe:read","competence:read","grpco:read","grpcom:write","afficherGr:read"})
     * 
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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

<<<<<<< HEAD
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
=======
    public function getDescriptiion(): ?string
    {
        return $this->descriptiion;
    }

    public function setDescriptiion(?string $descriptiion): self
    {
        $this->descriptiion = $descriptiion;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

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
<<<<<<< HEAD
            $referentiel->addGroupeDeCompetence($this);
=======
            $referentiel->addGroupeCompetence($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->contains($referentiel)) {
            $this->referentiels->removeElement($referentiel);
<<<<<<< HEAD
            $referentiel->removeGroupeDeCompetence($this);
=======
            $referentiel->removeGroupeCompetence($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
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
<<<<<<< HEAD
            $competence->addGroupeDeCompetence($this);
=======
            $competence->addGroupeCompetence($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
<<<<<<< HEAD
            $competence->removeGroupeDeCompetence($this);
=======
            $competence->removeGroupeCompetence($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }
}

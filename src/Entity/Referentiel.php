<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ApiResource(
 * 
 *      collectionOperations={
 *          "getReferentiel"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/referentiels",
 *              "normalization_context"={"groups"={"ref_grpe:read"}}, 
 *          }, 
 *          "getGC"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/referentiels/groupecompetences",
 *              "normalization_context"={"groups"={"competence:read"}},  
 *   
 *          }, 
 *         "getGroupCompetence"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"= "POST",
 *              "path"= "/admin/referentiels", 
 *              "normalization_context"={"groups"={"affiGr:write"}},  
 *      },
 *         
 *      }, 
 * itemOperations={
 * 
 *      "getGroup"={
 *          "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/referentiels/{id}", 
 *          "normalization_context"={"groups"={"afficherGr:read"}},  
 *      },
 *      "getCompetenceGroupe"={
 *          "method"= "GET",
 *          "path"= "/admin/referentiels/{id}/groupecompetences/{id_g}",
 *          "normalization_context"={"groups"={"grpco:read"}},   
 *      },
 *      "ajoutgrpeCompetence"={
 *             "method"="PUT",
 *             "path" = "/admin/referentiels/{id}",
 *             "normalization_context"={"groups"={"grpcom:write"}},
 *      },
 *      "delete_profil"={
 *             "method"="DELETE",
 *             "path" = "/admin/referentiels/{id}",
 *      },
 *
 * },)
 * @ORM\Entity(repositoryClass=ReferentielRepository::class)
 */
class Referentiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     *
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le libellé  ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "Le libellé doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libellé ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"ref_grpe:read","grpe:read","promo:read","promo:read","afficherUnePromoReferentiel:read","afficherApprenantsGroup:read","afficherformateurPromo:read"})
     */
    private $libelle;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="La présentation  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "La présentation doit avoir au moins {{ limit }} charactères"
     * )
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * @Assert\NotBlank(message="Le programme ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le programme doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le programme ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $programme;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * @Assert\NotBlank(message="Le critère d'évaluation  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "Le critère d'évaluation doit avoir au moins {{ limit }} charactères"
     * )
     */
    private $critereEvaluation;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="Le critère d'admission  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "Le critère d'admission doit avoir au moins {{ limit }} charactères"
     * )
     */
    private $critereAdmission;

    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, mappedBy="referentiels")
     */
    private $promos;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeDeCompetence::class, inversedBy="referentiels")
     * @Groups({"afficherUnePromoReferentiel:read","ref_grpe:read","competence:read","grpco:read","grpcom:write","afficherGr:read","affiGr:write"})
     */
    private $groupedecompetences;

    public function __construct()
    {
        $this->Promo = new ArrayCollection();
        $this->GroupeCompetence = new ArrayCollection();
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

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

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

    public function getCritereEvaluation(): ?string
    {
        return $this->critereEvaluation;
    }

    public function setCritereEvaluation(?string $critereEvaluation): self
    {
        $this->critereEvaluation = $critereEvaluation;

        return $this;
    }

    public function getCritereAdmission(): ?string
    {
        return $this->critereAdmission;
    }

    public function setCritereAdmission(?string $critereAdmission): self
    {
        $this->critereAdmission = $critereAdmission;

        return $this;
    }

    /**
     * @return Collection|Promo[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(Promo $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
            $promo->addReferentiel($this);
        }

        return $this;
    }

    public function removePromo(Promo $promo): self
    {
        if ($this->promos->contains($promo)) {
            $this->promos->removeElement($promo);
            $promo->removeReferentiel($this);
        }

        return $this;
    }

    /**
     * @return Collection|GroupeDeCompetence[]
     */
    public function getGroupedecompetences(): Collection
    {
        return $this->groupedecompetences;
    }

    public function addGroupedecompetence(GroupeDeCompetence $groupedecompetence): self
    {
        if (!$this->groupedecompetences->contains($groupedecompetence)) {
            $this->groupedecompetences[] = $groupedecompetence;
        }

        return $this;
    }

    public function removeGroupedecompetence(GroupeDeCompetence $groupedecompetence): self
    {
        if ($this->groupedecompetences->contains($groupedecompetence)) {
            $this->groupedecompetences->removeElement($groupedecompetence);
        }

        return $this;
    }
}

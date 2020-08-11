<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * 
     */
    private $libele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * 
     */
    private $presentation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * 
     */
    private $programme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * 
     */
    private $critereEvaluation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"ref_grpe:read","grpe:read","promo:read"})
     * 
     */
    private $critereAdmission;

    /**
     * @ORM\ManyToMany(targetEntity=Promo::class, inversedBy="referentiels")
     */
    private $Promo;

    /**
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, inversedBy="referentiels")
     * @ApiSubresource
     * @Groups({"ref_grpe:read","competence:read","grpco:read","grpcom:write","afficherGr:read","affiGr:write"})
     * 
     */
    private $GroupeCompetence;

    public function __construct()
    {
        $this->Promo = new ArrayCollection();
        $this->GroupeCompetence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(?string $libele): self
    {
        $this->libele = $libele;

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
    public function getGroupeCompetence(): Collection
    {
        return $this->GroupeCompetence;
    }

    public function addGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if (!$this->GroupeCompetence->contains($groupeCompetence)) {
            $this->GroupeCompetence[] = $groupeCompetence;
        }

        return $this;
    }

    public function removeGroupeCompetence(GroupeCompetence $groupeCompetence): self
    {
        if ($this->GroupeCompetence->contains($groupeCompetence)) {
            $this->GroupeCompetence->removeElement($groupeCompetence);
        }

        return $this;
    }
}

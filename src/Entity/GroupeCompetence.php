<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupeCompetenceRepository;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

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
 *      "getGrpcompetenceCompetences"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="admin/grpecompetences/competences", 
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
 * @ORM\Entity(repositoryClass=GroupeCompetenceRepository::class)
 */
class GroupeCompetence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"groupecomp:read","groupecompcomp:read"},)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Groups({"groupecomp:read","groupecompcomp:read"})
     */
    private $libele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"groupecomp:read", "groupecompcomp:read"})
     */
    private $descriptif;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="groupeDeCompetences")
     * @ApiSubresource
     */
    private $referentiels;

    /**
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="groupeDeCompetence")
     * @ApiSubresource
     *  @Groups({"groupecomp:read","groupecompcomp:read"})
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

    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(?string $libele): self
    {
        $this->libele = $libele;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

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
            $referentiel->addGroupeDeCompetence($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->contains($referentiel)) {
            $this->referentiels->removeElement($referentiel);
            $referentiel->removeGroupeDeCompetence($this);
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
            $competence->addGroupeDeCompetence($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            $competence->removeGroupeDeCompetence($this);
        }

        return $this;
    }
}

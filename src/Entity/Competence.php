<?php

namespace App\Entity;

<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompetenceRepository::class)
 */
=======
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 * collectionOperations={
 *                      "getcomp"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/competences",  
 *              "normalization_context"={"groups"={"compget:read"}},  
 *          }, 
 *      "postcomp"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/competences", 
 *              "normalization_context"={"groups"={"compget:read"}},
 *                 
 *          }, 
 *                 
*                    
*                      },    
                        
*itemOperations={
 *     "getcompbyID"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/competences/{id}",  
 *              "normalization_context"={"groups"={"compgetid:read"}},  
 *          }, 
 * "putcompbyID"={
 *              "security"="is_granted('ROLE_ADMIN')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="PUT",
 *              "path"="/admin/competences/{id}",  
 *              "normalization_context"={"groups"={"compgetid:read"}},  
 *          }, 
 * }, 
* )
* @ORM\Entity(repositoryClass=CompetenceRepository::class)
*/
>>>>>>> master
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
>>>>>>> master
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
>>>>>>> master
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
<<<<<<< HEAD
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
>>>>>>> master
     */
    private $description;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Apprenant::class, mappedBy="competence")
     */
    private $apprenants;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, inversedBy="competences")
     */
    private $tag;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
        $this->tag = new ArrayCollection();
=======
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, inversedBy="competences")
     * @ApiSubresource
     */
    private $groupeDeCompetence;

    /**
     * @ORM\ManyToMany(targetEntity=NiveauEvaluation::class, inversedBy="competences")
     * @ApiSubresource
     * @Groups({"groupecomp:read","compget:read","compgetid:read"})
     */
    private $NiveauEvaluation;

    public function __construct()
    {
        $this->groupeDeCompetence = new ArrayCollection();
        $this->NiveauEvaluation = new ArrayCollection();
>>>>>>> master
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
<<<<<<< HEAD
     * @return Collection|Apprenant[]
     */
    public function getApprenants(): Collection
    {
        return $this->apprenants;
    }

    public function addApprenant(Apprenant $apprenant): self
    {
        if (!$this->apprenants->contains($apprenant)) {
            $this->apprenants[] = $apprenant;
            $apprenant->addCompetence($this);
=======
     * @return Collection|GroupeCompetence[]
     */
    public function getGroupeDeCompetence(): Collection
    {
        return $this->groupeDeCompetence;
    }

    public function addGroupeDeCompetence(GroupeCompetence $groupeDeCompetence): self
    {
        if (!$this->groupeDeCompetence->contains($groupeDeCompetence)) {
            $this->groupeDeCompetence[] = $groupeDeCompetence;
>>>>>>> master
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            $apprenant->removeCompetence($this);
=======
    public function removeGroupeDeCompetence(GroupeCompetence $groupeDeCompetence): self
    {
        if ($this->groupeDeCompetence->contains($groupeDeCompetence)) {
            $this->groupeDeCompetence->removeElement($groupeDeCompetence);
>>>>>>> master
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return Collection|Tag[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
=======
     * @return Collection|NiveauEvaluation[]
     */
    public function getNiveauEvaluation(): Collection
    {
        return $this->NiveauEvaluation;
    }

    public function addNiveauEvaluation(NiveauEvaluation $niveauEvaluation): self
    {
        if (!$this->NiveauEvaluation->contains($niveauEvaluation)) {
            $this->NiveauEvaluation[] = $niveauEvaluation;
>>>>>>> master
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeTag(Tag $tag): self
    {
        if ($this->tag->contains($tag)) {
            $this->tag->removeElement($tag);
=======
    public function removeNiveauEvaluation(NiveauEvaluation $niveauEvaluation): self
    {
        if ($this->NiveauEvaluation->contains($niveauEvaluation)) {
            $this->NiveauEvaluation->removeElement($niveauEvaluation);
>>>>>>> master
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
<<<<<<< HEAD

=======
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> diouf
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
<<<<<<< HEAD
 *              "normalization_context"={"groups"={"compget:read"}},
=======
 *              "normalization_context"={"groups"={"compget:write"}},
>>>>>>> diouf
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
class Competence
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:write","compgetid:read"})
>>>>>>> diouf
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:write","compgetid:read"})
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $libelle;

    /**
     * @ORM\Column(type="text")
<<<<<<< HEAD
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:read","compgetid:read"})
=======
     * @Groups({"groupecomp:read","groupecompcomp:read","compget:write","compgetid:read"})
     * @Assert\NotBlank(message="La description ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le description ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $description;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=GroupeCompetence::class, inversedBy="competences")
=======
     * @ORM\ManyToMany(targetEntity=GroupeDeCompetence::class, inversedBy="competences")
>>>>>>> diouf
     * @ApiSubresource
     */
    private $groupeDeCompetence;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=NiveauEvaluation::class, inversedBy="competences")
     * @ApiSubresource
     * @Groups({"groupecomp:read","compget:read","compgetid:read"})
     */
    private $NiveauEvaluation;
=======
     * @ORM\ManyToMany(targetEntity=NiveauDevaluation::class, inversedBy="competences")
     * @ApiSubresource
     * @Groups({"groupecomp:read","compget:write","compgetid:read"})
     */
    private $NiveauDevaluation;
>>>>>>> diouf

    public function __construct()
    {
        $this->groupeDeCompetence = new ArrayCollection();
<<<<<<< HEAD
        $this->NiveauEvaluation = new ArrayCollection();
=======
        $this->NiveauDevaluation = new ArrayCollection();
>>>>>>> diouf
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
        }

        return $this;
    }

    public function removeGroupeDeCompetence(GroupeCompetence $groupeDeCompetence): self
    {
        if ($this->groupeDeCompetence->contains($groupeDeCompetence)) {
            $this->groupeDeCompetence->removeElement($groupeDeCompetence);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
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
=======
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
>>>>>>> diouf
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeNiveauEvaluation(NiveauEvaluation $niveauEvaluation): self
    {
        if ($this->NiveauEvaluation->contains($niveauEvaluation)) {
            $this->NiveauEvaluation->removeElement($niveauEvaluation);
=======
    public function removeNiveauDevaluation(NiveauDevaluation $NiveauDevaluation): self
    {
        if ($this->NiveauDevaluation->contains($NiveauDevaluation)) {
            $this->NiveauDevaluation->removeElement($NiveauDevaluation);
>>>>>>> diouf
        }

        return $this;
    }
}

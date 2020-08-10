<?php

namespace App\Entity;

<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
=======
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *
 *      collectionOperations={
 *          "createTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/grptag",

 * 
 * 
 *               
 *          }
 * },
 * )
>>>>>>> master
 * @ORM\Entity(repositoryClass=TagRepository::class)
 */
class Tag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
=======
     *  @Groups({"groupetag:read"})
>>>>>>> master
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     *  @Groups({"groupetag:read"})
>>>>>>> master
     */
    private $libelle;

    /**
<<<<<<< HEAD
     * @ORM\ManyToMany(targetEntity=Competence::class, mappedBy="tag")
     */
    private $competences;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
=======
     * @ORM\ManyToMany(targetEntity=GroupeTag::class, inversedBy="tags")
     */
    private $groupeTag;

    public function __construct()
    {
        $this->groupeTag = new ArrayCollection();
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

    /**
<<<<<<< HEAD
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
            $competence->addTag($this);
=======
     * @return Collection|GroupeTag[]
     */
    public function getGroupeTag(): Collection
    {
        return $this->groupeTag;
    }

    public function addGroupeTag(GroupeTag $groupeTag): self
    {
        if (!$this->groupeTag->contains($groupeTag)) {
            $this->groupeTag[] = $groupeTag;
>>>>>>> master
        }

        return $this;
    }

<<<<<<< HEAD
    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            $competence->removeTag($this);
=======
    public function removeGroupeTag(GroupeTag $groupeTag): self
    {
        if ($this->groupeTag->contains($groupeTag)) {
            $this->groupeTag->removeElement($groupeTag);
>>>>>>> master
        }

        return $this;
    }
<<<<<<< HEAD
=======

>>>>>>> master
}

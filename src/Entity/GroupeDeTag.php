<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeDeTagRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"groupetag:read"}},
 * collectionOperations={
 *          "getTag"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/grptag",
 * 
 *               
 *          }, 
 * },
 * itemOperations={
 *      "getTagGrp"={
 *          "method"= "GET",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 *  "getGpTag"={
 *          "method"= "PUT",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 * "delete_tag"={
 *          "method"= "DELETE",
 *          "path"= "/admin/grptag/{id}",   
 *      },
 * 
 * },
 * )
 * @ORM\Entity(repositoryClass=GroupeDeTagRepository::class)
 */
class GroupeDeTag
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"groupetag:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"groupetag:read"})
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity=Tag::class, mappedBy="groupeTag")
     * @Groups({"groupetag:read"})
     *  @ApiSubresource
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addGroupeTag($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeGroupeTag($this);
        }

        return $this;
    }
}

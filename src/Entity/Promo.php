<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PromoRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Date;

/**
 * @ApiResource(
 * collectionOperations={
 *          "getPromo"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/promos",
 *              "normalization_context"={"groups"={"promo:read"}}, 
 *          },
 * },
 * )
 * @ORM\Entity(repositoryClass=PromoRepository::class)
 */
class Promo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"promo:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="La langue ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "La langue ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le langue ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le titre ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "Le titre ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le titre ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le lieu ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Le lieu ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le lieu ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="La reference agate ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "La reference agate ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le reference agate ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $referenceAgate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 5,
     *      max = 100,
     *      minMessage = "La fabrique ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le fabrique ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"promo:read"})
     */
    private $fabrique;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotBlank(message="La date de debut ne doit pas être vide")
     * @Assert\Date(
     *      message = "La date '{{ value }}' n'est pas une date valide."
     * )
     * @Groups({"promo:read"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     *  * @Assert\NotBlank(message="La date de debut ne doit pas être vide")
     *@Assert\Date(
     *      message = "La date '{{ value }}' n'est pas une date valide."
     * )
     * @Groups({"promo:read"})
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="Promo")
     * @Groups({"promo:read"})
     */
    private $apprenants;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="Promo")
     * @Groups({"promo:read"})
     */
    private $referentiels;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "La fabrique ne doit avoir au moins {{ limit }} charactères",
     * )
     */
    private $description;

    public function __construct()
    {
        $this->apprenants = new ArrayCollection();
        $this->referentiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(?string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }


    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getReferenceAgate(): ?string
    {
        return $this->referenceAgate;
    }

    public function setReferenceAgate(?string $referenceAgate): self
    {
        $this->referenceAgate = $referenceAgate;

        return $this;
    }

    public function getFabrique(): ?string
    {
        return $this->fabrique;
    }

    public function setFabrique(?string $fabrique): self
    {
        $this->fabrique = $fabrique;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
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
            $apprenant->setPromo($this);
        }

        return $this;
    }

    public function removeApprenant(Apprenant $apprenant): self
    {
        if ($this->apprenants->contains($apprenant)) {
            $this->apprenants->removeElement($apprenant);
            // set the owning side to null (unless already changed)
            if ($apprenant->getPromo() === $this) {
                $apprenant->setPromo(null);
            }
        }

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
            $referentiel->addPromo($this);
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->contains($referentiel)) {
            $this->referentiels->removeElement($referentiel);
            $referentiel->removePromo($this);
        }

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
}

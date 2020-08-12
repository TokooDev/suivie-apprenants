<?php

namespace App\Entity;

use App\Entity\Referentiel;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PromoRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 * collectionOperations={
 *          "getPromo"={
 *              "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/promos",
 *              "normalization_context"={"groups"={"promo:read"}}, 
 *          },
 *          "getPromoByType"={
 *              "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/promos/principal",
 *              "normalization_context"={"groups"={"grpPrincipal:read"}},
 *          },
 *          "addPromo"={
 *              "security"="is_granted('ROLE_Admin')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="POST",
 *              "path"="/admin/promos",
 *              "normalization_context"={"groups"={"promo:write"}},
 *          },
 * },
 * 
 * itemOperations={
 * 
 *      "getPromoById"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/promos/{id}", 
 *          "normalization_context"={"groups"={"afficherUnePromo:read"}},  
 *      },
 *      "getPromoPrincipalById"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/promos/{id}/principal", 
 *          "normalization_context"={"groups"={"afficherUnePromoPrincipal:read"}},  
 *      },
 *      
 *      "getPromoReferentielById"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/promos/{id}/referentiels", 
 *          "normalization_context"={"groups"={"afficherUnePromoReferentiel:read"}},  
 *      },
 *      "getApprenantsGroupPromo"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/promos/{id_p}/groupes/{id}/apprenants", 
 *          "normalization_context"={"groups"={"afficherApprenantsGroup:read"}},  
 *      },
 *      "getFormateursPromo"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "GET",
 *          "path"= "/admin/promos/{id}/formateurs", 
 *          "normalization_context"={"groups"={"afficherformateurPromo:read"}},  
 *      },
 * 
 *      "editPromoEtReferentiel"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "PUT",
 *          "path"= "/admin/promos/{id}", 
 *          "normalization_context"={"groups"={"modifierPromoEtReferentiel:write"}},  
 *      },
 * 
 *      "editAppreantsDunePromo"={
 *          "security"="is_granted('ROLE_Admin') or is_granted('ROLE_Formateur')",
 *          "security_message"="ACCES REFUSE",
 *          "method"= "PUT",
 *          "path"= "/admin/promos/{id_p}/apprenants/{id}", 
 *          "normalization_context"={"groups"={"modifierAppreantsDunePromo:write"}},  
 *      },
 *      "getPromoPrincipal"={
 *              "security"="is_granted('ROLE_ADMIN') or is_granted('ROLE_Formateur')",
 *              "security_message"="ACCES REFUSE",
 *              "method"="GET",
 *              "path"="/admin/promos",
 *              "normalization_context"={"groups"={"promoprincipal:read"}}, 
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
     * @Groups({"grpe:read","promo:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La langue  ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "La langue doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "La langue ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le titre  ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "Le titre doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le titre ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","promo:read","promo:read","modifierPromoEtReferentiel:write","promo:write","afficherUnePromoReferentiel:read","afficherApprenantsGroup:read"})
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\NotBlank(message="Le libellé  ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      minMessage = "La description doit avoir au moins {{ limit }} charactères"
     * )
     * @Groups({"promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $description;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le lieu ne doit pas être vide")
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "Le lieu doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le lieu ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="La référence ne doit pas être vide")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "La référencedoit avoir au moins {{ limit }} charactères",
     *      maxMessage = "La référencene doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $ReferenceAgate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="La fabrique  ne doit pas être vide")
     * @Assert\Length(
     *      min = 5,
     *      max = 255,
     *      minMessage = "La fabrique doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "La fabrique ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $Fabrique;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\NotBlank(message="la date ne doit pas être vide")
     * @Assert\Date(
     *      message = "La date '{{ value }}' n'est pas une date valide."
     * )
     * @Groups({"grpe:read"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank(message="La date  ne doit pas être vide")
     * @Assert\Date(
     *      message = "La date '{{ value }}' n'est pas une date valide."
     * )
     * @Groups({"grpe:read","promo:read","promo:write","modifierPromoEtReferentiel:write"})
     */
    private $dateFin;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, inversedBy="promos")
     * @Groups({"promo:read","modifierPromoEtReferentiel:write","modifierAppreantsDunePromo:write","grpPrincipal:read","afficherUnePromo:read","afficherUnePromoPrincipal:read","afficherUnePromoReferentiel:read","afficherApprenantsGroup:read","afficherformateurPromo:read"})
     * @ORM\OneToMany(targetEntity=Apprenant::class, mappedBy="Promo")
     * 
     */
    private $apprenants;

    /**
     * @ORM\ManyToMany(targetEntity=Referentiel::class, mappedBy="Promo")
     * @Groups({"grpe:read","promo:read"})
     */
    private $referentiels;

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

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getReferenceAgate(): ?string
    {
        return $this->ReferenceAgate;
    }

    public function setReferenceAgate(?string $ReferenceAgate): self
    {
        $this->ReferenceAgate = $ReferenceAgate;

        return $this;
    }

    public function getFabrique(): ?string
    {
        return $this->Fabrique;
    }

    public function setFabrique(?string $Fabrique): self
    {
        $this->Fabrique = $Fabrique;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

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
        }

        return $this;
    }

    public function removeReferentiel(Referentiel $referentiel): self
    {
        if ($this->referentiels->contains($referentiel)) {
            $this->referentiels->removeElement($referentiel);
        }

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
}

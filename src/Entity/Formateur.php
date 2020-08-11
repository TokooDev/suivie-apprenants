<?php

namespace App\Entity;

<<<<<<< HEAD
<<<<<<< HEAD
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
=======
use Doctrine\ORM\Mapping as ORM;
=======
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
use App\Repository\FormateurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
<<<<<<< HEAD
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> diouf
=======
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 */
class Formateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @Groups({"promo:read"})
>>>>>>> diouf
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     */
    private $libele;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="formateur")
     */
    private $Groupe;
=======
     * @Groups({"promo:read"})
     */

    private $Groupe;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\NotBlank(message="Le prénom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "Le prénom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le prénom ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "Le nom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\NotBlank(message="Le mail ne doit pas être vide")
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "L'mail ne doit pas dépasser {{ limit }} charactères"
=======
     * @Groups({"grpe:read","apfor:read","promo:read"})
     * 
     */
    private $id;

   

    /**
     * @ORM\ManyToMany(targetEntity=Groupe::class, mappedBy="formateur")
     */
    private $groupes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Le nom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","apfor:read"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le prénom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "Le prénom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le prénom ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Groups({"grpe:read","apfor:read"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="L'email ne doit pas être vide")
     * @Assert\Length(
     *      
     *      max = 255,
     *      maxMessage = "L'email ne doit pas dépasser {{ limit }} charactères"
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     * )
     * @Assert\Email(
     *     message = "L'adresse '{{ value }}' n'est pas un email valide."
     * )
     */
    private $email;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le numero de telephone ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 25,
     *      minMessage = "Le numero de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $tel;
>>>>>>> diouf

    public function __construct()
    {
        $this->Groupe = new ArrayCollection();
    }

=======
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le numero ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 30,
     *      minMessage = "Le numro de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $tel;


    public function __construct()
    {
        $this->groupes = new ArrayCollection();
    }
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(?string $libele): self
    {
        $this->libele = $libele;

        return $this;
    }

=======
>>>>>>> diouf
    /**
     * @return Collection|Groupe[]
     */
    public function getGroupe(): Collection
    {
        return $this->Groupe;
=======
    

    /**
     * @return Collection|Groupe[]
     */
    public function getGroupes(): Collection
    {
        return $this->groupes;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    }

    public function addGroupe(Groupe $groupe): self
    {
<<<<<<< HEAD
        if (!$this->Groupe->contains($groupe)) {
            $this->Groupe[] = $groupe;
            $groupe->setFormateur($this);
=======
        if (!$this->groupes->contains($groupe)) {
            $this->groupes[] = $groupe;
            $groupe->addFormateur($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }

    public function removeGroupe(Groupe $groupe): self
    {
<<<<<<< HEAD
        if ($this->Groupe->contains($groupe)) {
            $this->Groupe->removeElement($groupe);
            // set the owning side to null (unless already changed)
            if ($groupe->getFormateur() === $this) {
                $groupe->setFormateur(null);
            }
=======
        if ($this->groupes->contains($groupe)) {
            $this->groupes->removeElement($groupe);
            $groupe->removeFormateur($this);
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
        }

        return $this;
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;
=======

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

        return $this;
    }

<<<<<<< HEAD
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
=======
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

<<<<<<< HEAD
    public function setEmail(string $email): self
=======
    public function setEmail(?string $email): self
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    {
        $this->email = $email;

        return $this;
    }

<<<<<<< HEAD
=======
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    public function getTel(): ?string
    {
        return $this->tel;
    }

<<<<<<< HEAD
    public function setTel(string $tel): self
=======
    public function setTel(?string $tel): self
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    {
        $this->tel = $tel;

        return $this;
    }
<<<<<<< HEAD
>>>>>>> diouf
=======

    
    

    

   
    

>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
}

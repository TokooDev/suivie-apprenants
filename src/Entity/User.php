<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> diouf

/**
 * @ApiResource(
 * collectionOperations={
 *      "create"={
 *              "method"="POST",
 *              "path"="/users",
 *              "route_name"="create"
 * }
 * }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le username ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Le username ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le username ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $username;

    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le password ne doit pas être vide")
     * @Assert\Length(
     *      min = 4,
     *      max = 8,
     *      minMessage = "Le password ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le password ne doit pas dépasser {{ limit }} charactères"
     * )
     * 
>>>>>>> diouf
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le prenom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Le prenom ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le prenom ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Le nom ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le mail ne doit pas être vide")
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "L'mail ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Assert\Email(
     *     message = "L'adresse '{{ value }}' n'est pas un email valide."
     * )
>>>>>>> diouf
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le numero de telephone ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 25,
     *      minMessage = "Le numero de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
     */
    private $tel;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profil;

    /**
     * @ORM\Column(type="blob")
     */
    private $Avatar;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_'.$this->profil->getLibelle();

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    public function getAvatar()
    {
        return $this->Avatar;
    }

    public function setAvatar($Avatar): self
    {
        $this->Avatar = $Avatar;

        return $this;
    }
}

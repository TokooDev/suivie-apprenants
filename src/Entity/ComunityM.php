<?php

namespace App\Entity;
<<<<<<< HEAD

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ComunityMRepository;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
>>>>>>> diouf
=======
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ComunityMRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ComunityMRepository::class)
 */
class ComunityM
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
<<<<<<< HEAD
     */
    private $libele;
=======
=======
     * @Assert\NotBlank(message="Le nom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 50,
     *      minMessage = "Le nom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le nom ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     * @Assert\NotBlank(message="Le prénom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "Le prénom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le prénom ne doit pas dépasser {{ limit }} charactères"
     * )
<<<<<<< HEAD
     * 
=======
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $prenom;

    /**
<<<<<<< HEAD
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
     * @Assert\NotBlank(message="Le numero de telephone ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 25,
     *      minMessage = "Le numero de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone doit pas dépasser {{ limit }} charactères"
=======
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="L'email ne doit pas être vide")
     * @Assert\Length(
     *      
     *      max = 255,
     *      maxMessage = "L'email ne doit pas dépasser {{ limit }} charactères"
     * )
     * @Assert\Email(
     *     message = "L'adresse '{{ value }}' n'est pas un email valide."
     * )
     
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="Le numero ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 30,
     *      minMessage = "Le numro de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone ne doit pas dépasser {{ limit }} charactères"
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     * )
     */
    private $tel;

<<<<<<< HEAD
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Le mail ne doit pas être vide")
     * @Assert\Length(
     *      max = 255,
     *      maxMessage = "L'mail ne doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $email;
>>>>>>> diouf
=======
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
=======
=======
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

<<<<<<< HEAD
    public function setPrenom(string $prenom): self
=======
    public function setPrenom(?string $prenom): self
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
    {
        $this->prenom = $prenom;

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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

        return $this;
    }

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
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
>>>>>>> diouf

        return $this;
    }
=======
   

   
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
}

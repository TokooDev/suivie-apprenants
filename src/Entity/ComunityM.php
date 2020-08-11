<?php

namespace App\Entity;

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
     */
    private $libele;
=======
     * @Assert\NotBlank(message="Le prénom ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 80,
     *      minMessage = "Le prénom doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le prénom ne doit pas dépasser {{ limit }} charactères"
     * )
     * 
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
     * @Assert\NotBlank(message="Le numero de telephone ne doit pas être vide")
     * @Assert\Length(
     *      min = 9,
     *      max = 25,
     *      minMessage = "Le numero de telephone doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le numero de telephone doit pas dépasser {{ limit }} charactères"
     * )
     */
    private $tel;

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

    public function getId(): ?int
    {
        return $this->id;
    }

<<<<<<< HEAD
    public function getLibele(): ?string
    {
        return $this->libele;
    }

    public function setLibele(?string $libele): self
    {
        $this->libele = $libele;
=======

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

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
}

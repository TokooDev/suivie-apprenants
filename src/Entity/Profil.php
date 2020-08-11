<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
<<<<<<< HEAD
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
<<<<<<< HEAD
=======
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints as Assert;
>>>>>>> diouf
=======
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1

/**
 * @ApiResource(
 * collectionOperations = {
<<<<<<< HEAD
 *      "getProfils" = {
 *              "path" = "/profils/",
 *              "method"= "GET",
 *              
 *       },
 * },
 *       attributes = {
 *              "security" = "is_granted('ROLE_ADMIN')",
 *              "security_message" = "Accès refusé!",
 *              "pagination_items_per_page"=2
 *       },
 * )
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 *
=======
 *      "getprofils" = {
 *          "path" = "/admin/profils/",
 *          "method"="GET",
 * 
 *       },
 *       "create_profils"={
 *           "method"= "POST",
 *           "path" = "/admin/profils",
 *       },
 * },
 * itemOperations={
 *      "get_one_profil"={
 *             "method"="GET",
 *             "path" = "/admin/profils/{id}",
 *             
 *      },
 * "delete_profil"={
 *             "method"="DELETE",
 *             "path" = "/admin/profils/{id}",
 *      },
 *      "edit_profil"={
 *             "method"="PUT",
 *             "path" = "/admin/profils/{id}",
 *      }
 * },
 *          attributes = {
 *               "security" = "is_granted('ROLE_ADMIN')",
 *               "security_message" = "Accès refusé!",
 *               "pagination_items_per_page"=2,
 *               
 * 
 * 
 *     
 *      
 *  },)
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 * CollectionOperation
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
 */
class Profil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
<<<<<<< HEAD
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Le libelle ne doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> diouf
=======
     * @Assert\NotBlank(message="Le libelle ne doit pas être vide")
     * @Assert\Length(
     *      min = 50,
     *      max = 255,
     *      minMessage = "Le libelle doit avoir au moins {{ limit }} charactères",
     *      maxMessage = "Le libelle ne doit pas dépasser {{ limit }} charactères"
     * )
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="profil")
<<<<<<< HEAD
=======
     * @ApiSubresource
>>>>>>> 2af2bb0868223ba559c4e87939da475f02f602a1
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setProfil($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getProfil() === $this) {
                $user->setProfil(null);
            }
        }

        return $this;
    }
}

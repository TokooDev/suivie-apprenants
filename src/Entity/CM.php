<?php

namespace App\Entity;

use App\Repository\CMRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CMRepository::class)
 */
class CM
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ComunityManager;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComunityManager(): ?string
    {
        return $this->ComunityManager;
    }

    public function setComunityManager(string $ComunityManager): self
    {
        $this->ComunityManager = $ComunityManager;

        return $this;
    }
}

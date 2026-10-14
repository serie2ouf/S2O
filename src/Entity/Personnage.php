<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'personnages')]
    private ?Serie $idSerie = null;

    #[ORM\Column(length: 255)]
    private ?string $nomPersonnage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSerie(): ?Serie
    {
        return $this->idSerie;
    }

    public function setIdSerie(?Serie $idSerie): static
    {
        $this->idSerie = $idSerie;

        return $this;
    }

    public function getNomPersonnage(): ?string
    {
        return $this->nomPersonnage;
    }

    public function setNomPersonnage(string $nomPersonnage): static
    {
        $this->nomPersonnage = $nomPersonnage;

        return $this;
    }
}

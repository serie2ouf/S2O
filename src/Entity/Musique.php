<?php

namespace App\Entity;

use App\Repository\MusiqueRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusiqueRepository::class)]
class Musique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'musiques')]
    private ?Serie $idSerie = null;

    #[ORM\Column(length: 255)]
    private ?string $nomMusique = null;

    #[ORM\Column(length: 255)]
    private ?string $compositeurMusique = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Duree = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $anneeSortie = null;

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

    public function getNomMusique(): ?string
    {
        return $this->nomMusique;
    }

    public function setNomMusique(string $nomMusique): static
    {
        $this->nomMusique = $nomMusique;

        return $this;
    }

    public function getCompositeurMusique(): ?string
    {
        return $this->compositeurMusique;
    }

    public function setCompositeurMusique(string $compositeurMusique): static
    {
        $this->compositeurMusique = $compositeurMusique;

        return $this;
    }

    public function getDuree(): ?\DateTime
    {
        return $this->Duree;
    }

    public function setDuree(\DateTime $Duree): static
    {
        $this->Duree = $Duree;

        return $this;
    }

    public function getAnneeSortie(): ?\DateTime
    {
        return $this->anneeSortie;
    }

    public function setAnneeSortie(\DateTime $anneeSortie): static
    {
        $this->anneeSortie = $anneeSortie;

        return $this;
    }
}

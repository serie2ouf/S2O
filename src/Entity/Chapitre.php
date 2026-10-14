<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChapitreRepository::class)]
class Chapitre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'chapitres')]
    private ?Livre $idLivre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateSortie = null;

    #[ORM\Column]
    private ?int $numChapitre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLivre(): ?Livre
    {
        return $this->idLivre;
    }

    public function setIdLivre(?Livre $idLivre): static
    {
        $this->idLivre = $idLivre;

        return $this;
    }

    public function getDateSortie(): ?\DateTime
    {
        return $this->dateSortie;
    }

    public function setDateSortie(\DateTime $dateSortie): static
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    public function getNumChapitre(): ?int
    {
        return $this->numChapitre;
    }

    public function setNumChapitre(int $numChapitre): static
    {
        $this->numChapitre = $numChapitre;

        return $this;
    }
}

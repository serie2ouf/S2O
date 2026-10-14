<?php

namespace App\Entity;

use App\Repository\EpisodeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EpisodeRepository::class)]
class Episode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'episodes')]
    private ?saison $idSaison = null;

    #[ORM\Column]
    private ?int $numEpisode = null;

    #[ORM\Column(length: 255)]
    private ?string $titreEpisode = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSaison(): ?saison
    {
        return $this->idSaison;
    }

    public function setIdSaison(?saison $idSaison): static
    {
        $this->idSaison = $idSaison;

        return $this;
    }

    public function getNumEpisode(): ?int
    {
        return $this->numEpisode;
    }

    public function setNumEpisode(int $numEpisode): static
    {
        $this->numEpisode = $numEpisode;

        return $this;
    }

    public function getTitreEpisode(): ?string
    {
        return $this->titreEpisode;
    }

    public function setTitreEpisode(string $titreEpisode): static
    {
        $this->titreEpisode = $titreEpisode;

        return $this;
    }
}

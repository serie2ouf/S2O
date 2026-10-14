<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'saisons')]
    private ?Serie $idSerie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateSaison = null;

    #[ORM\Column]
    private ?int $numSaison = null;

    /**
     * @var Collection<int, Episode>
     */
    #[ORM\OneToMany(targetEntity: Episode::class, mappedBy: 'idSaison')]
    private Collection $episodes;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
    }

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

    public function getDateSaison(): ?\DateTime
    {
        return $this->dateSaison;
    }

    public function setDateSaison(\DateTime $dateSaison): static
    {
        $this->dateSaison = $dateSaison;

        return $this;
    }

    public function getNumSaison(): ?int
    {
        return $this->numSaison;
    }

    public function setNumSaison(int $numSaison): static
    {
        $this->numSaison = $numSaison;

        return $this;
    }

    /**
     * @return Collection<int, Episode>
     */
    public function getEpisodes(): Collection
    {
        return $this->episodes;
    }

    public function addEpisode(Episode $episode): static
    {
        if (!$this->episodes->contains($episode)) {
            $this->episodes->add($episode);
            $episode->setIdSaison($this);
        }

        return $this;
    }

    public function removeEpisode(Episode $episode): static
    {
        if ($this->episodes->removeElement($episode)) {
            // set the owning side to null (unless already changed)
            if ($episode->getIdSaison() === $this) {
                $episode->setIdSaison(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SerieRepository::class)]
class Serie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'idSerie')]
    private Collection $produits;

    /**
     * @var Collection<int, Saison>
     */
    #[ORM\OneToMany(targetEntity: Saison::class, mappedBy: 'idSerie')]
    private Collection $saisons;

    /**
     * @var Collection<int, Personnage>
     */
    #[ORM\OneToMany(targetEntity: Personnage::class, mappedBy: 'idSerie')]
    private Collection $personnages;

    /**
     * @var Collection<int, Musique>
     */
    #[ORM\OneToMany(targetEntity: Musique::class, mappedBy: 'idSerie')]
    private Collection $musiques;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
        $this->saisons = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->musiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setIdSerie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getIdSerie() === $this) {
                $produit->setIdSerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Saison>
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): static
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons->add($saison);
            $saison->setIdSerie($this);
        }

        return $this;
    }

    public function removeSaison(Saison $saison): static
    {
        if ($this->saisons->removeElement($saison)) {
            // set the owning side to null (unless already changed)
            if ($saison->getIdSerie() === $this) {
                $saison->setIdSerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getPersonnages(): Collection
    {
        return $this->personnages;
    }

    public function addPersonnage(Personnage $personnage): static
    {
        if (!$this->personnages->contains($personnage)) {
            $this->personnages->add($personnage);
            $personnage->setIdSerie($this);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): static
    {
        if ($this->personnages->removeElement($personnage)) {
            // set the owning side to null (unless already changed)
            if ($personnage->getIdSerie() === $this) {
                $personnage->setIdSerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Musique>
     */
    public function getMusiques(): Collection
    {
        return $this->musiques;
    }

    public function addMusique(Musique $musique): static
    {
        if (!$this->musiques->contains($musique)) {
            $this->musiques->add($musique);
            $musique->setIdSerie($this);
        }

        return $this;
    }

    public function removeMusique(Musique $musique): static
    {
        if ($this->musiques->removeElement($musique)) {
            // set the owning side to null (unless already changed)
            if ($musique->getIdSerie() === $this) {
                $musique->setIdSerie(null);
            }
        }

        return $this;
    }
}
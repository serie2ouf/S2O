<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Serie $idSerie = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Categorie $idCategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $nomProduit = null;

    #[ORM\Column]
    private ?float $prixProduit = null;

    #[ORM\Column(length: 255)]
    private ?string $descProduit = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private mixed $imageProduit = null;

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

    public function getIdCategorie(): ?Categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?Categorie $idCategorie): static
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): static
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    public function getPrixProduit(): ?float
    {
        return $this->prixProduit;
    }

    public function setPrixProduit(float $prixProduit): static
    {
        $this->prixProduit = $prixProduit;

        return $this;
    }

    public function getDescProduit(): ?string
    {
        return $this->descProduit;
    }

    public function setDescProduit(string $descProduit): static
    {
        $this->descProduit = $descProduit;

        return $this;
    }

    public function getImageProduit(): mixed
    {
        return $this->imageProduit;
    }

    public function setImageProduit(mixed $imageProduit): static
    {
        $this->imageProduit = $imageProduit;

        return $this;
    }
}

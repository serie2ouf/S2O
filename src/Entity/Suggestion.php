<?php

namespace App\Entity;

use App\Repository\SuggestionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuggestionRepository::class)]
class Suggestion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeSuggestion = null;

    #[ORM\Column(length: 255)]
    private ?string $messageSuggestion = null;

    #[ORM\Column(length: 255)]
    private ?string $contenuMessage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeSuggestion(): ?string
    {
        return $this->typeSuggestion;
    }

    public function setTypeSuggestion(?string $typeSuggestion): static
    {
        $this->typeSuggestion = $typeSuggestion;

        return $this;
    }

    public function getMessageSuggestion(): ?string
    {
        return $this->messageSuggestion;
    }

    public function setMessageSuggestion(string $messageSuggestion): static
    {
        $this->messageSuggestion = $messageSuggestion;

        return $this;
    }

    public function getContenuMessage(): ?string
    {
        return $this->contenuMessage;
    }

    public function setContenuMessage(string $contenuMessage): static
    {
        $this->contenuMessage = $contenuMessage;

        return $this;
    }
}
<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'messagesEnvoyes')]
    private ?Profil $idProfil = null;

    #[ORM\ManyToOne(inversedBy: 'messagesRecus')]
    private ?Profil $idProfilEnvoyer = null;

    #[ORM\Column(length: 255)]
    private ?string $contenueMessage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateMessage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProfil(): ?Profil
    {
        return $this->idProfil;
    }

    public function setIdProfil(?Profil $idProfil): static
    {
        $this->idProfil = $idProfil;

        return $this;
    }

    public function getIdProfilEnvoyer(): ?Profil
    {
        return $this->idProfilEnvoyer;
    }

    public function setIdProfilEnvoyer(?Profil $idProfilEnvoyer): static
    {
        $this->idProfilEnvoyer = $idProfilEnvoyer;

        return $this;
    }

    public function getContenueMessage(): ?string
    {
        return $this->contenueMessage;
    }

    public function setContenueMessage(string $contenueMessage): static
    {
        $this->contenueMessage = $contenueMessage;

        return $this;
    }

    public function getDateMessage(): ?\DateTime
    {
        return $this->dateMessage;
    }

    public function setDateMessage(\DateTime $dateMessage): static
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }
}
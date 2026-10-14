<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: ProfilRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Profil implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = ' ';

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = ['ROLE_USER'];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = ' ';

    #[ORM\Column(length: 255)]
    private ?string $statut = 'nonBanni';

    #[ORM\Column]
    private ?int $nbSuivis = 0;

    #[ORM\Column]
    private ?int $nbsuiveur = 0;

    #[ORM\Column]
    private ?int $compteurBannisement = 0;


    #[ORM\Column(length: 255)]
    private ?string $nomUtilisateur = ' ';



    #[ORM\Column(length: 255)]
    private ?string $roleProfil = 'ROLE_USER';

    /**
     * @var Collection<int, Commande>
     */
    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'idProfil')]
    private Collection $commandes;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'idProfil')]
    private Collection $messagesEnvoyes;

    /**
     * @var Collection<int, Message>
     */
    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'idProfilEnvoyer')]
    private Collection $messagesRecus;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->messagesEnvoyes = new ArrayCollection();
        $this->messagesRecus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0" . self::class . "\0password"] = hash('crc32c', $this->password);

        return $data;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): static
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getNbSuivis(): ?int
    {
        return $this->nbSuivis;
    }

    public function setNbSuivis(int $nbSuivis): static
    {
        $this->nbSuivis = $nbSuivis;

        return $this;
    }

    public function getNbsuiveur(): ?int
    {
        return $this->nbsuiveur;
    }

    public function setNbsuiveur(int $nbsuiveur): static
    {
        $this->nbsuiveur = $nbsuiveur;

        return $this;
    }

    public function getCompteurBannisement(): ?int
    {
        return $this->compteurBannisement;
    }

    public function setCompteurBannisement(int $compteurBannisement): static
    {
        $this->compteurBannisement = $compteurBannisement;

        return $this;
    }

    public function getRoleProfil(): ?string
    {
        return $this->roleProfil;
    }

    public function setRoleProfil(string $roleProfil): static
    {
        $this->roleProfil = $roleProfil;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessagesEnvoyes(): Collection
    {
        return $this->messagesEnvoyes;
    }

    public function addMessagesEnvoye(Message $message): static
    {
        if (!$this->messagesEnvoyes->contains($message)) {
            $this->messagesEnvoyes->add($message);
            $message->setIdProfil($this);
        }

        return $this;
    }

    public function removeMessagesEnvoye(Message $message): static
    {
        if ($this->messagesEnvoyes->removeElement($message)) {
            if ($message->getIdProfil() === $this) {
                $message->setIdProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessagesRecus(): Collection
    {
        return $this->messagesRecus;
    }

    public function addMessagesRecu(Message $message): static
    {
        if (!$this->messagesRecus->contains($message)) {
            $this->messagesRecus->add($message);
            $message->setIdProfilEnvoyer($this);
        }

        return $this;
    }

    public function removeMessagesRecu(Message $message): static
    {
        if ($this->messagesRecus->removeElement($message)) {
            if ($message->getIdProfilEnvoyer() === $this) {
                $message->setIdProfilEnvoyer(null);
            }
        }

        return $this;
    }
}
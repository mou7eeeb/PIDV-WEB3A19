<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'Il existe déjà un compte avec cet email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[Assert\IsTrue(message: 'Vous devez accepter les conditions d\'utilisation')]
    private bool $agreeTerms = false;

    public const USER_TYPE_FREELANCE = 'freelance';
    public const USER_TYPE_FORMATEUR = 'formateur';
    public const USER_TYPE_EMPLOYEUR = 'employeur';
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le nom doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Le nom ne doit contenir que des lettres, des tirets et des espaces')]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le prénom doit contenir au moins {{ limit }} caractères', maxMessage: 'Le prénom ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Le prénom ne doit contenir que des lettres, des tirets et des espaces')]
    private ?string $prenom = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(message: 'L\'email {{ value }} n\'est pas un email valide')]
    #[Assert\Length(max: 150, maxMessage: 'L\'email ne peut pas dépasser {{ limit }} caractères')]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 6, max: 4096, minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^(?=.*[A-Za-z])(?=.*[0-9]).{6,}$/', message: 'Le mot de passe doit contenir au moins une lettre et un chiffre')]
    private ?string $mot_de_passe = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\NotBlank(message: 'Le type d\'utilisateur est obligatoire')]
    #[Assert\Choice(choices: [self::USER_TYPE_FREELANCE, self::USER_TYPE_FORMATEUR, self::USER_TYPE_EMPLOYEUR], message: 'Veuillez choisir un type d\'utilisateur valide')]
    private ?string $type_utilisateur = null;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_inscription = null;

    #[ORM\Column(length: 15, nullable: true)]
    #[Assert\Regex(pattern: '/^\+?[0-9]{10,15}$/', message: 'Le numéro de téléphone n\'est pas valide')]
    private ?string $telephone = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isActive = true;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastLogin = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    public function setMotDePasse(?string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->type_utilisateur;
    }

    public function setTypeUtilisateur(?string $type_utilisateur): static
    {
        $this->type_utilisateur = $type_utilisateur;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): static
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * Cette méthode est utilisée par Symfony pour la vérification du mot de passe
     * Elle doit retourner le mot de passe hashé stocké dans mot_de_passe
     * 
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        // Cette méthode est CRUCIALE pour l'authentification
        // Elle doit retourner le mot de passe hashé qui sera vérifié par Symfony
        return (string) $this->mot_de_passe;
    }

    public function setPassword(string $password): static
    {
        // Assurez-vous que le mot de passe est stocké dans le champ mot_de_passe
        $this->mot_de_passe = $password;

        return $this;
    }

    public function getAgreeTerms(): bool
    {
        return $this->agreeTerms;
    }

    public function setAgreeTerms(bool $agreeTerms): static
    {
        $this->agreeTerms = $agreeTerms;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): static
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }
}

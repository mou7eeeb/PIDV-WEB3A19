<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`utilisateur`')]
#[UniqueEntity(fields: ['email'], message: 'Il existe déjà un compte avec cet email')]
// Classe représentant un utilisateur de la plateforme
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    // Champ pour vérifier si l'utilisateur accepte les conditions d'utilisation
    #[Assert\IsTrue]
    private bool $agreeTerms = false;

    // Constantes pour les types d'utilisateurs et le rôle administrateur
    public const USER_TYPE_FREELANCE = 'freelance';
    public const USER_TYPE_FORMATEUR = 'formateur';
    public const USER_TYPE_EMPLOYEUR = 'employeur';
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    

    
    // Identifiant unique de l'utilisateur
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Nom de l'utilisateur
    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le nom doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Le nom ne doit contenir que des lettres, des tirets et des espaces')]
    private ?string $nom = null;

    // Prénom de l'utilisateur
    #[ORM\Column(length: 100, nullable: true)]
    #[Assert\Length(min: 2, max: 100, minMessage: 'Le prénom doit contenir au moins {{ limit }} caractères', maxMessage: 'Le prénom ne peut pas dépasser {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ\-\s]+$/', message: 'Le prénom ne doit contenir que des lettres, des tirets et des espaces')]
    private ?string $prenom = null;

    // Email de l'utilisateur (doit être unique)
    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: 'L\'email est obligatoire')]
    #[Assert\Email(message: 'L\'email {{ value }} n\'est pas un email valide')]
    #[Assert\Length(max: 150, maxMessage: 'L\'email ne peut pas dépasser {{ limit }} caractères')]
    private ?string $email = null;

    // Mot de passe de l'utilisateur (stocké de manière sécurisée)
    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(min: 6, max: 4096, minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères')]
    #[Assert\Regex(pattern: '/^(?=.*[A-Za-z])(?=.*[0-9]).{6,}$/', message: 'Le mot de passe doit contenir au moins une lettre et un chiffre')]
    private ?string $mot_de_passe = null;

    // Type d'utilisateur (freelance, formateur, employeur)
    #[ORM\Column(length: 50, nullable: true)]
    #[Assert\NotBlank(message: 'Le type d\'utilisateur est obligatoire')]
    #[Assert\Choice(choices: [self::USER_TYPE_FREELANCE, self::USER_TYPE_FORMATEUR, self::USER_TYPE_EMPLOYEUR], message: 'Veuillez choisir un type d\'utilisateur valide')]
    private ?string $type_utilisateur = null;

    // Rôles de l'utilisateur (ex : ROLE_USER, ROLE_ADMIN)
    #[ORM\Column(type: 'json')]
    private array $roles = [];

    // Date d'inscription de l'utilisateur
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_inscription = null;

    // Numéro de téléphone de l'utilisateur
    #[ORM\Column(length: 15, nullable: true)]
    #[Assert\Regex(pattern: '/^\+?[0-9]{10,15}$/', message: 'Le numéro de téléphone n\'est pas valide')]
    private ?string $telephone = null;

    // Statut actif/inactif de l'utilisateur
    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isActive = true;

    // Image de profil de l'utilisateur
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profileImage = null;

    // Retourne l'identifiant de l'utilisateur
    public function getId(): ?int
    {
        return $this->id;
    }

    // Définit l'identifiant de l'utilisateur
    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    // Retourne le nom de l'utilisateur
    public function getNom(): ?string
    {
        return $this->nom;
    }

    // Définit le nom de l'utilisateur
    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    // Retourne le prénom de l'utilisateur
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    // Définit le prénom de l'utilisateur
    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    // Retourne l'email de l'utilisateur
    public function getEmail(): ?string
    {
        return $this->email;
    }

    // Définit l'email de l'utilisateur
    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    // Retourne le mot de passe hashé de l'utilisateur
    public function getMotDePasse(): ?string
    {
        return $this->mot_de_passe;
    }

    // Définit le mot de passe de l'utilisateur
    public function setMotDePasse(?string $mot_de_passe): static
    {
        $this->mot_de_passe = $mot_de_passe;

        return $this;
    }

    // Retourne le type d'utilisateur
    public function getTypeUtilisateur(): ?string
    {
        return $this->type_utilisateur;
    }

    // Définit le type d'utilisateur
    public function setTypeUtilisateur(?string $type_utilisateur): static
    {
        $this->type_utilisateur = $type_utilisateur;

        return $this;
    }

    // Retourne la date d'inscription
    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    // Définit la date d'inscription
    public function setDateInscription(\DateTimeInterface $date_inscription): static
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    // Retourne le numéro de téléphone
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    // Définit le numéro de téléphone
    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    // Retourne les rôles de l'utilisateur
    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    // Définit les rôles de l'utilisateur
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    // Efface les informations sensibles temporaires
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
    }

    // Retourne l'identifiant unique utilisé par Symfony (email)
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

    // Définit le mot de passe hashé (utilisé par Symfony)
    public function setPassword(string $password): static
    {
        // Assurez-vous que le mot de passe est stocké dans le champ mot_de_passe
        $this->mot_de_passe = $password;

        return $this;
    }

    // Retourne si l'utilisateur a accepté les conditions
    public function getAgreeTerms(): bool
    {
        return $this->agreeTerms;
    }

    // Définit si l'utilisateur accepte les conditions
    public function setAgreeTerms(bool $agreeTerms): static
    {
        $this->agreeTerms = $agreeTerms;

        return $this;
    }

    // Retourne si l'utilisateur est actif
    public function isActive(): bool
    {
        return $this->isActive;
    }

    // Définit le statut actif/inactif de l'utilisateur
    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }

    // Retourne l'image de profil de l'utilisateur
    public function getProfileImage(): ?string
    {
        return $this->profileImage;
    }

    // Définit l'image de profil de l'utilisateur
    public function setProfileImage(?string $profileImage): static
    {
        $this->profileImage = $profileImage;

        return $this;
    }
}

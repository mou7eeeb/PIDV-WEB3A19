<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'user_id', type: 'integer')]
    #[Assert\NotBlank(message: "L'identifiant de l'utilisateur est obligatoire.")]
    #[Assert\Positive(message: "L'identifiant de l'utilisateur doit être un nombre positif.")]
    private ?int $userId = null;

    #[ORM\Column(name: 'formation_id', type: 'string', length: 255)]
    #[Assert\NotBlank(message: "L'identifiant de la formation est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'identifiant de la formation ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $formationId = null;

    #[ORM\Column(name: 'date_inscription', type: 'date')]
    #[Assert\NotBlank(message: "La date d'inscription est obligatoire.")]
    #[Assert\Type(
        type: \DateTimeInterface::class,
        message: "La valeur {{ value }} n'est pas une date valide."
    )]
    #[Assert\LessThanOrEqual(
        value: "today",
        message: "La date d'inscription ne peut pas être dans le futur."
    )]
    private ?\DateTimeInterface $dateInscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getFormationId(): ?string
    {
        return $this->formationId;
    }

    public function setFormationId(string $formationId): self
    {
        $this->formationId = $formationId;
        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;
        return $this;
    }
}

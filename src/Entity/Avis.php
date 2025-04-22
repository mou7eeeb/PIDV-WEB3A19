<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'utilisateur_id', referencedColumnName: 'id', nullable: false)]
    #[Assert\NotNull(message: "L'utilisateur est obligatoire.")]
    private ?User $user = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\NotNull(message: "La note est obligatoire.")]
    #[Assert\Range(
        notInRangeMessage: "La note doit être entre {{ min }} et {{ max }}.",
        min: 1,
        max: 5
    )]
    private ?int $note = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\NotBlank(message: "Le commentaire ne peut pas être vide.")]
    #[Assert\Length(
        min: 10,
        minMessage: "Le commentaire doit contenir au moins {{ limit }} caractères.",
        max: 1000,
        maxMessage: "Le commentaire ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $commentaire = null;

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    #[Assert\NotNull(message: "La date de l'avis est obligatoire.")]
    private ?\DateTimeInterface $dateAvis = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank(message: "Le type d'avis est obligatoire.")]
    #[Assert\Choice(
        choices: ['formation', 'service', 'autre'],
        message: "Le type d'avis doit être 'formation', 'service' ou 'autre'."
    )]
    private ?string $typeAvis = null;

    

    // Getters & Setters...

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): self
    {
        $this->note = $note;
        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getDateAvis(): ?\DateTimeInterface
    {
        return $this->dateAvis;
    }

    public function setDateAvis(?\DateTimeInterface $dateAvis): self
    {
        $this->dateAvis = $dateAvis;
        return $this;
    }

    public function getTypeAvis(): ?string
    {
        return $this->typeAvis;
    }

    public function setTypeAvis(string $typeAvis): self
    {
        $this->typeAvis = $typeAvis;
        return $this;
    }
}

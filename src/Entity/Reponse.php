<?php
// src/Entity/Reponse.php
namespace App\Entity;

use App\Repository\ReponseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;
use Doctrine\ORM\Mapping\ManyToOne;


#[ORM\Entity(repositoryClass: ReponseRepository::class)]
#[ORM\Table(name: 'reponses')]
class Reponse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $reclamationId = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: "Le contenu de la réponse ne peut pas être vide.")]
    #[Assert\Length(min: 10, minMessage: "Le contenu doit contenir au moins {{ limit }} caractères.")]
    private ?string $contenu = null;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $image = null;

    #[ORM\Column(type: 'datetime', nullable: true)] // Autoriser la valeur NULL
    #[Assert\NotBlank(message: "La date de création ne peut pas être vide.")]
    private ?\DateTimeInterface $dateCreation = null;


    #[ORM\ManyToOne(targetEntity: Reclamation::class, inversedBy: 'reponses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Reclamation $reclamation = null;

    // Getters / Setters
    public function getId(): ?int { return $this->id; }
    public function getUser(): ?User
{
    return $this->user;
}

public function setUser(?User $user): self
{
    $this->user = $user;
    return $this;
}

    public function getReclamationId(): ?int { return $this->reclamationId; }
    public function setReclamationId(int $reclamationId): self { $this->reclamationId = $reclamationId; return $this; }

    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): self { $this->userId = $userId; return $this; }

    public function getContenu(): ?string { return $this->contenu; }
    public function setContenu(string $contenu): self { $this->contenu = $contenu; return $this; }

    public function getImage() { return $this->image; }
    public function setImage($image): self { $this->image = $image; return $this; }

    public function getDateCreation(): ?\DateTimeInterface { return $this->dateCreation; }
    public function setDateCreation(\DateTimeInterface $dateCreation): self { $this->dateCreation = $dateCreation; return $this; }

    public function getReclamation(): ?Reclamation { return $this->reclamation; }
    public function setReclamation(?Reclamation $reclamation): self { $this->reclamation = $reclamation; return $this; }
}

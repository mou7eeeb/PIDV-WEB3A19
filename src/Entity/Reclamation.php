<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\User;
use App\Entity\Mission;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: 'L\'utilisateur est requis.')]
    private ?User $user = null;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(message: 'La description ne peut pas être vide.')]
    #[Assert\Length(
        min: 10,
        minMessage: 'La description doit contenir au moins {{ limit }} caractères.'
    )]
    private ?string $description = null;

   
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'missionid', referencedColumnName: 'id', nullable: false)]  // Changer le nom de la colonne ici
    #[Assert\NotNull(message: 'L\'mission est requis.')]
    
    private ?Mission $mission = null;


    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: ['en attente', 'ouvert', 'traité'], message: 'Le statut doit être "en attente", "ouvert" ou "traité".')]
    private ?string $status = 'en attente';

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $date = null; // La date sera automatiquement définie à la date du système


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le titre est requis.')]
    #[Assert\Length(
        min: 5,
        max: 100,
        minMessage: 'Le titre doit contenir au moins {{ limit }} caractères.',
        maxMessage: 'Le titre ne peut pas dépasser {{ limit }} caractères.'
    )]
    private ?string $titre = null;

    #[ORM\Column(options: ['default' => 0])]
    private int $nombreReponses = 0;

    #[ORM\OneToMany(mappedBy: 'reclamation', targetEntity: Reponse::class, orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $reponses;
    

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getMission(): ?Mission
    {
        return $this->mission;
    }

    public function setMission(?Mission $mission): self
    {
        $this->mission = $mission;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getNombreReponses(): ?int
    {
        return $this->nombreReponses;
    }

    public function setNombreReponses(?int $nombreReponses): self
    {
        $this->nombreReponses = $nombreReponses;
        return $this;
    }

    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setReclamation($this);
        }
        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->removeElement($reponse)) {
            if ($reponse->getReclamation() === $this) {
                $reponse->setReclamation(null);
            }
        }
        return $this;
    }
}

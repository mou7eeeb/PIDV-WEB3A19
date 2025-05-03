<?php
// src/Entity/Candidature.php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
#[ORM\Table(name: "candidature")]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: "userId", type: 'integer')]
   // #[Assert\NotBlank(message: "L'ID utilisateur est obligatoire")]
    #[Assert\Positive(message: "L'ID utilisateur doit être positif (valeur reçue: {{ value }})")]
    private ?int $userId = null;

    #[ORM\Column(name: "missionId", type: 'integer')]
   // #[Assert\NotBlank(message: "L'ID de mission est obligatoire")]
    #[Assert\Positive(message: "L'ID de mission doit être positif (valeur reçue: {{ value }})")]
    private ?int $missionId = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom du fichier ne doit pas dépasser {{ limit }} caractères"
    )]
    private ?string $image = null;

    #[ORM\Column(name: "reponseQuestions", type: 'text', nullable: true)]
    #[Assert\Length(
        max: 2000,
        maxMessage: "Les réponses ne doivent pas dépasser {{ limit }} caractères"
    )]
    private ?string $reponseQuestions = null;

    #[ORM\Column(name: "lettreMotivation", type: 'text', nullable: true)]
   // #[Assert\NotBlank(message: "La lettre de motivation est obligatoire")]
    #[Assert\Length(
        min: 100,
        max: 2000,
        minMessage: "Minimum {{ limit }} caractères requis",
        maxMessage: "Maximum {{ limit }} caractères autorisés"
    )]
    private ?string $lettreMotivation = null;

    // Getters et Setters
    public function getId(): ?int { return $this->id; }

    public function getUserId(): ?int { return $this->userId; }
    public function setUserId(int $userId): self { $this->userId = $userId; return $this; }

    public function getMissionId(): ?int { return $this->missionId; }
    public function setMissionId(int $missionId): self { $this->missionId = $missionId; return $this; }

    public function getImage(): ?string { return $this->image; }
    public function setImage(?string $image): self { $this->image = $image; return $this; }

    public function getReponseQuestions(): ?string { return $this->reponseQuestions; }
    public function setReponseQuestions(?string $reponseQuestions): self { 
        $this->reponseQuestions = $reponseQuestions; 
        return $this; 
    }

    public function getLettreMotivation(): ?string { return $this->lettreMotivation; }
    public function setLettreMotivation(?string $lettreMotivation): self { 
        $this->lettreMotivation = $lettreMotivation; 
        return $this; 
    }
}
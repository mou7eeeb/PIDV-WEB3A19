<?php
// src/Entity/Mission.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: "App\Repository\MissionRepository")]
class Mission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank(message: "Le titre est obligatoire")]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: "Le titre doit faire au moins {{ limit }} caractères",
        maxMessage: "Le titre ne peut pas dépasser {{ limit }} caractères"
    )]
    private $titre;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\NotBlank(message: "La description est obligatoire")]
    #[Assert\Length(min: 10, minMessage: "La description doit faire au moins {{ limit }} caractères")]
    private $description;

    #[ORM\Column(type: 'integer', nullable: true)]
    #[Assert\PositiveOrZero(message: "La durée doit être positive ou nulle")]
    private $duree;

    #[ORM\Column(type: 'float', nullable: true)]
    #[Assert\PositiveOrZero(message: "Le budget doit être positif ou nul")]
    private $budget;

    #[ORM\Column(name: 'datePub', type: 'date', nullable: true)]
    #[Assert\NotNull(message: "La date de publication est obligatoire")]
    private $datePub;

    #[ORM\Column(type: 'text', nullable: true)]
    private $questions;

    #[ORM\Column(name: 'competance', type: 'string', length: 255)]
    #[Assert\NotBlank(message: "La compétence est obligatoire")]
    #[Assert\Length(max: 255, maxMessage: "La compétence ne peut pas dépasser {{ limit }} caractères")]
    private $competance; 

    #[ORM\Column(name: 'nomEntreprise', type: 'string', length: 255, nullable: true)]
    #[Assert\Length(max: 255, maxMessage: "Le nom de l'entreprise ne peut pas dépasser {{ limit }} caractères")]
    private $nomEntreprise;

    #[ORM\Column(name: 'nbreUtilisateur', type: 'integer', nullable: true, options: ['default' => 0])]
    #[Assert\PositiveOrZero(message: "Le nombre d'utilisateurs doit être positif ou nul")]
    private $nbreUtilisateur = 0;

    #[ORM\Column(name: 'nombreCandidatures', type: 'integer', nullable: true, options: ['default' => 0])]
    #[Assert\PositiveOrZero(message: "Le nombre de candidatures doit être positif ou nul")]
    private $nombreCandidatures = 0;

    #[ORM\OneToMany(mappedBy: 'mission', targetEntity: Candidature::class)]
    private $candidatures;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
        $this->datePub = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;
        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(?float $budget): self
    {
        $this->budget = $budget;
        return $this;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->datePub;
    }

    public function setDatePub(?\DateTimeInterface $datePub): self
    {
        $this->datePub = $datePub;
        return $this;
    }

    public function getQuestions(): ?string
    {
        return $this->questions;
    }

    public function setQuestions(?string $questions): self
    {
        $this->questions = $questions;
        return $this;
    }

    public function getCompetance(): ?string
    {
        return $this->competance;
    }

    public function setCompetance(string $competance): self
    {
        $this->competance = $competance;
        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(?string $nomEntreprise): self
    {
        $this->nomEntreprise = $nomEntreprise;
        return $this;
    }

    public function getNbreUtilisateur(): ?int
    {
        return $this->nbreUtilisateur;
    }

    public function setNbreUtilisateur(?int $nbreUtilisateur): self
    {
        $this->nbreUtilisateur = $nbreUtilisateur;
        return $this;
    }

    public function getNombreCandidatures(): ?int
    {
        return $this->nombreCandidatures;
    }

    public function setNombreCandidatures(?int $nombreCandidatures): self
    {
        $this->nombreCandidatures = $nombreCandidatures;
        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures->add($candidature);
            $candidature->setMission($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getMission() === $this) {
                $candidature->setMission(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->titre ?? 'Nouvelle Mission';
    }
}
<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank(message: "L'identifiant de publication est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "L'identifiant de publication ne peut pas dépasser {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z0-9\-_]+$/",
        message: "L'identifiant de publication ne peut contenir que des lettres, chiffres, tirets et underscores."
    )]
    private ?string $publication_id = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    #[Assert\NotBlank(message: "Le nom de la formation est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "Le nom de la formation ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $nom = null;

    #[ORM\Column(type: 'text', nullable: true)]
    #[Assert\Length(
        max: 2000,
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $description = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: "La durée est obligatoire.")]
    #[Assert\Positive(message: "La durée doit être un nombre positif.")]
    #[Assert\Range(
        min: 1,
        max: 240,
        notInRangeMessage: "La durée doit être comprise entre {{ min }} et {{ max }} heures."
    )]
    private ?int $duree = null;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank(message: "Le nombre de places est obligatoire.")]
    #[Assert\Positive(message: "Le nombre de places doit être positif.")]
    #[Assert\Range(
        min: 1,
        max: 100,
        notInRangeMessage: "Le nombre de places doit être compris entre {{ min }} et {{ max }}."
    )]
    private ?int $nombre_places = null;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank(message: "Le prix est obligatoire.")]
    #[Assert\PositiveOrZero(message: "Le prix ne peut pas être négatif.")]
    #[Assert\Range(
        min: 0,
        max: 10000,
        notInRangeMessage: "Le prix doit être compris entre {{ min }} et {{ max }} euros."
    )]
    private ?float $prix = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicationId(): ?string
    {
        return $this->publication_id;
    }

    public function setPublicationId(string $publication_id): self
    {
        $this->publication_id = $publication_id;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;
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

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;
        return $this;
    }

    public function getNombrePlaces(): ?int
    {
        return $this->nombre_places;
    }

    public function setNombrePlaces(int $nombre_places): self
    {
        $this->nombre_places = $nombre_places;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }
}

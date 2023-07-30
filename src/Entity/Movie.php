<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
// VALIDATORS
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[UniqueEntity(fields: ['title'], message: 'This title is already in use')]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    #[Assert\NotBlank(message: 'Title is required')]
    #[Assert\Length(max: 120, maxMessage: 'Title cannot be longer than {{ limit }} characters')]
    private ?string $title = null;

    #[ORM\Column(length: 2000)]
    #[Assert\NotBlank(message: 'Description is required')]
    #[Assert\Length(max: 2000, maxMessage: 'Title cannot be longer than {{ limit }} characters')]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Runtime is required')]
    #[Assert\Positive(message: 'Runtime must be a positive number')]
    #[Assert\Range(min: 20, max: 500, notInRangeMessage: 'Runtime must be between {{ min }} and {{ max }} minutes')]
    private ?int $runtime = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Budget is required')]
    #[Assert\Positive(message: 'Budget must be a positive number')]
    private ?int $budget = null;

    #[ORM\Column(length: 250)]
    #[Assert\NotBlank(message: 'Poster is required')]
    #[Assert\Length(max: 250, maxMessage: 'Poster cannot be longer than {{ limit }} characters')]
    #[Assert\Url(message: 'Poster must be a valid URL')]
    private ?string $poster = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'Release date is required')]
    #[Assert\Type(type: 'DateTimeInterface', message: 'Release date must be a valid date')]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'Genre is required')]
    private ?Genre $genre = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'Country is required')]
    private ?Country $country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): static
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): static
    {
        $this->poster = $poster;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }
}

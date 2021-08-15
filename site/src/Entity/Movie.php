<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Model\Media;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_movie")
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string")
     */
    private string $name = '';

    /**
     * @ORM\Column(type="text")
     */
    private string $intro = '';

    /**
     * @ORM\Column(type="text")
     */
    private string $description = '';

    /**
     * @ORM\Column(type="date")
     */
    private ?\DateTime $releaseDate = null;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SonataClassificationCategory")
     * @ORM\JoinTable(
     *     name="app_movie__category",
     *     joinColumns={@ORM\JoinColumn(name="movie_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private Collection $categories;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\SonataMediaMedia", cascade={"persist", "remove"})
     */
    private Media $poster;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIntro(): string
    {
        return $this->intro;
    }

    public function setIntro(string $intro): self
    {
        $this->intro = $intro;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTime $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getPoster(): Media
    {
        return $this->poster;
    }

    public function setPoster(Media $poster): self
    {
        $this->poster = $poster;

        return $this;
    }
}

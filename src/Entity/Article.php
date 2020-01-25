<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\Column(type="text")
     */
    private $meal;

    /**
     * @ORM\Column(type="text")
     */
    private $sleep;

    /**
     * @ORM\Column(type="text")
     */
    private $layers;

    /**
     * @ORM\Column(type="text")
     */
    private $health;

    /**
     * @ORM\Column(type="text")
     */
    private $activity;

    /**
     * @ORM\Column(type="text")
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\child", inversedBy="articles")
     */
    private $child;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    /**
     * @param \DateTimeInterface $datetime
     * @return Article
     */
    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeal(): ?string
    {
        return $this->meal;
    }

    /**
     * @param string $meal
     * @return Article
     */
    public function setMeal(string $meal): self
    {
        $this->meal = $meal;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSleep(): ?string
    {
        return $this->sleep;
    }

    /**
     * @param string $sleep
     * @return Article
     */
    public function setSleep(string $sleep): self
    {
        $this->sleep = $sleep;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLayers(): ?string
    {
        return $this->layers;
    }

    /**
     * @param string $layers
     * @return Article
     */
    public function setLayers(string $layers): self
    {
        $this->layers = $layers;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHealth(): ?string
    {
        return $this->health;
    }

    /**
     * @param string $health
     * @return Article
     */
    public function setHealth(string $health): self
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getActivity(): ?string
    {
        return $this->activity;
    }

    /**
     * @param string $activity
     * @return Article
     */
    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Article
     */
    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return child|null
     */
    public function getChild(): ?child
    {
        return $this->child;
    }

    /**
     * @param child|null $child
     * @return Article
     */
    public function setChild(?child $child): self
    {
        $this->child = $child;

        return $this;
    }
}

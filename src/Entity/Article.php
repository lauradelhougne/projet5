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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getMeal(): ?string
    {
        return $this->meal;
    }

    public function setMeal(string $meal): self
    {
        $this->meal = $meal;

        return $this;
    }

    public function getSleep(): ?string
    {
        return $this->sleep;
    }

    public function setSleep(string $sleep): self
    {
        $this->sleep = $sleep;

        return $this;
    }

    public function getLayers(): ?string
    {
        return $this->layers;
    }

    public function setLayers(string $layers): self
    {
        $this->layers = $layers;

        return $this;
    }

    public function getHealth(): ?string
    {
        return $this->health;
    }

    public function setHealth(string $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getChild(): ?child
    {
        return $this->child;
    }

    public function setChild(?child $child): self
    {
        $this->child = $child;

        return $this;
    }
}

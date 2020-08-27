<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="integer")
     */
    private $childId;

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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getChildId()
    {
        return $this->childId;
    }

    /**
     * @param mixed $childId
     */
    public function setChildId($childId): void
    {
        $this->childId = $childId;
    }

    /**
     * @return mixed
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * @param mixed $datetime
     */
    public function setDatetime($datetime): void
    {
        $this->datetime = $datetime;
    }

    /**
     * @return mixed
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * @param mixed $meal
     */
    public function setMeal($meal): void
    {
        $this->meal = $meal;
    }

    /**
     * @return mixed
     */
    public function getSleep()
    {
        return $this->sleep;
    }

    /**
     * @param mixed $sleep
     */
    public function setSleep($sleep): void
    {
        $this->sleep = $sleep;
    }

    /**
     * @return mixed
     */
    public function getLayers()
    {
        return $this->layers;
    }

    /**
     * @param mixed $layers
     */
    public function setLayers($layers): void
    {
        $this->layers = $layers;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health): void
    {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed $activity
     */
    public function setActivity($activity): void
    {
        $this->activity = $activity;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }
}

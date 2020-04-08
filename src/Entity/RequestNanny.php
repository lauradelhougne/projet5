<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestNannyRepository")
 */
class RequestNanny
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
    private $nannyId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $childLastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $childFirstName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="array", length=255)
     */
    private $daysChildcare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parentLastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $parentFirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

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
    public function getNannyId()
    {
        return $this->nannyId;
    }

    /**
     * @param mixed $nannyId
     */
    public function setNannyId($nannyId): void
    {
        $this->nannyId = $nannyId;
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
    public function setDatetime(): void
    {
        $this->datetime = new \DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getChildLastName()
    {
        return $this->childLastName;
    }

    /**
     * @param mixed $childLastName
     */
    public function setChildLastName($childLastName): void
    {
        $this->childLastName = $childLastName;
    }

    /**
     * @return mixed
     */
    public function getChildFirstName()
    {
        return $this->childFirstName;
    }

    /**
     * @param mixed $childFirstName
     */
    public function setChildFirstName($childFirstName): void
    {
        $this->childFirstName = $childFirstName;
    }

    /**
     * @return mixed
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @param mixed $dateBirth
     */
    public function setDateBirth($dateBirth): void
    {
        $this->dateBirth = $dateBirth;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getDaysChildcare()
    {
        return $this->daysChildcare;
    }

    /**
     * @param mixed $daysChildcare
     */
    public function setDaysChildcare($daysChildcare): void
    {
        $this->daysChildcare = $daysChildcare;
    }

    /**
     * @return mixed
     */
    public function getParentLastName()
    {
        return $this->parentLastName;
    }

    /**
     * @param mixed $parentLastName
     */
    public function setParentLastName($parentLastName): void
    {
        $this->parentLastName = $parentLastName;
    }

    /**
     * @return mixed
     */
    public function getParentFirstName()
    {
        return $this->parentFirstName;
    }

    /**
     * @param mixed $parentFirstName
     */
    public function setParentFirstName($parentFirstName): void
    {
        $this->parentFirstName = $parentFirstName;
    }

    /**
     * @return mixed
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * @param mixed $relation
     */
    public function setRelation($relation): void
    {
        $this->relation = $relation;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }
}

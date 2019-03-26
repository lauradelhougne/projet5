<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RequestRepository")
 */
class Request
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
     * @ORM\Column(type="string", length=255)
     */
    private $ChildLastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ChildFirstName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateBirth;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $daysChildcare;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ParentLastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ParentFirstName;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\nanny", inversedBy="requests")
     */
    private $nanny;

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

    public function getChildLastName(): ?string
    {
        return $this->ChildLastName;
    }

    public function setChildLastName(string $ChildLastName): self
    {
        $this->ChildLastName = $ChildLastName;

        return $this;
    }

    public function getChildFirstName(): ?string
    {
        return $this->ChildFirstName;
    }

    public function setChildFirstName(string $ChildFirstName): self
    {
        $this->ChildFirstName = $ChildFirstName;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(\DateTimeInterface $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getDaysChildcare(): ?string
    {
        return $this->daysChildcare;
    }

    public function setDaysChildcare(string $daysChildcare): self
    {
        $this->daysChildcare = $daysChildcare;

        return $this;
    }

    public function getParentLastName(): ?string
    {
        return $this->ParentLastName;
    }

    public function setParentLastName(string $ParentLastName): self
    {
        $this->ParentLastName = $ParentLastName;

        return $this;
    }

    public function getParentFirstName(): ?string
    {
        return $this->ParentFirstName;
    }

    public function setParentFirstName(string $ParentFirstName): self
    {
        $this->ParentFirstName = $ParentFirstName;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getNanny(): ?nanny
    {
        return $this->nanny;
    }

    public function setNanny(?nanny $nanny): self
    {
        $this->nanny = $nanny;

        return $this;
    }
}

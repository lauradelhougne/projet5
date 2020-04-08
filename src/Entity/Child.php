<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
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
    private $parentsId;

    /**
     * @ORM\Column(type="integer")
     */
    private $nannyId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $birthPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1FamilySituation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1Address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $parent1Postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1City;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $parent1Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent1Profession;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2FamilySituation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2Address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $parent2Postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2City;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $parent2Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent2Profession;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person1LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person1FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person1Relation;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $person1Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person1Address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person2LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person2FirstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person2Relation;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $person2Phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $person2Address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $doctorName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $doctorAddress;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $doctorPhone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $foodAllergy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $drugAllergy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $asthme;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notesAllergy;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getParentsId()
    {
        return $this->parentsId;
    }

    /**
     * @param mixed $parentsId
     */
    public function setParentsId($parentsId): void
    {
        $this->parentsId = $parentsId;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param mixed $birthPlace
     */
    public function setBirthPlace($birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPostal()
    {
        return $this->postal;
    }

    /**
     * @param mixed $postal
     */
    public function setPostal($postal): void
    {
        $this->postal = $postal;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getParent1LastName()
    {
        return $this->parent1LastName;
    }

    /**
     * @param mixed $parent1LastName
     */
    public function setParent1LastName($parent1LastName): void
    {
        $this->parent1LastName = $parent1LastName;
    }

    /**
     * @return mixed
     */
    public function getParent1FirstName()
    {
        return $this->parent1FirstName;
    }

    /**
     * @param mixed $parent1FirstName
     */
    public function setParent1FirstName($parent1FirstName): void
    {
        $this->parent1FirstName = $parent1FirstName;
    }

    /**
     * @return mixed
     */
    public function getParent1FamilySituation()
    {
        return $this->parent1FamilySituation;
    }

    /**
     * @param mixed $parent1FamilySituation
     */
    public function setParent1FamilySituation($parent1FamilySituation): void
    {
        $this->parent1FamilySituation = $parent1FamilySituation;
    }

    /**
     * @return mixed
     */
    public function getParent1Address()
    {
        return $this->parent1Address;
    }

    /**
     * @param mixed $parent1Address
     */
    public function setParent1Address($parent1Address): void
    {
        $this->parent1Address = $parent1Address;
    }

    /**
     * @return mixed
     */
    public function getParent1Postal()
    {
        return $this->parent1Postal;
    }

    /**
     * @param mixed $parent1Postal
     */
    public function setParent1Postal($parent1Postal): void
    {
        $this->parent1Postal = $parent1Postal;
    }

    /**
     * @return mixed
     */
    public function getParent1City()
    {
        return $this->parent1City;
    }

    /**
     * @param mixed $parent1City
     */
    public function setParent1City($parent1City): void
    {
        $this->parent1City = $parent1City;
    }

    /**
     * @return mixed
     */
    public function getParent1Phone()
    {
        return $this->parent1Phone;
    }

    /**
     * @param mixed $parent1Phone
     */
    public function setParent1Phone($parent1Phone): void
    {
        $this->parent1Phone = $parent1Phone;
    }

    /**
     * @return mixed
     */
    public function getParent1Profession()
    {
        return $this->parent1Profession;
    }

    /**
     * @param mixed $parent1Profession
     */
    public function setParent1Profession($parent1Profession): void
    {
        $this->parent1Profession = $parent1Profession;
    }

    /**
     * @return mixed
     */
    public function getParent2LastName()
    {
        return $this->parent2LastName;
    }

    /**
     * @param mixed $parent2LastName
     */
    public function setParent2LastName($parent2LastName): void
    {
        $this->parent2LastName = $parent2LastName;
    }

    /**
     * @return mixed
     */
    public function getParent2FirstName()
    {
        return $this->parent2FirstName;
    }

    /**
     * @param mixed $parent2FirstName
     */
    public function setParent2FirstName($parent2FirstName): void
    {
        $this->parent2FirstName = $parent2FirstName;
    }

    /**
     * @return mixed
     */
    public function getParent2FamilySituation()
    {
        return $this->parent2FamilySituation;
    }

    /**
     * @param mixed $parent2FamilySituation
     */
    public function setParent2FamilySituation($parent2FamilySituation): void
    {
        $this->parent2FamilySituation = $parent2FamilySituation;
    }

    /**
     * @return mixed
     */
    public function getParent2Address()
    {
        return $this->parent2Address;
    }

    /**
     * @param mixed $parent2Address
     */
    public function setParent2Address($parent2Address): void
    {
        $this->parent2Address = $parent2Address;
    }

    /**
     * @return mixed
     */
    public function getParent2Postal()
    {
        return $this->parent2Postal;
    }

    /**
     * @param mixed $parent2Postal
     */
    public function setParent2Postal($parent2Postal): void
    {
        $this->parent2Postal = $parent2Postal;
    }

    /**
     * @return mixed
     */
    public function getParent2City()
    {
        return $this->parent2City;
    }

    /**
     * @param mixed $parent2City
     */
    public function setParent2City($parent2City): void
    {
        $this->parent2City = $parent2City;
    }

    /**
     * @return mixed
     */
    public function getParent2Phone()
    {
        return $this->parent2Phone;
    }

    /**
     * @param mixed $parent2Phone
     */
    public function setParent2Phone($parent2Phone): void
    {
        $this->parent2Phone = $parent2Phone;
    }

    /**
     * @return mixed
     */
    public function getParent2Profession()
    {
        return $this->parent2Profession;
    }

    /**
     * @param mixed $parent2Profession
     */
    public function setParent2Profession($parent2Profession): void
    {
        $this->parent2Profession = $parent2Profession;
    }

    /**
     * @return mixed
     */
    public function getPerson1LastName()
    {
        return $this->person1LastName;
    }

    /**
     * @param mixed $person1LastName
     */
    public function setPerson1LastName($person1LastName): void
    {
        $this->person1LastName = $person1LastName;
    }

    /**
     * @return mixed
     */
    public function getPerson1FirstName()
    {
        return $this->person1FirstName;
    }

    /**
     * @param mixed $person1FirstName
     */
    public function setPerson1FirstName($person1FirstName): void
    {
        $this->person1FirstName = $person1FirstName;
    }

    /**
     * @return mixed
     */
    public function getPerson1Relation()
    {
        return $this->person1Relation;
    }

    /**
     * @param mixed $person1Relation
     */
    public function setPerson1Relation($person1Relation): void
    {
        $this->person1Relation = $person1Relation;
    }

    /**
     * @return mixed
     */
    public function getPerson1Phone()
    {
        return $this->person1Phone;
    }

    /**
     * @param mixed $person1Phone
     */
    public function setPerson1Phone($person1Phone): void
    {
        $this->person1Phone = $person1Phone;
    }

    /**
     * @return mixed
     */
    public function getPerson1Address()
    {
        return $this->person1Address;
    }

    /**
     * @param mixed $person1Address
     */
    public function setPerson1Address($person1Address): void
    {
        $this->person1Address = $person1Address;
    }

    /**
     * @return mixed
     */
    public function getPerson2Relation()
    {
        return $this->person2Relation;
    }

    /**
     * @param mixed $person2Relation
     */
    public function setPerson2Relation($person2Relation): void
    {
        $this->person2Relation = $person2Relation;
    }

    /**
     * @return mixed
     */
    public function getPerson2Phone()
    {
        return $this->person2Phone;
    }

    /**
     * @param mixed $person2Phone
     */
    public function setPerson2Phone($person2Phone): void
    {
        $this->person2Phone = $person2Phone;
    }

    /**
     * @return mixed
     */
    public function getPerson2Address()
    {
        return $this->person2Address;
    }

    /**
     * @param mixed $person2Address
     */
    public function setPerson2Address($person2Address): void
    {
        $this->person2Address = $person2Address;
    }

    /**
     * @return mixed
     */
    public function getDoctorName()
    {
        return $this->doctorName;
    }

    /**
     * @param mixed $doctorName
     */
    public function setDoctorName($doctorName): void
    {
        $this->doctorName = $doctorName;
    }

    /**
     * @return mixed
     */
    public function getDoctorAddress()
    {
        return $this->doctorAddress;
    }

    /**
     * @param mixed $doctorAddress
     */
    public function setDoctorAddress($doctorAddress): void
    {
        $this->doctorAddress = $doctorAddress;
    }

    /**
     * @return mixed
     */
    public function getDoctorPhone()
    {
        return $this->doctorPhone;
    }

    /**
     * @param mixed $doctorPhone
     */
    public function setDoctorPhone($doctorPhone): void
    {
        $this->doctorPhone = $doctorPhone;
    }

    /**
     * @return mixed
     */
    public function getFoodAllergy()
    {
        return $this->foodAllergy;
    }

    /**
     * @param mixed $foodAllergy
     */
    public function setFoodAllergy($foodAllergy): void
    {
        $this->foodAllergy = $foodAllergy;
    }

    /**
     * @return mixed
     */
    public function getDrugAllergy()
    {
        return $this->drugAllergy;
    }

    /**
     * @param mixed $drugAllergy
     */
    public function setDrugAllergy($drugAllergy): void
    {
        $this->drugAllergy = $drugAllergy;
    }

    /**
     * @return mixed
     */
    public function getAsthme()
    {
        return $this->asthme;
    }

    /**
     * @param mixed $asthme
     */
    public function setAsthme($asthme): void
    {
        $this->asthme = $asthme;
    }

    /**
     * @return mixed
     */
    public function getPerson2LastName()
    {
        return $this->person2LastName;
    }

    /**
     * @param mixed $person2LastName
     */
    public function setPerson2LastName($person2LastName): void
    {
        $this->person2LastName = $person2LastName;
    }

    /**
     * @return mixed
     */
    public function getPerson2FirstName()
    {
        return $this->person2FirstName;
    }

    /**
     * @param mixed $person2FirstName
     */
    public function setPerson2FirstName($person2FirstName): void
    {
        $this->person2FirstName = $person2FirstName;
    }

    public function getNotesAllergy(): ?string
    {
        return $this->notesAllergy;
    }

    public function setNotesAllergy(?string $notesAllergy): self
    {
        $this->notesAllergy = $notesAllergy;

        return $this;
    }
}

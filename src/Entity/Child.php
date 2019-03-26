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
     * @ORM\Column(type="string", length=255)
     */
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $BirthDate;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BirthPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $postal;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Parent1LastName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Parent1FirstName;

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
    private $FoodAllergy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $DrugAllergy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Asthme;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notesAllergy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parents", inversedBy="child")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parents;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nanny", inversedBy="Child")
     */
    private $nanny;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="child")
     */
    private $articles;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->BirthDate;
    }

    public function setBirthDate(\DateTimeInterface $BirthDate): self
    {
        $this->BirthDate = $BirthDate;

        return $this;
    }

    public function getBirthPlace(): ?string
    {
        return $this->BirthPlace;
    }

    public function setBirthPlace(?string $BirthPlace): self
    {
        $this->BirthPlace = $BirthPlace;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(?string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getPostal(): ?string
    {
        return $this->postal;
    }

    public function setPostal(?string $postal): self
    {
        $this->postal = $postal;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(?string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getParent1LastName(): ?string
    {
        return $this->Parent1LastName;
    }

    public function setParent1LastName(?string $Parent1LastName): self
    {
        $this->Parent1LastName = $Parent1LastName;

        return $this;
    }

    public function getParent1FirstName(): ?string
    {
        return $this->Parent1FirstName;
    }

    public function setParent1FirstName(?string $Parent1FirstName): self
    {
        $this->Parent1FirstName = $Parent1FirstName;

        return $this;
    }

    public function getParent1FamilySituation(): ?string
    {
        return $this->parent1FamilySituation;
    }

    public function setParent1FamilySituation(?string $parent1FamilySituation): self
    {
        $this->parent1FamilySituation = $parent1FamilySituation;

        return $this;
    }

    public function getParent1Address(): ?string
    {
        return $this->parent1Address;
    }

    public function setParent1Address(?string $parent1Address): self
    {
        $this->parent1Address = $parent1Address;

        return $this;
    }

    public function getParent1Postal(): ?string
    {
        return $this->parent1Postal;
    }

    public function setParent1Postal(?string $parent1Postal): self
    {
        $this->parent1Postal = $parent1Postal;

        return $this;
    }

    public function getParent1City(): ?string
    {
        return $this->parent1City;
    }

    public function setParent1City(?string $parent1City): self
    {
        $this->parent1City = $parent1City;

        return $this;
    }

    public function getParent1Phone(): ?string
    {
        return $this->parent1Phone;
    }

    public function setParent1Phone(?string $parent1Phone): self
    {
        $this->parent1Phone = $parent1Phone;

        return $this;
    }

    public function getParent1Profession(): ?string
    {
        return $this->parent1Profession;
    }

    public function setParent1Profession(?string $parent1Profession): self
    {
        $this->parent1Profession = $parent1Profession;

        return $this;
    }

    public function getParent2LastName(): ?string
    {
        return $this->parent2LastName;
    }

    public function setParent2LastName(?string $parent2LastName): self
    {
        $this->parent2LastName = $parent2LastName;

        return $this;
    }

    public function getParent2FirstName(): ?string
    {
        return $this->parent2FirstName;
    }

    public function setParent2FirstName(?string $parent2FirstName): self
    {
        $this->parent2FirstName = $parent2FirstName;

        return $this;
    }

    public function getParent2FamilySituation(): ?string
    {
        return $this->parent2FamilySituation;
    }

    public function setParent2FamilySituation(?string $parent2FamilySituation): self
    {
        $this->parent2FamilySituation = $parent2FamilySituation;

        return $this;
    }

    public function getParent2Address(): ?string
    {
        return $this->parent2Address;
    }

    public function setParent2Address(?string $parent2Address): self
    {
        $this->parent2Address = $parent2Address;

        return $this;
    }

    public function getParent2Postal(): ?string
    {
        return $this->parent2Postal;
    }

    public function setParent2Postal(?string $parent2Postal): self
    {
        $this->parent2Postal = $parent2Postal;

        return $this;
    }

    public function getParent2City(): ?string
    {
        return $this->parent2City;
    }

    public function setParent2City(?string $parent2City): self
    {
        $this->parent2City = $parent2City;

        return $this;
    }

    public function getParent2Phone(): ?string
    {
        return $this->parent2Phone;
    }

    public function setParent2Phone(?string $parent2Phone): self
    {
        $this->parent2Phone = $parent2Phone;

        return $this;
    }

    public function getParent2Profession(): ?string
    {
        return $this->parent2Profession;
    }

    public function setParent2Profession(?string $parent2Profession): self
    {
        $this->parent2Profession = $parent2Profession;

        return $this;
    }

    public function getPerson1LastName(): ?string
    {
        return $this->person1LastName;
    }

    public function setPerson1LastName(?string $person1LastName): self
    {
        $this->person1LastName = $person1LastName;

        return $this;
    }

    public function getPerson1FirstName(): ?string
    {
        return $this->person1FirstName;
    }

    public function setPerson1FirstName(?string $person1FirstName): self
    {
        $this->person1FirstName = $person1FirstName;

        return $this;
    }

    public function getPerson1Relation(): ?string
    {
        return $this->person1Relation;
    }

    public function setPerson1Relation(?string $person1Relation): self
    {
        $this->person1Relation = $person1Relation;

        return $this;
    }

    public function getPerson1Phone(): ?string
    {
        return $this->person1Phone;
    }

    public function setPerson1Phone(?string $person1Phone): self
    {
        $this->person1Phone = $person1Phone;

        return $this;
    }

    public function getPerson1Address(): ?string
    {
        return $this->person1Address;
    }

    public function setPerson1Address(?string $person1Address): self
    {
        $this->person1Address = $person1Address;

        return $this;
    }

    public function getPerson2LastName(): ?string
    {
        return $this->person2LastName;
    }

    public function setPerson2LastName(?string $person2LastName): self
    {
        $this->person2LastName = $person2LastName;

        return $this;
    }

    public function getPerson2FirstName(): ?string
    {
        return $this->person2FirstName;
    }

    public function setPerson2FirstName(?string $person2FirstName): self
    {
        $this->person2FirstName = $person2FirstName;

        return $this;
    }

    public function getPerson2Relation(): ?string
    {
        return $this->person2Relation;
    }

    public function setPerson2Relation(?string $person2Relation): self
    {
        $this->person2Relation = $person2Relation;

        return $this;
    }

    public function getPerson2Phone(): ?string
    {
        return $this->person2Phone;
    }

    public function setPerson2Phone(?string $person2Phone): self
    {
        $this->person2Phone = $person2Phone;

        return $this;
    }

    public function getPerson2Address(): ?string
    {
        return $this->person2Address;
    }

    public function setPerson2Address(?string $person2Address): self
    {
        $this->person2Address = $person2Address;

        return $this;
    }

    public function getDoctorName(): ?string
    {
        return $this->doctorName;
    }

    public function setDoctorName(?string $doctorName): self
    {
        $this->doctorName = $doctorName;

        return $this;
    }

    public function getDoctorAddress(): ?string
    {
        return $this->doctorAddress;
    }

    public function setDoctorAddress(?string $doctorAddress): self
    {
        $this->doctorAddress = $doctorAddress;

        return $this;
    }

    public function getDoctorPhone(): ?string
    {
        return $this->doctorPhone;
    }

    public function setDoctorPhone(?string $doctorPhone): self
    {
        $this->doctorPhone = $doctorPhone;

        return $this;
    }

    public function getFoodAllergy(): ?bool
    {
        return $this->FoodAllergy;
    }

    public function setFoodAllergy(?bool $FoodAllergy): self
    {
        $this->FoodAllergy = $FoodAllergy;

        return $this;
    }

    public function getDrugAllergy(): ?bool
    {
        return $this->DrugAllergy;
    }

    public function setDrugAllergy(?bool $DrugAllergy): self
    {
        $this->DrugAllergy = $DrugAllergy;

        return $this;
    }

    public function getAsthme(): ?bool
    {
        return $this->Asthme;
    }

    public function setAsthme(?bool $Asthme): self
    {
        $this->Asthme = $Asthme;

        return $this;
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

    public function getParents(): ?Parents
    {
        return $this->parents;
    }

    public function setParents(?Parents $parents): self
    {
        $this->parents = $parents;

        return $this;
    }

    public function getNanny(): ?Nanny
    {
        return $this->nanny;
    }

    public function setNanny(?Nanny $nanny): self
    {
        $this->nanny = $nanny;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setChild($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getChild() === $this) {
                $article->setChild(null);
            }
        }

        return $this;
    }
}

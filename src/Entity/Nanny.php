<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NannyRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'email que vous avez indiqué est déjà utilisé"
 * )
 */
class Nanny implements UserInterface
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
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $postal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diploma;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Email(message="L'adresse mail est invalide", checkMX =true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire minimum 8 caractères")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passe doivent être identiques"))
     */
    public $confirm_password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Child", mappedBy="nanny")
     */
    private $child;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RequestNanny", mappedBy="nanny")
     */
    private $requests;

    public function __construct()
    {
        $this->Child = new ArrayCollection();
        $this->requests = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

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
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDiploma(): ?string
    {
        return $this->diploma;
    }

    public function setDiploma(?string $diploma): self
    {
        $this->diploma = $diploma;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @return Collection|Child[]
     */
    public function getChild(): Collection
    {
        return $this->child;
    }

    public function addChild(Child $child): self
    {
        if (!$this->child->contains($child)) {
            $this->child[] = $child;
            $child->setNanny($this);
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->child->contains($child)) {
            $this->child->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getNanny() === $this) {
                $child->setNanny(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RequestNanny[]
     */
    public function getRequests(): Collection
    {
        return $this->requests;
    }

    public function addRequest(RequestNanny $request): self
    {
        if (!$this->requests->contains($request)) {
            $this->requests[] = $request;
            $request->setNanny($this);
        }

        return $this;
    }

    public function removeRequest(RequestNanny $request): self
    {
        if ($this->requests->contains($request)) {
            $this->requests->removeElement($request);
            // set the owning side to null (unless already changed)
            if ($request->getNanny() === $this) {
                $request->setNanny(null);
            }
        }

        return $this;
    }

    public function getUsername()
    {
        return $this->getLastName;
    }

    public function eraseCredentials(){}

    public function getSalt(){}

    public function getRoles()
    {
        return ['ROLE_USER'];
    }
}

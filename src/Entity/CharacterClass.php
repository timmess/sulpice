<?php

namespace App\Entity;

use App\Repository\CharacterClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterClassRepository::class)
 */
class CharacterClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $baseAttack;

    /**
     * @ORM\Column(type="integer")
     */
    private $baseDefense;

    /**
     * @ORM\Column(type="integer")
     */
    private $baseLifePoints;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="characterClass")
     */
    private $User;

    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBaseAttack(): ?int
    {
        return $this->baseAttack;
    }

    public function setBaseAttack(int $baseAttack): self
    {
        $this->baseAttack = $baseAttack;

        return $this;
    }

    public function getBaseDefense(): ?int
    {
        return $this->baseDefense;
    }

    public function setBaseDefense(int $baseDefense): self
    {
        $this->baseDefense = $baseDefense;

        return $this;
    }

    public function getBaseLifePoints(): ?int
    {
        return $this->baseLifePoints;
    }

    public function setBaseLifePoints(int $baseLifePoints): self
    {
        $this->baseLifePoints = $baseLifePoints;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
            $user->setCharacterClass($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->User->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCharacterClass() === $this) {
                $user->setCharacterClass(null);
            }
        }

        return $this;
    }
}

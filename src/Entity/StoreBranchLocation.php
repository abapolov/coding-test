<?php

namespace App\Entity;

use App\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="store_branch_location")
 * @ORM\Entity(repositoryClass="App\Repository\StoreBranchLocationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class StoreBranchLocation
{
    use TimestampableTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(name="address", type="string", length=500)
     */
    private $address;

    /**
     * @ORM\Column(name="number_of_employees", type="integer")
     */
    private $numberOfEmployees;

    /**
     * @return string|null
     */
    public function __toString(): ?string
    {
        return $this->getName();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string $address
     *
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumberOfEmployees(): ?int
    {
        return $this->numberOfEmployees;
    }

    /**
     * @param int $numberOfEmployees
     *
     * @return $this
     */
    public function setNumberOfEmployees(int $numberOfEmployees): self
    {
        $this->numberOfEmployees = $numberOfEmployees;

        return $this;
    }
}

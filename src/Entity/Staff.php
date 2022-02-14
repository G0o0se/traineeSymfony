<?php

namespace App\Entity;

use App\Repository\StaffRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaffRepository::class)]
class Staff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $Username;

    #[ORM\Column(type: 'string', length: 30)]
    private $Password;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'staff')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getIDCategory(): ?Category
    {
        return $this->IDCategory;
    }

    public function setIDCategory(?Category $IDCategory): self
    {
        $this->IDCategory = $IDCategory;

        return $this;
    }
}

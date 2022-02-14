<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
class Status
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'IDStatus', targetEntity: Order::class)]
    private $orders;

    #[ORM\Column(type: 'string', length: 30)]
    private $TitleStatus;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setIDStatus($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getIDStatus() === $this) {
                $order->setIDStatus(null);
            }
        }

        return $this;
    }

    public function getTitleStatus(): ?string
    {
        return $this->TitleStatus;
    }

    public function setTitleStatus(string $TitleStatus): self
    {
        $this->TitleStatus = $TitleStatus;

        return $this;
    }
}

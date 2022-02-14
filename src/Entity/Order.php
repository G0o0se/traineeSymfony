<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Status::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDStatus;

    #[ORM\OneToMany(mappedBy: 'IDOrder', targetEntity: OrderHasOrderItem::class)]
    private $orderHasOrderItems;

    public function __construct()
    {
        $this->orderHasOrderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDStatus(): ?Status
    {
        return $this->IDStatus;
    }

    public function setIDStatus(?Status $IDStatus): self
    {
        $this->IDStatus = $IDStatus;

        return $this;
    }

    /**
     * @return Collection|OrderHasOrderItem[]
     */
    public function getOrderHasOrderItems(): Collection
    {
        return $this->orderHasOrderItems;
    }

    public function addOrderHasOrderItem(OrderHasOrderItem $orderHasOrderItem): self
    {
        if (!$this->orderHasOrderItems->contains($orderHasOrderItem)) {
            $this->orderHasOrderItems[] = $orderHasOrderItem;
            $orderHasOrderItem->setIDOrder($this);
        }

        return $this;
    }

    public function removeOrderHasOrderItem(OrderHasOrderItem $orderHasOrderItem): self
    {
        if ($this->orderHasOrderItems->removeElement($orderHasOrderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderHasOrderItem->getIDOrder() === $this) {
                $orderHasOrderItem->setIDOrder(null);
            }
        }

        return $this;
    }
}

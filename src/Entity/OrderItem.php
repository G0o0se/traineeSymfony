<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
class OrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $Quantity;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDUser;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDProduct;

    #[ORM\OneToMany(mappedBy: 'IDOrderItem', targetEntity: OrderHasOrderItem::class)]
    private $orderHasOrderItems;

    public function __construct()
    {
        $this->orderHasOrderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getIDUser(): ?User
    {
        return $this->IDUser;
    }

    public function setIDUser(?User $IDUser): self
    {
        $this->IDUser = $IDUser;

        return $this;
    }

    public function getIDProduct(): ?Product
    {
        return $this->IDProduct;
    }

    public function setIDProduct(?Product $IDProduct): self
    {
        $this->IDProduct = $IDProduct;

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
            $orderHasOrderItem->setIDOrderItem($this);
        }

        return $this;
    }

    public function removeOrderHasOrderItem(OrderHasOrderItem $orderHasOrderItem): self
    {
        if ($this->orderHasOrderItems->removeElement($orderHasOrderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderHasOrderItem->getIDOrderItem() === $this) {
                $orderHasOrderItem->setIDOrderItem(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\OrderHasOrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderHasOrderItemRepository::class)]
class OrderHasOrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'orderHasOrderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDOrder;

    #[ORM\ManyToOne(targetEntity: OrderItem::class, inversedBy: 'orderHasOrderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDOrderItem;

    #[ORM\ManyToOne(targetEntity: OrderItem::class, inversedBy: 'orderHasOrderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private $IDUserOrderItem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIDOrder(): ?Order
    {
        return $this->IDOrder;
    }

    public function setIDOrder(?Order $IDOrder): self
    {
        $this->IDOrder = $IDOrder;

        return $this;
    }

    public function getIDOrderItem(): ?OrderItem
    {
        return $this->IDOrderItem;
    }

    public function setIDOrderItem(?OrderItem $IDOrderItem): self
    {
        $this->IDOrderItem = $IDOrderItem;

        return $this;
    }

    public function getIDUserOrderItem(): ?OrderItem
    {
        return $this->IDUserOrderItem;
    }

    public function setIDUserOrderItem(?OrderItem $IDUserOrderItem): self
    {
        $this->IDUserOrderItem = $IDUserOrderItem;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 255)]
    private ?string $supplier = null;

    #[ORM\Column]
    private ?float $cost_price = null;

    #[ORM\Column]
    private ?float $selling_price = null;

    #[ORM\Column]
    private ?int $unit_stock = null;

    #[ORM\Column(type: "date")]
    private ?\DateTimeInterface $delivery_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getSupplier(): ?int
    {
        return $this->supplier;
    }

    public function setSupplier(int $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getCostPrice(): ?float
    {
        return $this->cost_price;
    }

    public function setCostPrice(float $cost_price): static
    {
        $this->cost_price = $cost_price;

        return $this;
    }

    public function getSellingPrice(): ?float
    {
        return $this->selling_price;
    }

    public function setSellingPrice(float $selling_price): static
    {
        $this->selling_price = $selling_price;

        return $this;
    }

    public function getUnitStock(): ?int
    {
        return $this->unit_stock;
    }

    public function setUnitStock(int $unit_stock): static
    {
        $this->unit_stock = $unit_stock;

        return $this;
    }

    public function getDeliveryDate(): ?\DateTimeInterface
    {
        return $this->delivery_date;
    }

    public function setDeliveryDate(\DateTimeInterface $delivery_date): static
    {
        $this->delivery_date = $delivery_date;

        return $this;
    }
}

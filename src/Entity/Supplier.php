<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupplierRepository::class)]
class Supplier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $supplier_name = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_person = null;

    #[ORM\Column(length: 255)]
    private ?string $contact_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupplierName(): ?string
    {
        return $this->supplier_name;
    }

    public function setSupplierName(string $supplier_name): static
    {
        $this->supplier_name = $supplier_name;

        return $this;
    }

    public function getContactPerson(): ?string
    {
        return $this->contact_person;
    }

    public function setContactPerson(string $contact_person): static
    {
        $this->contact_person = $contact_person;

        return $this;
    }

    public function getContactNumber(): ?string
    {
        return $this->contact_number;
    }

    public function setContactNumber(string $contact_number): static
    {
        $this->contact_number = $contact_number;

        return $this;
    }
}

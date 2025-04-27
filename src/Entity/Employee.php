<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $employee_name = null;

    #[ORM\Column(length: 255)]
    private ?string $employee_username = null;

    #[ORM\Column(length: 255)]
    private ?string $employee_password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeName(): ?string
    {
        return $this->employee_name;
    }

    public function setEmployeeName(string $employee_name): static
    {
        $this->employee_name = $employee_name;

        return $this;
    }

    public function getEmployeeUsername(): ?string
    {
        return $this->employee_username;
    }

    public function setEmployeeUsername(string $employee_username): static
    {
        $this->employee_username = $employee_username;

        return $this;
    }

    public function getEmployeePassword(): ?string
    {
        return $this->employee_password;
    }

    public function setEmployeePassword(string $employee_password): static
    {
        $this->employee_password = $employee_password;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $operation_label;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $operation_type;

    /**
     * @ORM\Column(type="float")
     */
    private $operation_amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $operation_date;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="account")
     */
    private $account;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperationLabel(): ?string
    {
        return $this->operation_label;
    }

    public function setOperationLabel(string $operation_label): self
    {
        $this->operation_label = $operation_label;

        return $this;
    }

    public function getOperationType(): ?string
    {
        return $this->operation_type;
    }

    public function setOperationType(string $operation_type): self
    {
        $this->operation_type = $operation_type;

        return $this;
    }

    public function getOperationAmount(): ?float
    {
        return $this->operation_amount;
    }

    public function setOperationAmount(float $operation_amount): self
    {
        $this->operation_amount = $operation_amount;

        return $this;
    }

    public function getOperationDate(): ?\DateTimeInterface
    {
        return $this->operation_date;
    }

    public function setOperationDate(\DateTimeInterface $operation_date): self
    {
        $this->operation_date = $operation_date;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}

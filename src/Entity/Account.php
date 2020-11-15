<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountRepository::class)
 */
class Account
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
    private $account_type;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $account_number;

    /**
     * @ORM\Column(type="date")
     */
    private $opening_date;

    /**
     * @ORM\Column(type="float")
     */
    private $account_amount;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="account")
     */
    private $account;

    public function __construct()
    {
        $this->account = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountType(): ?string
    {
        return $this->account_type;
    }

    public function setAccountType(string $account_type): self
    {
        $this->account_type = $account_type;

        return $this;
    }

    public function getAccountNumber(): ?string
    {
        return $this->account_number;
    }

    public function setAccountNumber(string $account_number): self
    {
        $this->account_number = $account_number;

        return $this;
    }

    public function getOpeningDate(): ?\DateTimeInterface
    {
        return $this->opening_date;
    }

    public function setOpeningDate(\DateTimeInterface $opening_date): self
    {
        $this->opening_date = $opening_date;

        return $this;
    }

    public function getAccountAmount(): ?float
    {
        return $this->account_amount;
    }

    public function setAccountAmount(float $account_amount): self
    {
        $this->account_amount = $account_amount;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Operation[]
     */
    public function getAccount(): Collection
    {
        return $this->account;
    }

    public function addAccount(Operation $account): self
    {
        if (!$this->account->contains($account)) {
            $this->account[] = $account;
            $account->setAccount($this);
        }

        return $this;
    }

    public function removeAccount(Operation $account): self
    {
        if ($this->account->removeElement($account)) {
            // set the owning side to null (unless already changed)
            if ($account->getAccount() === $this) {
                $account->setAccount(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Party
{
    private string $id;

    /** @var Collection<Bankaccount> $bankaccounts */
    private Collection $bankaccounts;

    public function __construct(public string $name)
    {
        $this->id = Uuid::v4()->toString();
        $this->bankaccounts = new ArrayCollection();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Party
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Party
    {
        $this->name = $name;
        return $this;
    }

    public function getBankaccounts(): Collection
    {
        return $this->bankaccounts;
    }

    public function setBankaccounts(Collection $bankaccounts): Party
    {
        $this->bankaccounts = $bankaccounts;
        return $this;
    }

    public function addBankaccount(Bankaccount $bankaccount): Party
    {
        if ($this->bankaccounts->contains($bankaccount) === false) {
            $this->bankaccounts->add($bankaccount);
            $bankaccount->addParty($this);
        }

        return $this;
    }
}

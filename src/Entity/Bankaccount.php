<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Bankaccount
{
    /** @var Collection<Party> */
    public Collection $parties;

    /** @var Collection<Transaction> */
    private Collection $debitTransactions;
    /** @var Collection<Transaction> */
    private Collection $creditTransactions;

    public function __construct(
        public string $iban,
        public Money $balance,
    ) {
        $this->parties = new ArrayCollection();
        $this->debitTransactions = new ArrayCollection();
        $this->creditTransactions = new ArrayCollection();
    }

    public function getIban(): string
    {
        return $this->iban;
    }

    public function setIban(string $iban): Bankaccount
    {
        $this->iban = $iban;
        return $this;
    }

    public function getBalance(): Money
    {
        return $this->balance;
    }

    public function setBalance(Money $balance): Bankaccount
    {
        $this->balance = $balance;
        return $this;
    }

    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function setParties(Collection $parties): Bankaccount
    {
        $this->parties = $parties;
        return $this;
    }

    public function getDebitTransactions(): Collection
    {
        return $this->debitTransactions;
    }

    public function setDebitTransactions(Collection $debitTransactions): Bankaccount
    {
        $this->debitTransactions = $debitTransactions;
        return $this;
    }

    public function getCreditTransactions(): Collection
    {
        return $this->creditTransactions;
    }

    public function setCreditTransactions(Collection $creditTransactions): Bankaccount
    {
        $this->creditTransactions = $creditTransactions;
        return $this;
    }

    public function addParty(Party $party): Bankaccount
    {
        if ($this->parties->contains($party) === false) {
            $this->parties->add($party);
            $party->addBankaccount($this);
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;

class Transaction
{
    private string $id;

    private DateTimeImmutable $date;

    public function __construct(
        public Bankaccount $debitBankaccount,
        public Bankaccount $creditBankaccount,
        public Money $amount,
        public ?string $description = null
    ) {
        $this->id = Uuid::v4()->toString();
        $this->date = new DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Transaction
    {
        $this->id = $id;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Transaction
    {
        $this->description = $description;
        return $this;
    }

    public function getDebitBankaccount(): Bankaccount
    {
        return $this->debitBankaccount;
    }

    public function setDebitBankaccount(Bankaccount $debitBankaccount): Transaction
    {
        $this->debitBankaccount = $debitBankaccount;
        return $this;
    }

    public function getCreditBankaccount(): Bankaccount
    {
        return $this->creditBankaccount;
    }

    public function setCreditBankaccount(Bankaccount $creditBankaccount): Transaction
    {
        $this->creditBankaccount = $creditBankaccount;
        return $this;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function setAmount(Money $amount): Transaction
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): Transaction
    {
        $this->date = $date;
        return $this;
    }
}

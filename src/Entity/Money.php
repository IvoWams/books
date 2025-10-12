<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class Money
{
    public function __construct(
        #[ORM\Column]
        private ?int $amount = null,
        #[ORM\Column]
        private ?string $currency = null
    ) {
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): Money
    {
        $this->amount = $amount;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): Money
    {
        $this->currency = $currency;
        return $this;
    }
}

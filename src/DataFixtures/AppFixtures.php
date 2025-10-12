<?php

namespace App\DataFixtures;

use App\Entity\Bankaccount;
use App\Entity\Money;
use App\Entity\Party;
use App\Entity\Transaction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $partyA = new Party("Ivo Wams");
        $partyB = new Party("Henk de Vries");

        $bankAccountA = new Bankaccount(iban: 'IBAN1234567890', balance: new Money(0, 'EUR'));
        $bankAccountB = new Bankaccount(iban: 'IBAN1234567892', balance: new Money(0, 'EUR'));

        $bankAccountA->addParty($partyA);
        $bankAccountB->addParty($partyB);

        $transaction = new Transaction(
            debitBankaccount: $bankAccountA,
            creditBankaccount: $bankAccountB,
            amount: new Money(10, 'EUR')
        );

        $manager->persist($partyA);
        $manager->persist($partyB);
        $manager->persist($bankAccountA);
        $manager->persist($bankAccountB);
        $manager->persist($transaction);

        $manager->flush();
    }
}

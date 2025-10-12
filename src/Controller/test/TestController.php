<?php

namespace App\Controller\test;

use App\Entity\Bankaccount;
use App\Repository\BankaccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class TestController extends AbstractController
{
    #[Route('/test/bankstatement/{bankaccount}')]
//    #[IsGranted('ROLE_USER')]
    public function bankstatement(string $bankaccount, BankaccountRepository $bankaccountRepository)
    {
        $bankaccount = $bankaccountRepository->find($bankaccount);

        dd($bankaccount);
    }
}

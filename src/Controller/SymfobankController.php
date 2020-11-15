<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Entity\Account;
use App\Entity\Operation;

class SymfobankController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('symfobank/index.html.twig', [
        ]);
    }

    /**
     * @Route("/accounts", name="accounts")
     */
    public function accounts(): Response
    {
        $accountRepository = $this->getDoctrine()->getRepository(Account::class);
        $accounts = $accountRepository->findAll();
        return $this->render('symfobank/accounts.html.twig', [
            'accounts' => $accounts,
        ]);
    }
}

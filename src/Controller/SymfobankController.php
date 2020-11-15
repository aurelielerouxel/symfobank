<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfobankController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @Route("/symfobank", name="symfobank")
     */
    public function index(): Response
    {
        return $this->render('symfobank/index.html.twig', [
            'controller_name' => 'SymfobankController',
        ]);
    }
}

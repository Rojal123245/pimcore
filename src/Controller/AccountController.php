<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class AccountController extends AbstractController
{
    #[Route('/account', name: 'account')]
    #[IsGranted('ROLE_USER')]
    public function index(): Response
    {
        return $this->render('account/index.html.twig', [
            'user' => $this->getUser()
        ]);
    }
}
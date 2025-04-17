<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    #[Route('/shop', name: 'shop_index')]
    public function index(): Response
    {
        return $this->render('shop/index.html.twig');
    }

    #[Route('/shop/cart', name: 'shop_cart')]
    public function cart(): Response
    {
        return $this->render('shop/cart.html.twig', [
            'cart' => $this->getSession()->get('cart', [])
        ]);
    }
}
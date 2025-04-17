<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @Route("/shop/cart", name="shop_cart")
     */
    public function indexAction(Request $request): Response
    {
        return $this->render('ecommerce/cart.html.twig', [
            'cart' => $this->cartService->getCart()
        ]);
    }

    /**
     * @Route("/shop/cart/add", name="shop_cart_add", methods={"POST"})
     */
    public function addAction(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $productId = $data['productId'] ?? null;
        $quantity = $data['quantity'] ?? 1;

        $this->cartService->addItem($productId, $quantity);

        return new JsonResponse([
            'success' => true,
            'cartCount' => $this->cartService->getItemCount()
        ]);
    }

    /**
     * @Route("/shop/cart/remove/{id}", name="shop_cart_remove", methods={"POST"})
     */
    public function removeAction(string $id): JsonResponse
    {
        $this->cartService->removeItem($id);

        return new JsonResponse([
            'success' => true,
            'cartCount' => $this->cartService->getItemCount()
        ]);
    }
}

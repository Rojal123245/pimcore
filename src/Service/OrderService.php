<?php

namespace App\Service;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private $entityManager;
    private $cartService;

    public function __construct(
        EntityManagerInterface $entityManager,
        CartService $cartService
    ) {
        $this->entityManager = $entityManager;
        $this->cartService = $cartService;
    }

    public function createOrder($user): Order
    {
        $cartItems = $this->cartService->getCart();
        $total = $this->cartService->getTotal();

        $order = new Order();
        $order->setUser($user);
        $order->setTotal($total);
        $order->setItems($cartItems);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        return $order;
    }

    public function updateOrderStatus(Order $order, string $status): void
    {
        $order->setStatus($status);
        $this->entityManager->flush();
    }
}
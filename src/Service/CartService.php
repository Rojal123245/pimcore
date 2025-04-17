<?php

namespace App\Service;

use Pimcore\Model\DataObject\Product;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    private $session;

    public function __construct(RequestStack $requestStack)
    {
        $this->session = $requestStack->getSession();
    }

    public function getCart(): array
    {
        $cart = $this->session->get('cart', []);
        $items = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::getById($productId);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $product->getPrice() * $quantity
                ];
            }
        }

        return $items;
    }

    public function addItem(string $productId, int $quantity = 1): void
    {
        $cart = $this->session->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        $this->session->set('cart', $cart);
    }

    public function removeItem(string $productId): void
    {
        $cart = $this->session->get('cart', []);
        unset($cart[$productId]);
        $this->session->set('cart', $cart);
    }

    public function getItemCount(): int
    {
        $cart = $this->session->get('cart', []);
        return array_sum($cart);
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->getCart() as $item) {
            $total += $item['total'];
        }
        return $total;
    }
}
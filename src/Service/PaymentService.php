<?php

namespace App\Service;

use App\Entity\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentService
{
    private $stripeSecretKey;

    public function __construct(string $stripeSecretKey)
    {
        $this->stripeSecretKey = $stripeSecretKey;
        Stripe::setApiKey($this->stripeSecretKey);
    }

    public function createPaymentIntent(Order $order): PaymentIntent
    {
        return PaymentIntent::create([
            'amount' => $order->getTotal() * 100, // Convert to cents
            'currency' => 'usd',
            'metadata' => [
                'order_id' => $order->getId()
            ]
        ]);
    }

    public function confirmPayment(string $paymentIntentId): bool
    {
        try {
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            return $paymentIntent->status === 'succeeded';
        } catch (\Exception $e) {
            return false;
        }
    }
}
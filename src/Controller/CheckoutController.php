<?php

namespace App\Controller;

use App\Service\OrderService;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CheckoutController extends AbstractController
{
    private $orderService;
    private $paymentService;

    public function __construct(
        OrderService $orderService,
        PaymentService $paymentService
    ) {
        $this->orderService = $orderService;
        $this->paymentService = $paymentService;
    }

    /**
     * @Route("/checkout", name="checkout")
     */
    public function index(): Response
    {
        $order = $this->orderService->createOrder($this->getUser());
        $paymentIntent = $this->paymentService->createPaymentIntent($order);

        return $this->render('ecommerce/checkout.html.twig', [
            'clientSecret' => $paymentIntent->client_secret,
            'order' => $order
        ]);
    }

    /**
     * @Route("/checkout/complete", name="checkout_complete", methods={"POST"})
     */
    public function complete(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $paymentIntentId = $data['payment_intent_id'];

        if ($this->paymentService->confirmPayment($paymentIntentId)) {
            // Update order status and clear cart
            return new JsonResponse(['success' => true]);
        }

        return new JsonResponse(['success' => false], 400);
    }
}
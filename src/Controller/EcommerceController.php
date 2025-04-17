<?php

namespace App\Controller;

use App\Service\FakeApiService;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EcommerceController extends FrontendController
{
    private $fakeApiService;

    public function __construct(FakeApiService $fakeApiService)
    {
        $this->fakeApiService = $fakeApiService;
    }

    /**
     * @Route("/shop", name="shop_index")
     */
    public function indexAction(Request $request): Response
    {
        $products = new Product\Listing();
        $products->setOrderKey("price");
        $products->setOrder("asc");

        if ($category = $request->query->get('category')) {
            $products->setCondition("category = ?", [$category]);
        }

        if ($isGrocery = $request->query->get('grocery')) {
            $products->setCondition("isGrocery = ?", [true]);
        }

        return $this->render('ecommerce/index.html.twig', [
            'products' => $products,
            'categories' => $this->fakeApiService->getCategories()
        ]);
    }

    /**
     * @Route("/shop/product/{id}", name="shop_product_detail")
     */
    public function productDetailAction(Request $request, string $id): Response
    {
        $product = Product::getById($id);

        if (!$product) {
            throw $this->createNotFoundException('Product not found');
        }

        return $this->render('ecommerce/product_detail.html.twig', [
            'product' => $product
        ]);
    }
}
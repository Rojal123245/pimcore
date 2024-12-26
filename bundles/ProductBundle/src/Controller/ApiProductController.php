<?php

namespace App\Controller;

use Pimcore\Model\DataObject\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiProductController extends AbstractController
{
    /**
     * @Route("/api/products", name="api_products", methods={"GET"})
     */
    public function getProducts(): JsonResponse
    {
        
        $products = new Product\Listing();
        $products->setLimit(10); // Limit to 10 products

        $productData = [];
        foreach ($products as $product) {
            $productData[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),
                'sku' => $product->getSku(),
                'category' => $product->getCategory() ? $product->getCategory()->getName() : null,
               
            ];
        }

        return $this->json($productData);
    }

    /**
     * @Route("/api/product/{id}", name="api_product_detail", methods={"GET"})
     */
    public function getProduct($id): JsonResponse
    {
        // Fetch product by ID
        $product = Product::getById($id);

        if (!$product) {
            return $this->json(['error' => 'Product not found'], 404);
        }

        $productData = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'sku' => $product->getSku(),
            'category' => $product->getCategory() ? $product->getCategory()->getName() : null,
           
        ];

        return $this->json($productData);
    }
}

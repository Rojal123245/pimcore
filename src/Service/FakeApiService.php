<?php

namespace App\Service;

class FakeApiService
{
    public function getAllProducts(): array
    {
        // Simulate API response with fake product data
        return [
            [
                'name' => 'Sample Product 1',
                'sku' => 'SKU001',
                'price' => 99.99,
                'description' => 'This is a sample product description',
                'brand' => 'Sample Brand',
                'stock' => 100,
                'weight' => 1.5
            ],
            [
                'name' => 'Sample Product 2',
                'sku' => 'SKU002',
                'price' => 149.99,
                'description' => 'Another sample product description',
                'brand' => 'Sample Brand',
                'stock' => 50,
                'weight' => 2.0
            ]
        ];
    }

    public function getProductById(string $id): ?array
    {
        $products = $this->getAllProducts();
        $filtered = array_values(array_filter($products, fn($product) => $product['sku'] === $id));
        return $filtered[0] ?? null;
    }
}

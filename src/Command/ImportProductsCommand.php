<?php

namespace App\Command;

use App\Service\FakeApiService;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Product;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportProductsCommand extends AbstractCommand
{
    private $fakeApiService;

    public function __construct(FakeApiService $fakeApiService)
    {
        parent::__construct();
        $this->fakeApiService = $fakeApiService;
    }

    protected function configure()
    {
        $this->setName('app:import-products')
            ->setDescription('Import products from Fake API');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $products = $this->fakeApiService->getAllProducts();

        foreach ($products as $productData) {
            $product = new Product();
            $product->setParent(Product::getByPath('/products'));
            $product->setKey(\Pimcore\Model\Element\Service::getValidKey($productData['title'], 'object'));
            $product->setPublished(true);
            
            $product->setName($productData['title']);
            $product->setSku(uniqid('SKU-'));
            $product->setPrice($productData['price']);
            $product->setDescription($productData['description']);
            $product->setCategory($productData['category']);
            $product->setStock(rand(10, 100));
            $product->setIsGrocery(str_contains(strtolower($productData['category']), 'food'));
            
            $product->save();
            
            $output->writeln(sprintf('Imported product: %s', $productData['title']));
        }

        return 0;
    }
}
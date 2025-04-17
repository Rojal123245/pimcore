<?php

return [
    Pimcore\Bundle\SimpleBackendSearchBundle\PimcoreSimpleBackendSearchBundle::class => ['all' => true],
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Pimcore\Bundle\TinymceBundle\PimcoreTinymceBundle::class => ['all' => true],
    Pimcore\Bundle\ApplicationLoggerBundle\PimcoreApplicationLoggerBundle::class => ['all' => true],
    Pimcore\Bundle\SeoBundle\PimcoreSeoBundle::class => ['all' => true],
    Pimcore\Bundle\StaticRoutesBundle\PimcoreStaticRoutesBundle::class => ['all' => true],
    Pimcore\Bundle\UuidBundle\PimcoreUuidBundle::class => ['all' => true, 'priority' => 100],
    Symfony\WebpackEncoreBundle\WebpackEncoreBundle::class => ['all' => true],
    Pimcore\Bundle\XliffBundle\PimcoreXliffBundle::class => ['all' => true],
    Pimcore\Bundle\WordExportBundle\PimcoreWordExportBundle::class => ['all' => true],
    Pimcore\Bundle\CustomReportsBundle\PimcoreCustomReportsBundle::class => ['all' => true],
    Pimcore\Bundle\GlossaryBundle\PimcoreGlossaryBundle::class => ['all' => true],
    Pimcore\Bundle\AdminBundle\PimcoreAdminBundle::class => ['all' => true, 'priority' => 100],
    Pimcore\Bundle\PerspectiveEditorBundle\PimcorePerspectiveEditorBundle::class => ['all' => true],
    Pimcore\Bundle\DataImporterBundle\PimcoreDataImporterBundle::class => ['all' => true],
    Pimcore\Bundle\DataHubBundle\PimcoreDataHubBundle::class => ['all' => true, 'priority' => 100],
    Pimcore\Bundle\BundleGeneratorBundle\PimcoreBundleGeneratorBundle::class => ['all' => true],
    ProductBundle\ProductBundle::class => ['all' => true],
];

<?php

namespace App\Twig;

use Pimcore\Model\Document;
use Pimcore\Tool;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppLocaleSwitcherExtension extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('app_locales', [$this, 'getAppLocales'])
        ];
    }

    public function getAppLocales(): array
    {
        $languages =  Tool::getValidLanguages();
        $validLanguages = [];

        foreach($languages as $language) {
            if (Document::getByPath('/' . $language)) {
                $validLanguages[] = $language;
            }
        }

        return $validLanguages;

    }

}

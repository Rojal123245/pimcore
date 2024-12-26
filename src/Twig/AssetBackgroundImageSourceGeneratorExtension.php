<?php

namespace App\Twig;

use DOMDocument;
use DOMXPath;
use Pimcore\Model\Asset;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Pimcore\Model\Document\Editable\Image;

class AssetBackgroundImageSourceGeneratorExtension extends AbstractExtension
{

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_asset_background_image_srcset', [$this, 'getAssetBackgroundImageSrcset']),
            new TwigFunction('get_asset_background_image_srcset_string', [$this, 'generateSrcSetString']),
        ];
    }

    public function getAssetBackgroundImageSrcset(Image|Asset\Image $asset, string $thumbnailName): array
    {
        if ($asset instanceof Image) {
            if ($asset->isEmpty()) {
                return [];
            }
            $image = $asset->getImage();
        } else {
            $image = $asset;
        }
        $html = $image->getThumbnail($thumbnailName)->getHtml();
        return $this->extractSrcsetValues($html);
    }

    public function generateSrcSetString(Image|Asset\Image $asset, string $thumbnail): string
    {

        $data = [];
        foreach ($this->getAssetBackgroundImageSrcset($asset, $thumbnail) as $item) {
            $item = explode(' ', $item);
            $data[] = [
                'url' => $item[0],
                'size' => $item[1],
            ];
        }
        return $this->getSrcSetString($data);
    }

    protected function getSrcSetString(array $srcSet): string
    {
        if (empty($srcSet)) {
            return '';
        }

        $imageSet = implode(';' . PHP_EOL, array_map(function ($url) {
            return "url({$url['url']}) {$url['size']}";
        }, $srcSet));

        return <<<CSS
            background: url({$srcSet[0]['url']});
            background: image-set(
                {$imageSet}
            );
            background: -webkit-image-set(
                {$imageSet}
            );
        CSS;
    }

    protected function extractSrcsetValues($xmlString): array
    {
        $srcsetValues = [];

        // Create a new DOMDocument
        $doc = new DOMDocument();

        // Load the XML string
        if ($doc->loadXML($xmlString)) {
            // Create a DOMXPath object to query the document
            $xpath = new DOMXPath($doc);

            // Find all elements with a srcset attribute
            $elements = $xpath->query('//*[@srcset]');

            foreach ($elements as $element) {
                // Get the value of the srcset attribute
                $srcset = $element->getAttribute('srcset');

                // Split the srcset attribute into an array of values
                $srcsetArray = preg_split('/\s*,\s*/', $srcset);

                // Add the array of values to the result array
                $srcsetValues[] = $srcsetArray;
            }
        }

        $items = [];
        array_walk_recursive($srcsetValues, function ($item) use (&$items) {
            $items[] = trim($item);
        });

        return array_unique($items);
    }

}

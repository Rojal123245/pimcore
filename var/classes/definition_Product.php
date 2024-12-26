<?php

/**
 * Inheritance: yes
 * Variants: yes
 *
 * Fields Summary:
 * - name [input]
 * - sku [input]
 * - short_description [textarea]
 * - description [wysiwyg]
 * - product_category [select]
 * - vendor_cogs [numeric]
 * - vendor_price [numeric]
 * - wholesale_Price [numeric]
 * - final_retail_price [numeric]
 * - suggested_retail_price [numeric]
 * - currency [select]
 * - thc [quantityValue]
 * - cbd [quantityValue]
 * - thc_percentage [quantityValueRange]
 * - cbd_percentage [quantityValueRange]
 * - product_photos [imageGallery]
 * - weight [quantityValue]
 * - total_length [quantityValue]
 * - total_width [quantityValue]
 * - total_height [quantityValue]
 * - total_weight [quantityValue]
 * - brand_relationship [manyToOneRelation]
 * - flavor [manyToOneRelation]
 * - strain [manyToOneRelation]
 */

return \Pimcore\Model\DataObject\ClassDefinition::__set_state(array(
   'dao' => NULL,
   'id' => 'product',
   'name' => 'Product',
   'title' => '',
   'description' => '',
   'creationDate' => NULL,
   'modificationDate' => 1731176842,
   'userOwner' => 2,
   'userModification' => 2,
   'parentClass' => '',
   'implementsInterfaces' => '',
   'listingParentClass' => '',
   'useTraits' => '',
   'listingUseTraits' => '',
   'encryption' => false,
   'encryptedTables' => 
  array (
  ),
   'allowInherit' => true,
   'allowVariants' => true,
   'showVariants' => true,
   'layoutDefinitions' => 
  \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
     'name' => 'pimcore_root',
     'type' => NULL,
     'region' => NULL,
     'title' => NULL,
     'width' => 0,
     'height' => 0,
     'collapsible' => false,
     'collapsed' => false,
     'bodyStyle' => NULL,
     'datatype' => 'layout',
     'children' => 
    array (
      0 => 
      \Pimcore\Model\DataObject\ClassDefinition\Layout\Panel::__set_state(array(
         'name' => 'Layout',
         'type' => NULL,
         'region' => NULL,
         'title' => '',
         'width' => '',
         'height' => '',
         'collapsible' => false,
         'collapsed' => false,
         'bodyStyle' => '',
         'datatype' => 'layout',
         'children' => 
        array (
          0 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'General',
             'type' => NULL,
             'region' => NULL,
             'title' => 'General',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'name',
                 'title' => 'Name',
                 'tooltip' => '',
                 'mandatory' => true,
                 'noteditable' => false,
                 'index' => true,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Input::__set_state(array(
                 'name' => 'sku',
                 'title' => 'Sku',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => true,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'columnLength' => 190,
                 'regex' => '',
                 'regexFlags' => 
                array (
                ),
                 'unique' => false,
                 'showCharCount' => false,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::__set_state(array(
                 'name' => 'short_description',
                 'title' => 'Short  Description',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'maxLength' => 255,
                 'showCharCount' => true,
                 'excludeFromSearchIndex' => false,
                 'height' => '',
                 'width' => '',
              )),
              3 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::__set_state(array(
                 'name' => 'description',
                 'title' => 'Description',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'toolbarConfig' => '',
                 'excludeFromSearchIndex' => false,
                 'maxCharacters' => '',
                 'height' => '',
                 'width' => '',
              )),
              4 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'product_category',
                 'title' => 'Product category',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'Accessories > Papers/Wraps/Tips',
                    'value' => ' A1',
                  ),
                  1 => 
                  array (
                    'key' => 'Accessories > Vape parts - ex. coils',
                    'value' => ' A2',
                  ),
                  2 => 
                  array (
                    'key' => 'Accessories > USB Charger/Battery',
                    'value' => ' A3',
                  ),
                  3 => 
                  array (
                    'key' => 'Accessories > Smoking Tools - ex. pipe',
                    'value' => ' A4',
                  ),
                  4 => 
                  array (
                    'key' => 'Accessories > Other Accessories',
                    'value' => ' A5',
                  ),
                  5 => 
                  array (
                    'key' => 'Concentrates > Sauce',
                    'value' => ' C1',
                  ),
                  6 => 
                  array (
                    'key' => 'Concentrates > Live Resin',
                    'value' => ' C10',
                  ),
                  7 => 
                  array (
                    'key' => 'Concentrates > Diamonds',
                    'value' => ' C11',
                  ),
                  8 => 
                  array (
                    'key' => 'Concentrates > Other Concentrates',
                    'value' => ' C12',
                  ),
                  9 => 
                  array (
                    'key' => 'Concentrates > Caviar',
                    'value' => ' C13',
                  ),
                  10 => 
                  array (
                    'key' => 'Concentrates > Live Hash Rosin',
                    'value' => ' C14',
                  ),
                  11 => 
                  array (
                    'key' => 'Concentrates > Canna-Doh',
                    'value' => ' C15',
                  ),
                  12 => 
                  array (
                    'key' => 'Concentrates > Moonrock',
                    'value' => ' C16',
                  ),
                  13 => 
                  array (
                    'key' => 'Concentrates > Distillate',
                    'value' => ' C2',
                  ),
                  14 => 
                  array (
                    'key' => 'Concentrates > Shatter',
                    'value' => ' C3',
                  ),
                  15 => 
                  array (
                    'key' => 'Concentrates > Isolate',
                    'value' => ' C4',
                  ),
                  16 => 
                  array (
                    'key' => 'Concentrates > Hash',
                    'value' => ' C5',
                  ),
                  17 => 
                  array (
                    'key' => 'Concentrates > Live Rosin',
                    'value' => ' C6',
                  ),
                  18 => 
                  array (
                    'key' => 'Concentrates > Kief',
                    'value' => ' C7',
                  ),
                  19 => 
                  array (
                    'key' => 'Concentrates > Oil',
                    'value' => ' C8',
                  ),
                  20 => 
                  array (
                    'key' => 'Concentrates > Wax/Budder',
                    'value' => ' C9',
                  ),
                  21 => 
                  array (
                    'key' => 'Edibles > Candies',
                    'value' => ' E1',
                  ),
                  22 => 
                  array (
                    'key' => 'Edibles > Chocolates',
                    'value' => ' E2',
                  ),
                  23 => 
                  array (
                    'key' => 'Edibles > Capsules',
                    'value' => ' E3',
                  ),
                  24 => 
                  array (
                    'key' => 'Edibles > Drinks',
                    'value' => ' E4',
                  ),
                  25 => 
                  array (
                    'key' => 'Edibles > Baked Goods',
                    'value' => ' E5',
                  ),
                  26 => 
                  array (
                    'key' => 'Edibles > Tears',
                    'value' => ' E6',
                  ),
                  27 => 
                  array (
                    'key' => 'Edibles > Other Edibles',
                    'value' => ' E7',
                  ),
                  28 => 
                  array (
                    'key' => 'Flower > Flower',
                    'value' => ' F0',
                  ),
                  29 => 
                  array (
                    'key' => 'Flower > Seeds',
                    'value' => ' F1',
                  ),
                  30 => 
                  array (
                    'key' => 'Flower > Pre-Roll',
                    'value' => ' F4',
                  ),
                  31 => 
                  array (
                    'key' => '> All Packs',
                    'value' => ' M0',
                  ),
                  32 => 
                  array (
                    'key' => 'Pets > Pet Tinctures/Topicals',
                    'value' => ' P1',
                  ),
                  33 => 
                  array (
                    'key' => 'Pets > Pet Treats',
                    'value' => ' P2',
                  ),
                  34 => 
                  array (
                    'key' => 'Topicals > Topicals',
                    'value' => ' T1',
                  ),
                  35 => 
                  array (
                    'key' => 'Tinctures > Tinctures',
                    'value' => ' T2',
                  ),
                  36 => 
                  array (
                    'key' => 'Topicals > Bath Bomb/Salt',
                    'value' => ' T3',
                  ),
                  37 => 
                  array (
                    'key' => 'Vapes > Re-Chargeable Pen',
                    'value' => ' V1',
                  ),
                  38 => 
                  array (
                    'key' => 'Vapes > Disposable Pen',
                    'value' => ' V2',
                  ),
                  39 => 
                  array (
                    'key' => 'Vapes > Cartridge',
                    'value' => ' V3',
                  ),
                  40 => 
                  array (
                    'key' => 'Vapes > Console',
                    'value' => ' V4',
                  ),
                  41 => 
                  array (
                    'key' => 'Mushroom > Dried Mushroom',
                    'value' => ' MD01',
                  ),
                  42 => 
                  array (
                    'key' => 'Mushroom > Edible Mushroom',
                    'value' => ' ME01',
                  ),
                  43 => 
                  array (
                    'key' => 'Mushroom > Mushroom Capsules',
                    'value' => ' M3',
                  ),
                  44 => 
                  array (
                    'key' => 'Mushroom > Mushroom Tincture',
                    'value' => ' M4',
                  ),
                  45 => 
                  array (
                    'key' => 'LSD > LSD Tabs',
                    'value' => ' L1',
                  ),
                  46 => 
                  array (
                    'key' => 'LSD > LSD Dropper',
                    'value' => ' L2',
                  ),
                  47 => 
                  array (
                    'key' => 'LSD > LSD Edibles',
                    'value' => ' L3',
                  ),
                  48 => 
                  array (
                    'key' => 'DMT > DMT Vape Cartridges',
                    'value' => ' D1',
                  ),
                  49 => 
                  array (
                    'key' => 'DMT Other',
                    'value' => 'D2',
                  ),
                ),
                 'defaultValue' => 'D2',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'configure',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          1 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Pricing',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Pricing',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'vendor_cogs',
                 'title' => 'Vendor Cogs',
                 'tooltip' => 'Providing your COGS is optional but can help us better understand margins for promotions or discounts.',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'vendor_price',
                 'title' => 'Vendor Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'wholesale_Price',
                 'title' => 'Wholesale Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              3 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'final_retail_price',
                 'title' => 'Final Retail Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              4 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::__set_state(array(
                 'name' => 'suggested_retail_price',
                 'title' => 'Suggested Retail Price',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'unique' => false,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
                 'width' => '',
                 'defaultValueGenerator' => '',
              )),
              5 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\Select::__set_state(array(
                 'name' => 'currency',
                 'title' => 'Currency',
                 'tooltip' => '',
                 'mandatory' => true,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'options' => 
                array (
                  0 => 
                  array (
                    'key' => 'USD',
                    'value' => 'USD',
                  ),
                  1 => 
                  array (
                    'key' => 'CAD',
                    'value' => 'CAD',
                  ),
                ),
                 'defaultValue' => 'CAD',
                 'columnLength' => 190,
                 'dynamicOptions' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'optionsProviderType' => 'configure',
                 'optionsProviderClass' => '',
                 'optionsProviderData' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          2 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'THC CBD',
             'type' => NULL,
             'region' => NULL,
             'title' => 'THC & CBD',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'thc',
                 'title' => 'THC',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'mg',
                 'validUnits' => 
                array (
                  0 => 'percentage',
                  1 => 'mg',
                  2 => 'mg_g',
                  3 => 'mg_inhalation',
                  4 => 'mgperunit',
                  5 => 'Microgram',
                  6 => 'microgram_inhalation',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => 0.0,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'cbd',
                 'title' => 'CBD',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'mg',
                 'validUnits' => 
                array (
                  0 => 'percentage',
                  1 => 'mg',
                  2 => 'mg_g',
                  3 => 'mg_inhalation',
                  4 => 'mgperunit',
                  5 => 'Microgram',
                  6 => 'microgram_inhalation',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValueRange::__set_state(array(
                 'name' => 'thc_percentage',
                 'title' => 'THC %',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'percentage',
                 'validUnits' => 
                array (
                  0 => 'percentage',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'width' => '',
              )),
              3 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValueRange::__set_state(array(
                 'name' => 'cbd_percentage',
                 'title' => 'CBD %',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'percentage',
                 'validUnits' => 
                array (
                  0 => 'percentage',
                ),
                 'decimalPrecision' => NULL,
                 'autoConvert' => false,
                 'width' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          3 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Media',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Media',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::__set_state(array(
                 'name' => 'product_photos',
                 'title' => 'Product Photos',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => false,
                 'visibleSearch' => false,
                 'blockedVarsForExport' => 
                array (
                ),
                 'uploadPath' => '/peerglobe',
                 'ratioX' => NULL,
                 'ratioY' => NULL,
                 'predefinedDataTemplates' => '',
                 'height' => '',
                 'width' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          4 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Dimension',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Dimension Unit',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'weight',
                 'title' => 'Weight',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'g',
                 'validUnits' => 
                array (
                  0 => 'g',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          5 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Packaging Dimension',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Packaging',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'total_length',
                 'title' => 'Length',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'cm',
                 'validUnits' => 
                array (
                  0 => 'cm',
                  1 => 'g',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'total_width',
                 'title' => 'Width',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'cm',
                 'validUnits' => 
                array (
                  0 => 'cm',
                  1 => 'g',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'total_height',
                 'title' => 'Height',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'cm',
                 'validUnits' => 
                array (
                  0 => 'g',
                  1 => 'cm',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
              3 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::__set_state(array(
                 'name' => 'total_weight',
                 'title' => 'Weight',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => false,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'unitWidth' => '',
                 'defaultUnit' => 'g',
                 'validUnits' => 
                array (
                  0 => 'g',
                  1 => 'cm',
                ),
                 'unique' => false,
                 'autoConvert' => false,
                 'defaultValueGenerator' => '',
                 'width' => '',
                 'defaultValue' => NULL,
                 'integer' => false,
                 'unsigned' => false,
                 'minValue' => NULL,
                 'maxValue' => NULL,
                 'decimalSize' => NULL,
                 'decimalPrecision' => NULL,
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
          6 => 
          \Pimcore\Model\DataObject\ClassDefinition\Layout\Fieldset::__set_state(array(
             'name' => 'Relation',
             'type' => NULL,
             'region' => NULL,
             'title' => 'Relation',
             'width' => '',
             'height' => '',
             'collapsible' => true,
             'collapsed' => true,
             'bodyStyle' => '',
             'datatype' => 'layout',
             'children' => 
            array (
              0 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'name' => 'brand_relationship',
                 'title' => 'Brand ',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Brand',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'assetUploadPath' => '',
                 'allowToClearRelation' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => '',
              )),
              1 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'name' => 'flavor',
                 'title' => 'Flavor',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Flavor',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'assetUploadPath' => '',
                 'allowToClearRelation' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => '',
              )),
              2 => 
              \Pimcore\Model\DataObject\ClassDefinition\Data\ManyToOneRelation::__set_state(array(
                 'name' => 'strain',
                 'title' => 'Strain',
                 'tooltip' => '',
                 'mandatory' => false,
                 'noteditable' => false,
                 'index' => false,
                 'locked' => false,
                 'style' => '',
                 'permissions' => NULL,
                 'fieldtype' => '',
                 'relationType' => true,
                 'invisible' => false,
                 'visibleGridView' => true,
                 'visibleSearch' => true,
                 'blockedVarsForExport' => 
                array (
                ),
                 'classes' => 
                array (
                  0 => 
                  array (
                    'classes' => 'Strain',
                  ),
                ),
                 'displayMode' => 'grid',
                 'pathFormatterClass' => '',
                 'assetInlineDownloadAllowed' => false,
                 'assetUploadPath' => '',
                 'allowToClearRelation' => true,
                 'objectsAllowed' => true,
                 'assetsAllowed' => false,
                 'assetTypes' => 
                array (
                ),
                 'documentsAllowed' => false,
                 'documentTypes' => 
                array (
                ),
                 'width' => '',
              )),
            ),
             'locked' => false,
             'blockedVarsForExport' => 
            array (
            ),
             'fieldtype' => 'fieldset',
             'labelWidth' => 100,
             'labelAlign' => 'left',
          )),
        ),
         'locked' => false,
         'blockedVarsForExport' => 
        array (
        ),
         'fieldtype' => 'panel',
         'layout' => NULL,
         'border' => false,
         'icon' => '',
         'labelWidth' => 100,
         'labelAlign' => 'left',
      )),
    ),
     'locked' => false,
     'blockedVarsForExport' => 
    array (
    ),
     'fieldtype' => 'panel',
     'layout' => NULL,
     'border' => false,
     'icon' => NULL,
     'labelWidth' => 100,
     'labelAlign' => 'left',
  )),
   'icon' => '',
   'group' => '',
   'showAppLoggerTab' => false,
   'linkGeneratorReference' => '',
   'previewGeneratorReference' => '',
   'compositeIndices' => 
  array (
  ),
   'showFieldLookup' => false,
   'propertyVisibility' => 
  array (
    'grid' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
    'search' => 
    array (
      'id' => true,
      'key' => false,
      'path' => true,
      'published' => true,
      'modificationDate' => true,
      'creationDate' => true,
    ),
  ),
   'enableGridLocking' => false,
   'deletedDataComponents' => 
  array (
  ),
   'blockedVarsForExport' => 
  array (
  ),
   'fieldDefinitionsCache' => 
  array (
  ),
   'activeDispatchingEvents' => 
  array (
  ),
));

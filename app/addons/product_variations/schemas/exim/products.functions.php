<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * 'copyright.txt' FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

use Tygh\Addons\ProductVariations\Product\Manager as ProductManager;
use Tygh\Enum\ProductTracking;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * Prepares product export. Saved conditions by product identifiers.
 *
 * @param array $pattern Exim schema.
 *
 * @return bool
 */
function fn_product_variations_exim_pre_moderation_by_product_type(&$pattern)
{
    if (!empty($pattern['condition']['conditions']['product_id'])) {
        $pattern['condition']['product_id'] = $pattern['condition']['conditions']['product_id'];
        unset($pattern['condition']['conditions']['product_id']);
    }

    return true;
}

/**
 * Prepares product export. Sets system field and sorting.
 *
 * @param array $pattern        Exim schema.
 * @param array $conditions     List of conditions.
 * @param array $table_fields   List of product fields.
 */
function fn_product_variations_exim_pre_processing_by_product_type(&$pattern, &$conditions, &$table_fields)
{
    $table_fields[] = 'products.product_type AS product_type';
    $table_fields[] = 'products.parent_product_id AS parent_product_id';
    $table_fields[] = 'IF(products.parent_product_id = 0, products.product_id, products.parent_product_id) AS sort';

    if (!empty($pattern['condition']['product_id'])) {
        $conditions[] = db_quote(
            '(products.product_id IN (?n) OR products.parent_product_id IN (?n))',
            $pattern['condition']['product_id'], $pattern['condition']['product_id']
        );
    }

    $pattern['order_by'] = 'sort, product_id';
}

/**
 * Prepares product data.
 *
 * @param array $data       Raw result of exported products.
 * @param array $result     Formatted result of exported products.
 * @param array $multi_lang List of exported languages.
 * @param array $pattern    Exim schema.
 */
function fn_product_variations_exim_processing_by_product_type($data, &$result, $multi_lang, $pattern)
{
    /** @var ProductManager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];
    $product_type = $product_manager->getProductTypeInstance(ProductManager::PRODUCT_TYPE_VARIATION);
    $export_fields = $pattern['export_fields'];

    foreach ($result as $key => &$items) {
        foreach ($items as $lang_code => &$product) {
            $data_item = $data[$key][$lang_code];

            if ($data_item['product_type'] === ProductManager::PRODUCT_TYPE_VARIATION) {
                foreach ($product as $exim_field => $value) {
                    if (isset($export_fields['multilang'][$exim_field]['db_field'])) {
                        $field = $export_fields['multilang'][$exim_field]['db_field'];
                    } elseif (isset($export_fields['main'][$exim_field]['db_field'])) {
                        $field = $export_fields['main'][$exim_field]['db_field'];
                    } else {
                        $field = strtolower($exim_field);
                    }

                    if (!$product_type->isFieldAvailable($field)) {
                        $product[$exim_field] = null;
                    }
                }
            }

            unset($product);
        }
    }

    unset($items);
}

/**
 * Wrapper for generates SEO name for imported product.
 *
 * @param int       $object_id      Product identificator
 * @param int       $object_type    One-letter object type identificator
 * @param string    $object_name    SEO-name to import with
 * @param array     $product_name   Product name for specified language code
 * @param int       $index
 * @param string    $dispatch
 * @param string    $company_id     Company identifier
 * @param string    $lang_code      Two-letter language code
 * @param string    $company_name   Company name product imported for
 * @param array     $row            Import data
 *
 * @return array SEO name for specified language code
 */
function fn_product_variations_create_import_seo_name($object_id, $object_type = 'p', $object_name, $product_name, $index = 0, $dispatch = '', $company_id = '', $lang_code = CART_LANGUAGE, $company_name = '', $row)
{
    if ($object_type == 'p') {
        $product_type = null;

        if (isset($row['product_type'])) {
            $product_type = $row['product_type'];
        } elseif (isset($row['Product type'])) {
            $product_type = $row['Product type'];
        }

        if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
            return array();
        }
    }

    return fn_create_import_seo_name($object_id, $object_type, $object_name, $product_name, $index, $dispatch, $company_id, $lang_code, $company_name);
}

/**
 * Updates product amount for configurable product after import.
 *
 * @param array $primary_object_ids
 *
 * @return bool
 */
function fn_product_variations_exim_prepare_product_amount($import_data)
{
    $product_ids = array();

    foreach ($import_data as $item) {
        $row = reset($item);

        $product_type = fn_product_variations_exim_get_product_type($row);
        $product_id = isset($row['product_id']) ? $row['product_id'] : null;

        if ($product_id && $product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
            $product_ids[] = $product_id;
        }
    }

    if (!empty($product_ids)) {
        /** @var ProductManager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];
        $product_manager->actualizeConfigurableProductAmount($product_ids);
    }

    return true;
}

/**
 * Filtrates tracking value for configurable products
 *
 * @param array $row
 */
function fn_product_variations_exim_filter_tracking_value(&$row)
{
    $product_type = fn_product_variations_exim_get_product_type($row);

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE && isset($row['tracking'])) {
        $row['tracking'] = fn_product_variations_normalize_tracking($row['tracking']);
    }
}

/**
 * Gets product type.
 *
 * @param array $row
 *
 * @return null|string
 */
function fn_product_variations_exim_get_product_type($row)
{
    $product_type = null;

    if (isset($row['product_type'])) {
        $product_type = $row['product_type'];
    } elseif (isset($row['Product type'])) {
        $product_type = $row['Product type'];
    }

    return $product_type;
}

/**
 * Checks variation code.
 * If product type is not "V" (variation) then variation code will be removed.
 *
 * @param array $product
 */
function fn_product_variations_check_variation_code(&$product)
{
    $product_type = null;

    if (isset($product['product_type'])) {
        $product_type = $product['product_type'];
    } elseif (isset($product['Product type'])) {
        $product_type = $product['Product type'];
    }

    if ($product_type !== ProductManager::PRODUCT_TYPE_VARIATION) {
        unset($product['variation_code']);
    }
}
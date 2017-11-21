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
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

use Tygh\Registry;
use Tygh\Addons\ProductVariations\Product\Manager as ProductManager;
use Tygh\Addons\ProductVariations\Product\AdditionalDataLoader;
use Tygh\Enum\ProductTracking;
use Tygh\Storage;
use Tygh\BlockManager\ProductTabs;

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * Returns a value indicating whether the give value is "empty".
 *
 * The value is considered "empty", if one of the following conditions is satisfied:
 *
 * - it is `null`,
 * - an empty string (`''`),
 * - a string containing only whitespace characters,
 * - or an empty array.
 *
 * @param mixed $value
 *
 * @return bool if the value is empty
 */
function fn_product_variations_value_is_empty($value)
{
    return $value === '' || $value === array() || $value === null || is_string($value) && trim($value) === '';
}

/**
 * Combines the features of a parent product and the features of the selected product variation.
 *
 * @param array     $product    Product data
 * @param string    $display_on Filter by display on field
 *
 * @return array
 */
function fn_product_variations_merge_features($product, $display_on = 'C')
{
    if (empty($product['variation_product_id'])) {
        return $product;
    }

    $product_variation = array(
        'product_id' => $product['variation_product_id'],
        'category_ids' => $product['category_ids']
    );

    // if $product from fn_get_product_data
    if (isset($product['detailed_params']['info_type']) && $product['detailed_params']['info_type'] === 'D' && $display_on !== 'A') {
        $params = array(
            'category_ids' => fn_get_category_ids_with_parent($product['category_ids']),
            'product_id' => $product['variation_product_id'],
            'product_company_id' => !empty($product['company_id']) ? $product['company_id'] : 0,
            'statuses' => AREA == 'C' ? array('A') : array('A', 'H'),
            'variants' => true,
            'plain' => false,
            'display_on' => AREA == 'A' ? '' : 'product',
            'existent_only' => (AREA != 'A'),
            'variants_selected_only' => true
        );

        list($product_features) = fn_get_product_features($params, 0, CART_LANGUAGE);

        if (!empty($product['product_features'])) {
            foreach ($product['product_features'] as $feature_id => &$item) {
                if (!isset($product_features[$feature_id])) {
                    continue;
                }

                if (isset($item['subfeatures'])) {
                    $item['subfeatures'] = array_replace($item['subfeatures'], $product_features[$feature_id]['subfeatures']);
                } else {
                    $item = array_replace($item, $product_features[$feature_id]);
                }
            }
            unset($item);
        } else {
            $product['product_features'] = $product_features;
        }

        if (isset($product['header_features'])) {
            $header_features = fn_get_product_features_list($product_variation, 'H');

            $product['header_features'] = fn_array_elements_to_keys($product['header_features'], 'feature_id');
            $header_features = fn_array_elements_to_keys($header_features, 'feature_id');
            $product['header_features'] = array_replace($product['header_features'], $header_features);

            $product['header_features'] = array_values($product['header_features']);
        }
    } else {
        $product_features = fn_get_product_features_list($product_variation, $display_on);
        $product_features = fn_array_elements_to_keys($product_features, 'feature_id');
        $product['product_features'] = fn_array_elements_to_keys($product['product_features'], 'feature_id');

        $product['product_features'] = array_replace($product['product_features'], $product_features);
        $product['product_features'] = array_values($product['product_features']);
    }

    return $product;
}


/**
 * Gets count of the product files.
 *
 * @param int       $product_id         Product identifier.
 * @param string    $status             Files status (A|D)
 * @param array     $excluded_file_ids  List of the file identifiers that will be excluded from the calculation
 *
 * @return int
 */
function fn_product_variations_get_product_files_count($product_id, $status, array $excluded_file_ids = array())
{
    $condition = db_quote('product_id = ?i AND status = ?s', $product_id, $status);

    if (!empty($excluded_file_ids)) {
        $condition .= db_quote(' AND file_id NOT IN (?n)', $excluded_file_ids);
    }

    return (int) db_get_field('SELECT COUNT(*) AS cnt FROM ?:product_files WHERE ?p', $condition);
}

/**
 * Normalizes tracking mode value for configurable product.
 *
 * @param string $tracking
 *
 * @return string
 */
function fn_product_variations_normalize_tracking($tracking)
{
    if ($tracking !== ProductTracking::DO_NOT_TRACK) {
        $tracking = ProductTracking::TRACK_WITHOUT_OPTIONS;
    }

    return $tracking;
}

/**
 * Hook handler: after delete all product option.
 */
function fn_product_variations_poptions_delete_product_post($product_id)
{
    $child_products = db_get_fields(
        'SELECT product_id FROM ?:products WHERE parent_product_id = ?i AND product_type = ?s',
        $product_id, ProductManager::PRODUCT_TYPE_VARIATION
    );

    foreach ($child_products as $child_product_id) {
        fn_delete_product($child_product_id);
    }
}

/**
 * Hook handler: before selecting products.
 */
function fn_product_variations_get_products_pre(&$params, $items_per_page, $lang_code)
{
    /** @var ProductManager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    if (empty($params['pid'])) {
        if (!isset($params['product_type'])) {
            $params['product_type'] = $product_manager->getCreatableProductTypes();
        }

        if (!isset($params['parent_product_id'])) {
            $params['parent_product_id'] = 0;
        }
     }

    if (!isset($params['product_type'])) {
        $params['product_type'] = null;
    }

    if (!isset($params['parent_product_id'])) {
        $params['parent_product_id'] = null;
    }

    if (!isset($params['variation_code'])) {
        $params['variation_code'] = null;
    }

    $params['product_type'] = (array) $params['product_type'];
    $params['parent_product_id'] = array_filter((array) $params['parent_product_id']);
}

/**
 * Hook handler: before selecting products.
 */
function fn_product_variations_get_products($params, $fields, $sortings, &$condition, &$join, $sorting, $group_by, $lang_code, $having)
{
    if (!fn_product_variations_value_is_empty($params['product_type'])) {
        if (is_array($params['product_type'])) {
            $condition .= db_quote(' AND products.product_type IN (?a)', $params['product_type']);
        } else {
            $condition .= db_quote(' AND products.product_type = ?s', $params['product_type']);
        }
    }

    if (!fn_product_variations_value_is_empty($params['parent_product_id'])) {
        if (is_array($params['parent_product_id'])) {
            $condition .= db_quote(' AND products.parent_product_id IN (?n)', $params['parent_product_id']);
        } else {
            $condition .= db_quote(' AND products.parent_product_id = ?i', $params['parent_product_id']);
        }
    }

    if (!fn_product_variations_value_is_empty($params['variation_code'])) {
        if (is_array($params['variation_code'])) {
            $condition .= db_quote(' AND products.variation_code IN (?a)', $params['variation_code']);
        } else {
            $condition .= db_quote(' AND products.variation_code = ?s', $params['variation_code']);
        }
    }

    // FIXME Dirty hack
    if ((in_array(ProductManager::PRODUCT_TYPE_VARIATION, $params['product_type'], true) || !empty($params['pid']))
        && strpos($join, 'ON products_categories.product_id = products.product_id') !== false
    ) {
        $join = str_replace(
            'ON products_categories.product_id = products.product_id',
            'ON products_categories.product_id = products.parent_product_id OR products_categories.product_id = products.product_id',
            $join
        );
    }
}

/**
 * Hook handler: change SQL parameters for product data select
 */
function fn_product_variations_get_product_data($product_id, $field_list, &$join, $auth, $lang_code, $condition)
{
    // FIXME Dirty hack
    $join = str_replace(
        'ON ?:products_categories.product_id = ?:products.product_id',
        'ON ?:products_categories.product_id = ?:products.parent_product_id OR ?:products_categories.product_id = ?:products.product_id',
        $join
    );
}

/**
 * Hook handler: particularize product data
 */
function fn_product_variations_get_product_data_post(&$product_data, $auth, $preview, $lang_code)
{
    if (empty($product_data)) {
        return;
    }

    if ($product_data['product_type'] === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $product_data['amount'] = db_get_field(
            'SELECT MAX(amount) FROM ?:products WHERE parent_product_id = ?i AND product_type = ?s',
            $product_data['product_id'], ProductManager::PRODUCT_TYPE_VARIATION
        );

        $product_data['detailed_params']['is_preview'] = $preview;

    } elseif ($product_data['product_type'] === ProductManager::PRODUCT_TYPE_VARIATION) {
        if (fn_allowed_for('ULTIMATE')) {
            $product_data['shared_product'] = fn_ult_is_shared_product($product_data['parent_product_id']);
            $product_data['shared_between_companies'] = fn_ult_get_shared_product_companies($product_data['parent_product_id']);
        }

        // Skip creating seo name
        $product_data['seo_name'] = $product_data['product_id'];
    }

    if (AREA === 'C') {
        $product_id = $product_data['product_id'];
        $selected_options = Registry::get('runtime.selected_options.' . $product_id);

        if ($selected_options) {
            $product_data['selected_options'] = $selected_options;
        }
    }
}

/**
 * Hook handler: on clone product.
 */
function fn_product_variations_clone_product_data($product_id, $data, &$is_cloning_allowed)
{
    if ($data['product_type'] === ProductManager::PRODUCT_TYPE_VARIATION) {
        $is_cloning_allowed = false;
    }
}

/**
 * Hook handler: changes before gathering additional products data
 */
function fn_product_variations_gather_additional_products_data_params($product_ids, $params, &$products, $auth, $products_images, $additional_images, $product_options, &$has_product_options, $has_product_options_links)
{
    $loader = new AdditionalDataLoader(
        $products, $params, $auth, CART_LANGUAGE, Tygh::$app['addons.product_variations.product.manager'], Tygh::$app['db']
    );

    Registry::set('product_variations_loader', $loader);

    foreach ($products as &$product) {
        if (!isset($product['product_type'])) {
            $product['product_type'] = null;
        }

        if ($product['product_type'] === ProductManager::PRODUCT_TYPE_CONFIGURABLE && $params['get_options']) {
            $has_product_options = $product_options;
            if (!empty($product['selected_options']) && !empty($product_options[$product['product_id']])
                && !array_diff_key($product['selected_options'], $product_options[$product['product_id']])
            ){
                $has_product_options = array();
            }

            $options = isset($product_options[$product['product_id']]) ? $product_options[$product['product_id']] : array();
            $product = $loader->setOptions($product, $options);
        }
    }
}

/**
 * Hook handler: changes before gathering product options.
 */
function fn_product_variations_gather_additional_product_data_before_options(&$product, $auth, &$params)
{
    if ($product['product_type'] === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $params['get_options'] = false;
        /** @var AdditionalDataLoader $loader */
        $loader = Registry::get('product_variations_loader');

        $product = $loader->loadBaseData($product);
    }
}

/**
 * Hook handler: add additional data to product
 */
function fn_product_variations_gather_additional_product_data_post(&$product, $auth, &$params)
{
    /** @var AdditionalDataLoader $loader */
    $loader = Registry::get('product_variations_loader');

    if ($product['product_type'] === ProductManager::PRODUCT_TYPE_CONFIGURABLE
        && ($params['get_features'] || isset($product['detailed_params']['info_type']) && $product['detailed_params']['info_type'] === 'D')
    ) {
        $product = $loader->loadFeatures($product);
    }

    $base_params = $loader->getParams();
    $params['get_options'] = $base_params['get_options'];

    if (isset($product['detailed_params'])) {
        $product['detailed_params']['get_options'] = $params['get_options'];
    }
}

/**
 * Hook handler: on before product features saved.
 */
function fn_product_variations_update_product_features_value_pre($product_id, $product_features, $add_new_variant, $lang_code, $params, &$category_ids)
{
    /** @var ProductManager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');

        $id_paths = db_get_fields(
            'SELECT ?:categories.id_path FROM ?:products_categories '
            . 'LEFT JOIN ?:categories ON ?:categories.category_id = ?:products_categories.category_id '
            . 'WHERE product_id = ?i',
            $parent_product_id
        );

        $category_ids = array_unique(explode('/', implode('/', $id_paths)));
    }
}

/**
 * Hook handler: on reorder product.
 */
function fn_product_variations_reorder_product($order_info, $cart, $auth, $product, $amount, &$price, $zero_price_action)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];
    $product_id = $product['product_id'];

    $product_type = isset($product['product_type']) ? $product['product_type'] : $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $variation_id = $product_manager->getVariationId($product_id, (array) $product['product_options']);

        if ($variation_id) {
            $price = fn_get_product_price($variation_id, $amount, $auth);
        }
    }
}

/**
 * Hook handler: on update product.
 */
function fn_product_variations_update_product_pre(&$product_data, $product_id, $lang_code, &$can_update)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    if (!empty($product_id)) {
        $current_product_data = db_get_row('SELECT * FROM ?:products WHERE product_id = ?i', $product_id);
    }

    if (isset($product_data['parent_product_id'])) {
        $parent_product_id = (int) $product_data['parent_product_id'];
    } elseif (!empty($current_product_data)) {
        $parent_product_id = (int) $current_product_data['parent_product_id'];
    }

    if (!empty($parent_product_id)) {
        $parent_product_data = db_get_row('SELECT * FROM ?:products WHERE product_id = ?i', $parent_product_id);
    }

    $product_type = null;

    if (isset($product_data['product_type'])) {
        $product_type = $product_data['product_type'];
    } elseif (!empty($current_product_data)) {
        $product_type = $current_product_data['product_type'];
    }

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $current_variation_options = isset($current_product_data['variation_options']) ? json_decode($current_product_data['variation_code']) : null;
        $variation_options = isset($product_data['variation_options']) ? $product_data['variation_options'] : null;

        if (empty($parent_product_data)) {
            fn_set_notification('E', __('error'), __('product_variations.error.product_variation_must_have_parent_product'));
            $can_update = false;
            return;
        }

        if (empty($product_id) && empty($variation_options)) {
            fn_set_notification('E', __('error'), __('product_variations.error.product_variation_must_have_variation_options'));
            $can_update = false;
            return;
        } elseif ($variation_options && $variation_options !== $current_variation_options) {
            $variant_ids = array_values($variation_options);
            $option_ids = json_decode($parent_product_data['variation_options'], true);
            $variation_code = $product_manager->getVariationCode($parent_product_data['product_id'], $variation_options);

            $cnt = db_get_field(
                'SELECT COUNT(*) AS cnt FROM ?:product_option_variants WHERE variant_id IN (?n) AND option_id IN (?n)',
                $variant_ids,
                $option_ids
            );

            if ($cnt != count($variant_ids)) {
                fn_set_notification('E', __('error'), __('product_variations.error.invalid_variation_options_array'));
                $can_update = false;
                return;
            }

            $exist_variation_product_id = db_get_field('SELECT product_id FROM ?:products WHERE variation_code = ?s', $variation_code);

            if ($exist_variation_product_id) {
                fn_set_notification('E', __('error'), __('product_variations.error.product_variation_already_exists'));
                $can_update = false;
                return;
            }

            $product_data['variation_code'] = $variation_code;
            $product_data['variation_options'] = json_encode($variation_options);
        }
    } elseif ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        if (!empty($product_data['tracking'])) {
            $product_data['tracking'] = fn_product_variations_normalize_tracking($product_data['tracking']);
        }
    }
}

/**
 * Hook handler: on applying product options rules
 */
function fn_product_variations_apply_options_rules_post(&$product)
{
    $product['options_update'] = true;
}

/**
 * Hook handler: on gets product code.
 */
function fn_product_variations_get_product_code($product_id, $selected_options, &$product_code)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $variation_id = $product_manager->getVariationId($product_id, $selected_options);

        if ($variation_id) {
            $product_code = $product_manager->getProductFieldValue($variation_id, 'product_code');
        }
    }
}

/**
 * Hook handler: on before gets product data on add product to cart.
 */
function fn_product_variations_pre_get_cart_product_data($hash, $product, $skip_promotion, $cart, $auth, $promotion_amount, &$fields, $join)
{
    $fields[] = '?:products.product_type';
    $fields[] = '?:products.variation_options';
}

/**
 * Hook handler: on gets product data on add product to cart.
 */
function fn_product_variations_get_cart_product_data($product_id, &$_pdata, $product, $auth, &$cart, $hash)
{
    $cart['products'][$hash]['product_type'] = $_pdata['product_type'];

    if ($_pdata['product_type'] !== ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        return;
    }

    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $selected_options = isset($product['product_options']) ? $product['product_options'] : array();
    $amount = !empty($product['amount_total']) ? $product['amount_total'] : $product['amount'];

    $variation_id = $product_manager->getVariationId($product_id, $selected_options);

    if ($variation_id) {
        $product_type_instance = $product_manager->getProductTypeInstance($_pdata['product_type']);

        $_pdata['price'] = fn_get_product_price($variation_id, $amount, $auth);
        $_pdata['tracking'] = ProductTracking::TRACK_WITHOUT_OPTIONS;
        $_pdata['in_stock'] = $product_manager->getProductFieldValue($variation_id, 'amount');

        if (!isset($_pdata['extra'])) {
            $_pdata['extra'] = array();
        }

        $_pdata['extra']['variation_product_id'] = $variation_id;

        if (!isset($product['stored_price']) || $product['stored_price'] !== 'Y') {
            $_pdata['base_price'] = $_pdata['price'];
        }

        foreach ($_pdata as $key => $value) {
            if ($product_type_instance->isFieldMergeable($key) && $key !== 'amount') {
                $_pdata[$key] = $product_manager->getProductFieldValue($variation_id, $key);
            }
        }
    }
}

/**
 * Hook handler: on update product quantity.
 */
function fn_product_variations_update_product_amount_pre(&$product_id, $amount, $product_options, $sign, &$tracking, &$current_amount, &$product_code)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $variation_id = $product_manager->getVariationId($product_id, $product_options);

        if ($variation_id) {
            $product_id = $variation_id;
            $current_amount  = $product_manager->getProductFieldValue($variation_id, 'amount', null, true);
            $product_code  = $product_manager->getProductFieldValue($variation_id, 'product_code');
            $tracking = ProductTracking::TRACK_WITHOUT_OPTIONS;
        }
    }
}

/**
 * Hook handler: on checks product quantity in stock.
 */
function fn_product_variations_check_amount_in_stock_before_check($product_id, $amount, $product_options, $cart_id, $is_edp, $original_amount, $cart, $update_id, &$product, &$current_amount)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $product_type_instance = $product_manager->getProductTypeInstance($product_type);
        $variation_id = $product_manager->getVariationId($product_id, $product_options);

        if ($variation_id) {
            $current_amount = $product_manager->getProductFieldValue($variation_id, 'amount');
            $avail_since = $product_manager->getProductFieldValue($variation_id, 'avail_since');

            if (!empty($avail_since) && TIME < $avail_since) {
                $current_amount = 0;
            }

            foreach ($product as $key => $value) {
                if ($product_type_instance->isFieldMergeable($key)) {
                    $product[$key] = $product_manager->getProductFieldValue($variation_id, $key);
                }
            }

            if (!empty($cart['products']) && is_array($cart['products'])) {
                foreach ($cart['products'] as $key => $item) {
                    if ($key != $cart_id && $item['product_id'] == $product_id) {
                        if (isset($item['extra']['variation_product_id'])) {
                            $item_variation_id = $item['extra']['variation_product_id'];
                        } else {
                            $item_variation_id = $product_manager->getVariationId($product_id, $item['product_options']);
                        }

                        if ($item_variation_id == $variation_id) {
                            $current_amount -= $item['amount'];
                        }
                    }
                }
            }
        }
    }
}

/**
 * Hook handler: on checks product price on add product to cart.
 */
function fn_product_variations_add_product_to_cart_get_price($product_data, $cart, $auth, $update, $_id, &$data, $product_id, $amount, &$price, $zero_price_action, $allow_add)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');
    $data['extra']['product_type'] = $product_type;

    if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
        $variation_id = $product_manager->getVariationId($product_id, $data['product_options']);

        if ($variation_id) {
            $data['extra']['variation_product_id'] = $variation_id;
            $price = fn_get_product_price($variation_id, $amount, $auth);
        }
    }
}

/**
 * Hook handler: on add product to cart.
 */
function fn_product_variations_add_to_cart(&$cart, $product_id, $_id)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');
    $cart['products'][$_id]['product_type'] = $product_type;
}

/**
 * Hook handler: on gets product image pairs.
 */
function fn_product_variations_get_cart_product_icon($product_id, $product_data, $selected_options, &$image)
{
    if (!empty($selected_options)) {
        /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

        if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
            $variation_id = $product_manager->getVariationId($product_id, $selected_options);
            $variation_image = fn_get_image_pairs($variation_id, 'product', 'M', true, true);

            if (!empty($variation_image)) {
                $image = $variation_image;
            }
        }
    }
}

/**
 * Hook handler: on creates order details.
 */
function fn_product_variations_create_order_details($order_id, $cart, &$order_details, $extra)
{
    if (!empty($extra['product_options'])) {
        /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $product_id = $order_details['product_id'];
        $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');
        $extra['product_type'] = $product_type;

        if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
            $order_details['product_code'] = fn_get_product_code($product_id, $extra['product_options']);
        }

        $order_details['extra'] = serialize($extra);
    }
}

/**
 * Hook handler: on data feed export.
 */
function fn_product_variations_data_feeds_export($datafeed_id, &$options, &$pattern, $fields, $datafeed_data)
{
    if (!empty($datafeed_data['export_options']['product_types'])) {
        $product_types = $datafeed_data['export_options']['product_types'];
        $pattern['product_types'] = $product_types;

        if (in_array(ProductManager::PRODUCT_TYPE_VARIATION, $product_types)
            && !in_array(ProductManager::PRODUCT_TYPE_CONFIGURABLE, $product_types)
        ) {
            $product_types[] = ProductManager::PRODUCT_TYPE_CONFIGURABLE;
        }

        $pattern['condition']['conditions']['product_type'] = $product_types;
    } else {
        $pattern['product_types'] = array();
    }

    unset($options['product_types']);
}


/**
 * Hook handler: on before dispatch displayed
 */
function fn_product_variations_dispatch_before_display()
{
    $controller = Registry::get('runtime.controller');
    $mode = Registry::get('runtime.mode');

    if (AREA !== 'A' || $controller !== 'products' || $mode !== 'update') {
        return;
    }

    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];
    /** @var \Tygh\SmartyEngine\Core $view */
    $view = Tygh::$app['view'];

    /** @var array $product_data */
    $product_data = $view->getTemplateVars('product_data');

    $product_type = $product_manager->getProductTypeInstance($product_data['product_type']);

    $tabs = Registry::get('navigation.tabs');

    foreach ($tabs as $key => $tab) {
        if (!$product_type->isTabAvailable($key)) {
            unset($tabs[$key]);
        }
    }

    Registry::set('navigation.tabs', $tabs);
}

/**
 * Hook handler: on update cart products
 */
function fn_product_variations_update_cart_products_post(&$cart)
{
    foreach ($cart['products'] as &$product) {
        if (!empty($product['product_options'])) {
            /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
            $product_manager = Tygh::$app['addons.product_variations.product.manager'];
            $product_type = $product_manager->getProductFieldValue($product['product_id'], 'product_type');
            $product['extra']['product_type'] = $product_type;

            if ($product_type === ProductManager::PRODUCT_TYPE_CONFIGURABLE) {
                $variation_id = $product_manager->getVariationId($product['product_id'], $product['product_options']);

                if ($variation_id) {
                    $product['extra']['variation_product_id'] = $variation_id;
                }
            }
        }
    }
}

/**
 * Hook handler: after the license agreements of the files of downloadable products are retrieved.
 * Substitutes the license agreements of configurable products with the license agreements of selected variations.
 */
function fn_product_variations_cart_agreements($cart, &$agreements)
{
    if (!empty($cart['products'])) {
        foreach ($cart['products'] as $item) {
            if ($item['is_edp'] === 'Y' && !empty($item['extra']['variation_product_id'])) {
                $variation_product_id = $item['extra']['variation_product_id'];

                if ($variation_agreements = fn_get_edp_agreements($variation_product_id, true)) {
                    unset($agreements[$item['product_id']]);
                    $agreements[$variation_product_id] = $variation_agreements;
                }
            }
        }
    }
}

/**
 * Hook handler: after generating ekeys for downloadable products (EDP)
 * Generates ekeys for the downloadable files of the variation.
 */
function fn_product_variations_generate_ekeys_for_edp_post($statuses, $order_info, $active_files, &$edp_data)
{
    $parent_product_ids = array();
    $products = $order_info['products'];
    $order_info['products'] = array();

    foreach ($products as $key => $product) {
        if (!empty($product['extra']['is_edp'])
            && $product['extra']['is_edp'] == 'Y'
            && !empty($product['extra']['variation_product_id'])
        ) {
            $variation_id = $product['extra']['variation_product_id'];
            $product_id = $product['product_id'];

            $cnt = db_get_field('SELECT COUNT(*) FROM ?:product_files WHERE product_id = ?i', $variation_id);

            if ($cnt) {
                unset($product['extra']['variation_product_id']);
                $parent_product_ids[$variation_id] = $product_id;
                $product['product_id'] = $variation_id;

                $order_info['products'][$key] = $product;

                if (isset($active_files[$product_id])) {
                    $active_files[$variation_id] = $active_files[$product_id];
                }
            }
        }
    }

    if (!empty($order_info['products'])) {
        $data = fn_generate_ekeys_for_edp($statuses, $order_info, $active_files);

        foreach ($data as $variation_id => $item) {
            $parent_product_id = $parent_product_ids[$variation_id];
            unset($edp_data[$parent_product_id]);

            $edp_data[$variation_id] = $item;
        }
    }
}

/**
 * Hook handler: after getting the list of downloadable products available for the user.
 * Substitutes the list of downloadable files of configurable products with the downloadable files of selected variations.
 */
function fn_product_variations_get_user_edp_post($params, $items_per_page, &$products)
{
    $order_ids = array();
    $products_folders = $products_files = $products_files_tree = array();

    foreach ($products as $item) {
        $order_ids[$item['order_id']] = $item['order_id'];
    }

    $orders_products = db_get_array(
        'SELECT * FROM ?:order_details WHERE order_id IN (?n)',
        $order_ids
    );

    foreach ($orders_products as $item) {
        $product_id = $item['product_id'];
        $extra = @unserialize($item['extra']);

        if (!empty($extra['variation_product_id'])) {

            $filter = array (
                'product_id' => $extra['variation_product_id'],
                'order_id' => $item['order_id']
            );

            list($folders) = fn_get_product_file_folders($filter);
            list($files) = fn_get_product_files($filter);

            if (isset($products_folders[$product_id])) {
                $products_folders[$product_id] = array_merge($products_folders[$product_id], $folders);
            } else {
                $products_folders[$product_id] = $folders;
            }

            if (isset($products_files[$product_id])) {
                $products_files[$product_id] = array_merge($products_files[$product_id],  $files);
            } else {
                $products_files[$product_id] = $files;
            }
        }
    }

    foreach ($products_files as $product_id => $files) {
        $products_files_tree[$product_id] = fn_build_files_tree($products_folders[$product_id], $files);
    }

    foreach ($products as &$item) {
        $product_id = $item['product_id'];

        if (!empty($products_files_tree[$product_id])) {
            $item['files_tree'] = $products_files_tree[$product_id];
        }
    }

    unset($item);
}


/**
 * Hook handler: after getting the order data.
 * Substitutes the list of downloadable files of configurable products with the downloadable files of selected
 * variations.
 */
function fn_product_variations_get_order_info(&$order, $additional_data)
{
    if (!$order) {
        return;
    }

    foreach ($order['products'] as &$product) {
        if (isset($product['extra']['is_edp'])
            && $product['extra']['is_edp']
            && !empty($product['extra']['variation_product_id'])
        ) {
            list($product['files']) = fn_get_product_files(
                array(
                    'product_id' => $product['extra']['variation_product_id'],
                    'order_id' => $order['order_id']
                )
            );
        }
    }
    unset($product);
}

/**
 * Hook handler: before getting product files.
 */
function fn_product_variations_get_product_files_before_select($params, &$fields, $join, $condition)
{
    if (!empty($params['order_id'])) {
        $fields[] = '?:product_file_ekeys.ttl';
    }
}

/**
 * Hook handler: after a file of a downloadable product is added or updated.
 * Adds the file uploaded for a variation to its parent configurable product, but only if the parent product doesn't have active files.
 */
function fn_product_variations_update_product_file_post($product_file, $file_id, $lang_code)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];
    $product_id = $product_file['product_id'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');

        $cnt = fn_product_variations_get_product_files_count($parent_product_id, 'A');

        if (empty($cnt)) {
            /** @var \Tygh\Backend\Storage\ABackend $storage */
            $storage = Storage::instance('downloads');

            unset($product_file['file_id']);
            $product_file['product_id'] = $parent_product_id;
            $product_file['folder_id'] = null;

            $data = db_get_row('SELECT * FROM ?:product_files WHERE file_id = ?i', $file_id);

            $file_id = fn_update_product_file($product_file, 0, $lang_code);

            if (!empty($data['file_path'])) {
                $file_name = $parent_product_id . '/' . $data['file_path'];

                if ($storage->isExist($file_name)) {
                    $file_name = $storage->generateName($file_name);
                }

                if ($storage->copy($product_id . '/' . $data['file_path'], $file_name)) {
                    db_query(
                        'UPDATE ?:product_files SET ?u WHERE file_id = ?i',
                        array(
                            'file_path' => fn_basename($file_name),
                            'file_size' => $data['file_size']
                        ),
                        $file_id
                    );
                }
            }

            if (!empty($data['preview_path'])) {
                $file_name = $parent_product_id . '/' . $data['preview_path'];

                if ($storage->isExist($file_name)) {
                    $file_name = $storage->generateName($file_name);
                }

                if ($storage->copy($product_id . '/' . $data['preview_path'], $file_name)) {
                    db_query(
                        'UPDATE ?:product_files SET ?u WHERE file_id = ?i',
                        array(
                            'preview_path' => fn_basename($file_name),
                            'preview_size' => $data['preview_size']
                        ),
                        $file_id
                    );
                }
            }
        }
    }
}

/**
 * Hook handler: after options reselected
 */
function fn_product_variations_after_options_calculation($mode, $data)
{
    /** @var \Tygh\SmartyEngine\Core $view */
    $view = Tygh::$app['view'];

    /** @var array $product */
    $product = $view->getTemplateVars('product');

    if (!empty($product['product_type'])
        && $product['product_type'] === ProductManager::PRODUCT_TYPE_CONFIGURABLE
    ) {
        $variation_id = $product['variation_product_id'];
        $product_id = $product['product_id'];

        $params = array (
            'product_id' => $variation_id,
            'preview_check' => true
        );

        list($files) = fn_get_product_files($params);
        Tygh::$app['view']->assign('files', $files);

        /* [Product tabs] */
        $tabs = ProductTabs::instance()->getList(
            '',
            $product_id,
            DESCR_SL
        );

        foreach ($tabs as $tab_id => $tab) {
            if ($tab['status'] == 'D') {
                continue;
            }
            if (!empty($tab['template'])) {
                $tabs[$tab_id]['html_id'] = fn_basename($tab['template'], '.tpl');
            } else {
                $tabs[$tab_id]['html_id'] = 'product_tab_' . $tab_id;
            }

            if ($tab['show_in_popup'] != 'Y') {
                Registry::set('navigation.tabs.' . $tabs[$tab_id]['html_id'], array (
                    'title' => $tab['name'],
                    'js' => true
                ));
            }
        }

        $view->assign('no_capture', false);
        $view->assign('tabs', $tabs);
        /* [/Product tabs] */
    }
}

/**
 * Hook handler: on after update product quantity.
 */
function fn_product_variations_update_product_amount_post($product_id)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');
        $product_manager->actualizeConfigurableProductAmount((array) $parent_product_id);
    }
}
/**
 * Hook handler: on after update product.
 */
function fn_product_variations_update_product_post($product_data, $product_id)
{
    if (isset($product_data['amount'])) {
        /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];
        $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

        if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
            $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');
            $product_manager->actualizeConfigurableProductAmount((array) $parent_product_id);
        }
    }
}

/**
 * Hook handler: on before delete product.
 */
function fn_product_variations_delete_product_pre($product_id)
{
    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $parent_product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');
        Registry::set('runtime.product_variations.update_product_id', $parent_product_id);
    } else {
        Registry::del('runtime.product_variations.update_product_id');
    }
}

/**
 * Hook handler: on after delete product.
 */
function fn_product_variations_delete_product_post()
{
    $product_id = Registry::get('runtime.product_variations.update_product_id');

    if ($product_id) {
        /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];
        $product_manager->actualizeConfigurableProductAmount((array) $product_id);
    }
}

/**
 * Hook handler: on after change status.
 */
function fn_product_variations_tools_change_status($params, $result)
{
    if ($result
        && !empty($params['table'])
        && !empty($params['id'])
        && $params['table'] === 'products'
    ) {
        /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
        $product_manager = Tygh::$app['addons.product_variations.product.manager'];

        $product_type = $product_manager->getProductFieldValue($params['id'], 'product_type');

        if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
            $parent_product_id = $product_manager->getProductFieldValue($params['id'], 'parent_product_id');
            $product_manager->actualizeConfigurableProductAmount((array) $parent_product_id);
        }
    }
}

/**
 * Hook handler: on before getting product data.
 */
function fn_product_variations_get_product_data_pre(&$product_id)
{
    if (AREA !== 'C') {
        return;
    }

    Registry::del('runtime.selected_options.' . $product_id);

    /** @var \Tygh\Addons\ProductVariations\Product\Manager $product_manager */
    $product_manager = Tygh::$app['addons.product_variations.product.manager'];

    $product_type = $product_manager->getProductFieldValue($product_id, 'product_type');

    if ($product_type === ProductManager::PRODUCT_TYPE_VARIATION) {
        $selected_options = $product_manager->getProductVariationOptionsValue($product_id);
        $product_id = $product_manager->getProductFieldValue($product_id, 'parent_product_id');

        Registry::set('runtime.selected_options.' . $product_id, $selected_options);
    }
}

/**
 * Hook handler: before loading product product data.
 */
function fn_product_variations_load_products_extra_data(&$extra_fields, $products, $product_ids, &$params, $lang_code)
{
    if (AREA === 'C'
        && !empty($params['product_type'])
        && is_array($params['product_type'])
        && count($params['product_type']) === 1
    ) {
        $product_type = array_pop($params['product_type']);

        if ($product_type !== ProductManager::PRODUCT_TYPE_VARIATION) {
            return;
        }

        if (!empty($params['extend']) && is_array($params['extend'])) {
            $product_name_key = array_search('product_name', $params['extend']);
            unset($params['extend'][$product_name_key]);
        }

        unset(
            $extra_fields['?:product_descriptions'],
            $extra_fields['?:products_categories']
        );
    }
}

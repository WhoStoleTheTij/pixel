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

if (!defined('BOOTSTRAP')) { die('Access denied'); }

/**
 * Formats the price for further usage in REST API.
 *
 * @param float     $price      Price
 * @param string    $currency   Currency code
 *
 * @return array
 */
function fn_storefront_rest_api_format_price($price, $currency = CART_PRIMARY_CURRENCY)
{
    /** @var \Tygh\Tools\Formatter $formatter */
    $formatter = Tygh::$app['formatter'];

    return array(
        'price' => $formatter->asPrice($price, $currency),
        'symbol' => Registry::get('currencies.' . $currency . '.symbol')
    );
}

/**
 * Formats the prices of a product for their further usage in REST API.
 *
 * @param array     $product    Product data
 * @param string    $currency   Currency code
 *
 * @return array
 */
function fn_storefront_rest_api_format_product_prices($product, $currency = CART_PRIMARY_CURRENCY)
{
    $fields = array(
        'list_price', 'price', 'base_price', 'original_price',
        'display_price', 'discount', 'subtotal', 'display_subtotal'
    );

    foreach ($fields as $field) {
        if (isset($product[$field])) {
            $product[$field . '_formatted'] = fn_storefront_rest_api_format_price($product[$field], $currency);
        }
    }

    return $product;
}

/**
 * Formats the prices of a order for their further usage in REST API.
 *
 * @param array     $order      Order data
 * @param string    $currency   Currency code
 *
 * @return array
 */
function fn_storefront_rest_api_format_order_prices($order, $currency = CART_PRIMARY_CURRENCY)
{
    $fields = array(
        'total', 'subtotal', 'discount', 'subtotal_discount',
        'payment_surcharge', 'shipping_cost', 'tax_subtotal',
        'display_subtotal', 'display_shipping_cost'
    );

    foreach ($fields as $field) {
        if (isset($order[$field])) {
            $order[$field . '_formatted'] = fn_storefront_rest_api_format_price($order[$field], $currency);
        }
    }

    if (isset($order['tax_summary'])) {
        foreach ($order['tax_summary'] as $key => $value) {
            $order['tax_summary'][$key . '_formatted'] = fn_storefront_rest_api_format_price($value, $currency);
        }
    }

    if (!empty($order['products'])) {
        foreach ($order['products'] as &$product) {
            $product = fn_storefront_rest_api_format_product_prices($product, $currency);
        }
        unset($product);
    }

    if (!empty($order['product_groups'])) {
        foreach ($order['product_groups'] as &$group) {
            foreach ($group['products'] as &$product) {
                $product = fn_storefront_rest_api_format_product_prices($product, $currency);
            }
        }
        unset($group);
    }

    return $order;
}
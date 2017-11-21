{if $products}

{script src="js/tygh/exceptions.js"}

{if !$no_pagination}
    {include file="common/pagination.tpl"}
{/if}
{if !$no_sorting}
    {include file="views/products/components/sorting.tpl"}
{/if}

{if $products|sizeof < $columns}
{assign var="columns" value=$products|@sizeof}
{/if}
{split data=$products size=$columns|default:"3" assign="splitted_products"}
{math equation="100 / x" x=$columns|default:"3" assign="cell_width"}
{if $item_number == "Y"}
    {assign var="cur_number" value=1}
{/if}
<table class="fixed-layout multicolumns-list template-grid-list table-width">
{foreach from=$splitted_products item="sproducts" name="sprod"}
<tr>
{foreach from=$sproducts item="product" name="sproducts"}
    {if $product}
        {assign var="obj_id" value=$product.product_id}
        {assign var="obj_id_prefix" value="`$obj_prefix``$product.product_id`"}
        {include file="common/product_data.tpl" product=$product}
        <td class="product-spacer">&nbsp;</td>
        <td class="center image-border compact{if !$smarty.foreach.sprod.last && !$show_add_to_cart} border-bottom{/if}" style="width: {$cell_width}%">    
            {assign var="form_open" value="form_open_`$obj_id`"}
            {$smarty.capture.$form_open nofilter}
            {hook name="products:product_multicolumns_list"}

            <a href="{"products.view?product_id=`$product.product_id`"|fn_url}">{include file="common/image.tpl" obj_id=$obj_id_prefix images=$product.main_pair image_width=$settings.Thumbnails.product_lists_thumbnail_width image_height=$settings.Thumbnails.product_lists_thumbnail_height}</a>

            <p>{if $item_number == "Y"}{$cur_number}.&nbsp;{math equation="num + 1" num=$cur_number assign="cur_number"}{/if}{assign var="name" value="name_$obj_id"}{$smarty.capture.$name nofilter}</p>
        
            <div class="price-wrap">
                {assign var="old_price" value="old_price_`$obj_id`"}
                {if $smarty.capture.$old_price|trim}{$smarty.capture.$old_price nofilter}&nbsp;{/if}

                {assign var="price" value="price_`$obj_id`"}
                {$smarty.capture.$price nofilter}

                {assign var="clean_price" value="clean_price_`$obj_id`"}
                {$smarty.capture.$clean_price nofilter}
            </div>

            {assign var="add_to_cart" value="add_to_cart_`$obj_id`"}
            {$smarty.capture.$add_to_cart nofilter}

            {/hook}
            {assign var="form_close" value="form_close_`$obj_id`"}
            {$smarty.capture.$form_close nofilter}
        </td>
        <td class="product-spacer">&nbsp;</td>
    {/if}
{/foreach}
</tr>
{/foreach}
</table>

{if !$no_pagination}
    {include file="common/pagination.tpl"}
{/if}

{/if}

{capture name="mainbox_title"}{$title}{/capture}
<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 20:58:23
         compiled from "/Users/richardh/Sites/pixel/design/themes/pixel_theme/templates/blocks/static_templates/custom_wishlist_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18147497775a14693f4bec54-84841850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a0717d8d3ccaf699ceeae6f9494568d297c309e' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/themes/pixel_theme/templates/blocks/static_templates/custom_wishlist_button.tpl',
      1 => 1511287100,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18147497775a14693f4bec54-84841850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a14693f564888_41478714',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a14693f564888_41478714')) {function content_5a14693f564888_41478714($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?>
<div class="pixel-wishlist-button-wrapper">
    <div class="pixel-wishlist-button">
        <img src="design/themes/pixel_theme/media/images/Pixel/wishlist.png"/>
    </div>
</div><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="blocks/static_templates/custom_wishlist_button.tpl" id="<?php echo smarty_function_set_id(array('name'=>"blocks/static_templates/custom_wishlist_button.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?>
<div class="pixel-wishlist-button-wrapper">
    <div class="pixel-wishlist-button">
        <img src="design/themes/pixel_theme/media/images/Pixel/wishlist.png"/>
    </div>
</div><?php }?><?php }} ?>

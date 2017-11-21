<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:54:39
         compiled from "/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/wishlist/hooks/index/styles.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8313574685a1413ff77bea3-76984150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4d8b035f05015cf0e500b64e50ec336b0401cac' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/wishlist/hooks/index/styles.post.tpl',
      1 => 1511262103,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '8313574685a1413ff77bea3-76984150',
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
  'unifunc' => 'content_5a1413ff7aed94_47616840',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1413ff7aed94_47616840')) {function content_5a1413ff7aed94_47616840($_smarty_tpl) {?><?php if (!is_callable('smarty_function_style')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.style.php';
if (!is_callable('smarty_function_set_id')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.set_id.php';
?><?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
echo smarty_function_style(array('src'=>"addons/wishlist/styles.less"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/wishlist/responsive.less"),$_smarty_tpl);
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/wishlist/hooks/index/styles.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/wishlist/hooks/index/styles.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
echo smarty_function_style(array('src'=>"addons/wishlist/styles.less"),$_smarty_tpl);?>

<?php echo smarty_function_style(array('src'=>"addons/wishlist/responsive.less"),$_smarty_tpl);
}?><?php }} ?>

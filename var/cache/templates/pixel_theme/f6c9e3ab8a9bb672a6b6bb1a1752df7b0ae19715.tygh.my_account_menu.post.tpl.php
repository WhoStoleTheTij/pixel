<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:54:40
         compiled from "/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/wishlist/hooks/profiles/my_account_menu.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9987456745a141400bcbc48-10266017%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c9e3ab8a9bb672a6b6bb1a1752df7b0ae19715' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/wishlist/hooks/profiles/my_account_menu.post.tpl',
      1 => 1511262103,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '9987456745a141400bcbc48-10266017',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'wishlist_count' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a141400c09d11_26270882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a141400c09d11_26270882')) {function content_5a141400c09d11_26270882($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('wishlist','wishlist'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start(); ?><li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a" href="<?php echo htmlspecialchars(fn_url("wishlist.view"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("wishlist");
if ($_smarty_tpl->tpl_vars['wishlist_count']->value>0) {?> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_count']->value, ENT_QUOTES, 'UTF-8');?>
)<?php }?></a></li><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="addons/wishlist/hooks/profiles/my_account_menu.post.tpl" id="<?php echo smarty_function_set_id(array('name'=>"addons/wishlist/hooks/profiles/my_account_menu.post.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else { ?><li class="ty-account-info__item ty-dropdown-box__item"><a class="ty-account-info__a" href="<?php echo htmlspecialchars(fn_url("wishlist.view"), ENT_QUOTES, 'UTF-8');?>
" rel="nofollow"><?php echo $_smarty_tpl->__("wishlist");
if ($_smarty_tpl->tpl_vars['wishlist_count']->value>0) {?> (<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wishlist_count']->value, ENT_QUOTES, 'UTF-8');?>
)<?php }?></a></li><?php }?><?php }} ?>

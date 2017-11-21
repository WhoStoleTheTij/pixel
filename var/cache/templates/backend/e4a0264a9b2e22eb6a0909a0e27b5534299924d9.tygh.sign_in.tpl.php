<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 23:37:10
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/buttons/sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3413496555a148e76d1b450-19045733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4a0264a9b2e22eb6a0909a0e27b5534299924d9' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/buttons/sign_in.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '3413496555a148e76d1b450-19045733',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a148e76d2bff5_03042445',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a148e76d2bff5_03042445')) {function content_5a148e76d2bff5_03042445($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('sign_in'));
?>
<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->__("sign_in"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_arrow'=>"on",'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value), 0);?>
<?php }} ?>

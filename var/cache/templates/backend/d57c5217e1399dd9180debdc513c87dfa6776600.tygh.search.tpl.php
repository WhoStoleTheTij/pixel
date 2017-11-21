<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:16:31
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/buttons/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5717474575a140b0fdcd5e2-02372602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd57c5217e1399dd9180debdc513c87dfa6776600' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/buttons/search.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5717474575a140b0fdcd5e2-02372602',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'but_onclick' => 0,
    'but_href' => 0,
    'but_role' => 0,
    'but_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a140b0fdda0a1_02630704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140b0fdda0a1_02630704')) {function content_5a140b0fdda0a1_02630704($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('search'));
?>

<?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_text'=>$_smarty_tpl->__("search"),'but_onclick'=>$_smarty_tpl->tpl_vars['but_onclick']->value,'but_href'=>$_smarty_tpl->tpl_vars['but_href']->value,'but_role'=>$_smarty_tpl->tpl_vars['but_role']->value,'but_name'=>$_smarty_tpl->tpl_vars['but_name']->value), 0);?>
<?php }} ?>

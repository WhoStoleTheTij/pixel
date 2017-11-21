<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:15:42
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/addons/tags/hooks/index/scripts.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14046346555a140adeeb1bd1-07418608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7b2dd21d219e39604242fedaadc65d986f3e3f8' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/addons/tags/hooks/index/scripts.post.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '14046346555a140adeeb1bd1-07418608',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a140adeec07e5_74044474',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140adeec07e5_74044474')) {function content_5a140adeec07e5_74044474($_smarty_tpl) {?><?php if (!is_callable('smarty_block_inline_script')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/block.inline_script.php';
?><?php
fn_preload_lang_vars(array('addons.tags.add_a_tag'));
?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('inline_script', array()); $_block_repeat=true; echo smarty_block_inline_script(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo '<script'; ?>
 type="text/javascript">
(function(_, $) {
    _.tr({
		addons_tags_add_a_tag: '<?php echo strtr($_smarty_tpl->__("addons.tags.add_a_tag"), array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
'
    });
}(Tygh, Tygh.$));
<?php echo '</script'; ?>
><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_inline_script(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>

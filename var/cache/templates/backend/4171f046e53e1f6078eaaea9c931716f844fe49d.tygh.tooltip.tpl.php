<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:30:32
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/common/tooltip.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5332696235a140e58721c14-37897559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4171f046e53e1f6078eaaea9c931716f844fe49d' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/common/tooltip.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5332696235a140e58721c14-37897559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tooltip' => 0,
    'params' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a140e5872fe01_53216421',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140e5872fe01_53216421')) {function content_5a140e5872fe01_53216421($_smarty_tpl) {?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['tooltip']->value) {?><a class="cm-tooltip<?php if ($_smarty_tpl->tpl_vars['params']->value) {?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['params']->value, ENT_QUOTES, 'UTF-8');
}?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tooltip']->value, ENT_QUOTES, 'UTF-8');?>
"><i class="icon-question-sign"></i></a><?php }?><?php }} ?>

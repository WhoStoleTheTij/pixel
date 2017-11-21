<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:54:41
         compiled from "/Users/richardh/Sites/pixel/design/themes/responsive/templates/views/block_manager/render/container.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2830876995a141401442a93-30178400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e5504945ea587b33ea202fa40473890f41691f9' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/themes/responsive/templates/views/block_manager/render/container.tpl',
      1 => 1511262094,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '2830876995a141401442a93-30178400',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'layout_data' => 0,
    'container' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a1414014516a5_89209920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1414014516a5_89209920')) {function content_5a1414014516a5_89209920($_smarty_tpl) {?><div class="<?php if ($_smarty_tpl->tpl_vars['layout_data']->value['layout_width']!="fixed") {?>container-fluid <?php } else { ?>container<?php }?> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['container']->value['user_class'], ENT_QUOTES, 'UTF-8');?>
">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

</div><?php }} ?>

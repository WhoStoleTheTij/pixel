<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:16:31
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/addons/blog/hooks/pages/sidebar.post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5345016655a140b0fe3ae94-68762163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a93b64932631527094eb7a5a93f196e59bb68be1' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/addons/blog/hooks/pages/sidebar.post.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '5345016655a140b0fe3ae94-68762163',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_managing_blog' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a140b0fe48894_10349619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140b0fe48894_10349619')) {function content_5a140b0fe48894_10349619($_smarty_tpl) {?><?php if (!is_callable('smarty_block_notes')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/block.notes.php';
?><?php if ($_smarty_tpl->tpl_vars['is_managing_blog']->value) {?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('notes', array()); $_block_repeat=true; echo smarty_block_notes(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

    <div class="sidebar-note-item">
        <?php echo $_smarty_tpl->__('blog_functionality_notes');?>

    </div>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_notes(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>

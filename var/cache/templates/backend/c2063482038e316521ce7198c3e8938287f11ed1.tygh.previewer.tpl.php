<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:49:05
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/common/previewer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7632436265a1412b154df51-56742546%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2063482038e316521ce7198c3e8938287f11ed1' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/common/previewer.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7632436265a1412b154df51-56742546',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a1412b1557eb5_22167229',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1412b1557eb5_22167229')) {function content_5a1412b1557eb5_22167229($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.script.php';
?><?php echo smarty_function_script(array('src'=>"js/tygh/previewers/".((string)$_smarty_tpl->tpl_vars['settings']->value['Appearance']['default_image_previewer']).".previewer.js"),$_smarty_tpl);?>
<?php }} ?>

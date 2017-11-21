<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 15:02:57
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/views/menus/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20155424025a1415f12f0293-66478422%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd8b41af15804e6794746d6ebee63d8c51e4d876c' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/views/menus/update.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '20155424025a1415f12f0293-66478422',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menu_data' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a1415f1352f88_32369169',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1415f1352f88_32369169')) {function content_5a1415f1352f88_32369169($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('name'));
?>
<?php if ($_smarty_tpl->tpl_vars['menu_data']->value) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['menu_data']->value['menu_id'], null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(0, null, 0);?>
<?php }?>


<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data" name="update_product_menu_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" method="post" class="cm-skip-check-items  form-horizontal">
<div id="content_group_menu_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">

<input type="hidden" name="menu_data[menu_id]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input type="hidden" name="result_ids" value="content_group_menu_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />

<fieldset>
    <div class="control-group">
        <label class="cm-required control-label" for="elm_menu_name_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
"><?php echo $_smarty_tpl->__("name");?>
:</label>
        <div class="controls">
            <input type="text" name="menu_data[name]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu_data']->value['name'], ENT_QUOTES, 'UTF-8');?>
" id="elm_menu_name_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-text" size="18" />
        </div>
    </div>

    <?php echo $_smarty_tpl->getSubTemplate ("common/select_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('input_name'=>"menu_data[status]",'id'=>"elm_menu_status_".((string)$_smarty_tpl->tpl_vars['id']->value),'obj'=>$_smarty_tpl->tpl_vars['menu_data']->value), 0);?>


</fieldset>

<!--content_group_menu_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<div class="buttons-container">
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[menus.update]",'cancel_action'=>"close",'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

</div>
</form>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 19:49:43
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/addons/banners/pickers/banners/picker.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14593515295a145927847998-43695490%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65ec8ba26f61be5e4463d8c17e69becbe1f84157' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/addons/banners/pickers/banners/picker.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '14593515295a145927847998-43695490',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_id' => 0,
    'rnd' => 0,
    'view_mode' => 0,
    'item_ids' => 0,
    'type' => 0,
    'extra_var' => 0,
    'no_container' => 0,
    'picker_view' => 0,
    'display' => 0,
    'picker_for' => 0,
    'checkbox_name' => 0,
    'aoc' => 0,
    'but_text' => 0,
    'positions' => 0,
    'input_name' => 0,
    'ldelim' => 0,
    'rdelim' => 0,
    'hide_link' => 0,
    'hide_delete_button' => 0,
    'p_id' => 0,
    'no_item_text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a14592793f3b5_47403287',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a14592793f3b5_47403287')) {function content_5a14592793f3b5_47403287($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/Users/richardh/Sites/pixel/app/lib/vendor/smarty/smarty/libs/plugins/function.math.php';
if (!is_callable('smarty_function_script')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.script.php';
?><?php
fn_preload_lang_vars(array('add_banners','add_banners','position_short','name','no_items'));
?>
<?php echo smarty_function_math(array('equation'=>"rand()",'assign'=>"rnd"),$_smarty_tpl);?>

<?php $_smarty_tpl->tpl_vars["data_id"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['data_id']->value)."_".((string)$_smarty_tpl->tpl_vars['rnd']->value), null, 0);?>
<?php $_smarty_tpl->tpl_vars["view_mode"] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['view_mode']->value)===null||$tmp==='' ? "mixed" : $tmp), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['item_ids']->value&&!is_array($_smarty_tpl->tpl_vars['item_ids']->value)&&$_smarty_tpl->tpl_vars['type']->value!="table") {?>
        <?php $_smarty_tpl->tpl_vars["item_ids"] = new Smarty_variable(explode(",",$_smarty_tpl->tpl_vars['item_ids']->value), null, 0);?>
<?php }?>

<?php echo smarty_function_script(array('src'=>"js/tygh/picker.js"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['view_mode']->value!="list") {?>

    <?php if ($_smarty_tpl->tpl_vars['extra_var']->value) {?>
        <?php $_smarty_tpl->tpl_vars["extra_var"] = new Smarty_variable(rawurlencode($_smarty_tpl->tpl_vars['extra_var']->value), null, 0);?>
    <?php }?>

    <?php if (!$_smarty_tpl->tpl_vars['no_container']->value) {?><div class="buttons-container"><?php }
if ($_smarty_tpl->tpl_vars['picker_view']->value) {?>[<?php }?>
    <?php echo $_smarty_tpl->getSubTemplate ("buttons/button.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_id'=>"opener_picker_".((string)$_smarty_tpl->tpl_vars['data_id']->value),'but_href'=>fn_url("banners.picker?display=".((string)$_smarty_tpl->tpl_vars['display']->value)."&picker_for=".((string)$_smarty_tpl->tpl_vars['picker_for']->value)."&extra=".((string)$_smarty_tpl->tpl_vars['extra_var']->value)."&checkbox_name=".((string)$_smarty_tpl->tpl_vars['checkbox_name']->value)."&aoc=".((string)$_smarty_tpl->tpl_vars['aoc']->value)."&data_id=".((string)$_smarty_tpl->tpl_vars['data_id']->value)),'but_text'=>(($tmp = @$_smarty_tpl->tpl_vars['but_text']->value)===null||$tmp==='' ? $_smarty_tpl->__("add_banners") : $tmp),'but_role'=>"add",'but_target_id'=>"content_".((string)$_smarty_tpl->tpl_vars['data_id']->value),'but_meta'=>"cm-dialog-opener btn pull-right",'but_icon'=>"icon-plus"), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['picker_view']->value) {?>]<?php }
if (!$_smarty_tpl->tpl_vars['no_container']->value) {?></div><?php }?>

    <div class="hidden" id="content_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_id']->value, ENT_QUOTES, 'UTF-8');?>
" title="<?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['but_text']->value)===null||$tmp==='' ? $_smarty_tpl->__("add_banners") : $tmp), ENT_QUOTES, 'UTF-8');?>
">
    </div>

<?php }?>

<?php if ($_smarty_tpl->tpl_vars['view_mode']->value!="button") {?>
    <?php if (!$_smarty_tpl->tpl_vars['positions']->value) {?>
    <input id="b<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_id']->value, ENT_QUOTES, 'UTF-8');?>
_ids" type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['input_name']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php if ($_smarty_tpl->tpl_vars['item_ids']->value) {
echo htmlspecialchars(implode(",",$_smarty_tpl->tpl_vars['item_ids']->value), ENT_QUOTES, 'UTF-8');
}?>" class="input-micro" />
    <?php }?>
    
    <table width="100%" class="table table-middle">
    <thead>
        <tr>
            <?php if ($_smarty_tpl->tpl_vars['positions']->value) {?><th><?php echo $_smarty_tpl->__("position_short");?>
</th><?php }?>
            <th width="100%"><?php echo $_smarty_tpl->__("name");?>
</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_id']->value, ENT_QUOTES, 'UTF-8');?>
"<?php if (!$_smarty_tpl->tpl_vars['item_ids']->value) {?> class="hidden"<?php }?>>
    <?php echo $_smarty_tpl->getSubTemplate ("addons/banners/pickers/banners/js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('banner_id'=>((string)$_smarty_tpl->tpl_vars['ldelim']->value)."banner_id".((string)$_smarty_tpl->tpl_vars['rdelim']->value),'holder'=>$_smarty_tpl->tpl_vars['data_id']->value,'input_name'=>$_smarty_tpl->tpl_vars['input_name']->value,'clone'=>true,'hide_link'=>$_smarty_tpl->tpl_vars['hide_link']->value,'hide_delete_button'=>$_smarty_tpl->tpl_vars['hide_delete_button']->value,'position_field'=>$_smarty_tpl->tpl_vars['positions']->value,'position'=>"0"), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['item_ids']->value) {?>
    <?php  $_smarty_tpl->tpl_vars["p_id"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["p_id"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item_ids']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["p_id"]->index=-1;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["items"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["p_id"]->key => $_smarty_tpl->tpl_vars["p_id"]->value) {
$_smarty_tpl->tpl_vars["p_id"]->_loop = true;
 $_smarty_tpl->tpl_vars["p_id"]->index++;
 $_smarty_tpl->tpl_vars["p_id"]->first = $_smarty_tpl->tpl_vars["p_id"]->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["items"]['first'] = $_smarty_tpl->tpl_vars["p_id"]->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["items"]['iteration']++;
?>
        <?php echo $_smarty_tpl->getSubTemplate ("addons/banners/pickers/banners/js.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('banner_id'=>$_smarty_tpl->tpl_vars['p_id']->value,'holder'=>$_smarty_tpl->tpl_vars['data_id']->value,'input_name'=>$_smarty_tpl->tpl_vars['input_name']->value,'hide_link'=>$_smarty_tpl->tpl_vars['hide_link']->value,'hide_delete_button'=>$_smarty_tpl->tpl_vars['hide_delete_button']->value,'first_item'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['items']['first'],'position_field'=>$_smarty_tpl->tpl_vars['positions']->value,'position'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['items']['iteration']), 0);?>

    <?php } ?>
    <?php }?>
    </tbody>
    <tbody id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data_id']->value, ENT_QUOTES, 'UTF-8');?>
_no_item"<?php if ($_smarty_tpl->tpl_vars['item_ids']->value) {?> class="hidden"<?php }?>>
    <tr class="no-items">
        <td colspan="<?php if ($_smarty_tpl->tpl_vars['positions']->value) {?>3<?php } else { ?>2<?php }?>"><p><?php echo htmlspecialchars((($tmp = @$_smarty_tpl->tpl_vars['no_item_text']->value)===null||$tmp==='' ? $_smarty_tpl->__("no_items") : $tmp), ENT_QUOTES, 'UTF-8');?>
</p></td>
    </tr>
    </tbody>
    </table>
<?php }?><?php }} ?>

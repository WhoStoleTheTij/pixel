<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 15:03:05
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/views/static_data/components/multi_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7100221665a1415f90acd80-96051232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a8d9f88561d977ccfb064f504c2a4dc071c4bd17' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/views/static_data/components/multi_list.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7100221665a1415f90acd80-96051232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'header' => 0,
    'item' => 0,
    'section_data' => 0,
    'section' => 0,
    'owner_condition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a1415f91544b3_62945020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1415f91544b3_62945020')) {function content_5a1415f91544b3_62945020($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/Users/richardh/Sites/pixel/app/lib/vendor/smarty/smarty/libs/plugins/function.math.php';
?><?php
fn_preload_lang_vars(array('position_short','name','status','position_short','expand_collapse_list','expand_collapse_list','name','status','expand_sublist_of_items','collapse_sublist_of_items','edit','delete'));
?>

<?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
?>
    <table class="table table-middle table-tree hidden-inputs">
    <?php if (count($_smarty_tpl->tpl_vars['items']->value)==0) {?>
        <thead>
        <tr>
            <th class="left" width="5%"></th>
            <th width="10%"><?php echo $_smarty_tpl->__("position_short");?>
</th>
            <th width="65%">
                &nbsp;<?php echo $_smarty_tpl->__("name");?>

            </th>
            <th width="10%">&nbsp;</th>
            <th width="10%" class="center"><?php echo $_smarty_tpl->__("status");?>
</th>
        </tr>
        </thead>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['header']->value) {?>
        <?php $_smarty_tpl->tpl_vars["header"] = new Smarty_variable('', null, 0);?>
        <thead>
        <tr>
            <th class="left" width="5%">
                <?php echo $_smarty_tpl->getSubTemplate ("common/check_items.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </th>
            <th width="10%"><?php echo $_smarty_tpl->__("position_short");?>
</th>
            <th width="65%">
                <div class="pull-left">
                <span class="hand cm-combinations cm-tooltip" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" id="on_item">
                    <span class="icon-caret-right"></span>
                </span>
                <span class="hand cm-combinations hidden cm-tooltip" title="<?php echo $_smarty_tpl->__("expand_collapse_list");?>
" id="off_item">
                    <span class="icon-caret-down"></span>
                </span>
                </div>
                &nbsp;<?php echo $_smarty_tpl->__("name");?>

            </th>
            <th width="10%">&nbsp;</th>
            <th width="10%" class="center"><?php echo $_smarty_tpl->__("status");?>
</th>
        </tr>
        </thead>
    <?php }?>
    <tr class="<?php if ($_smarty_tpl->tpl_vars['item']->value['level']>0) {?>multiple-table-row<?php }?> cm-row-item cm-row-status-<?php echo htmlspecialchars(mb_strtolower($_smarty_tpl->tpl_vars['item']->value['status'], 'UTF-8'), ENT_QUOTES, 'UTF-8');?>
">
        <td class="left" width="5%">
            <input type="checkbox" name="static_data_ids[]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
" class="checkbox cm-item">
        </td>
        <td width="10%">
            <input type="text" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
][position]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['position'], ENT_QUOTES, 'UTF-8');?>
" size="3" class="input-micro input-hidden">
        </td>
        <td width="65%">
        <span style="padding-left: <?php echo smarty_function_math(array('equation'=>"x*14",'x'=>(($tmp = @$_smarty_tpl->tpl_vars['item']->value['level'])===null||$tmp==='' ? 0 : $tmp)),$_smarty_tpl);?>
px;" class="table-elem">
            <?php if ($_smarty_tpl->tpl_vars['item']->value['subitems']) {?>
                <span class="hand cm-combination cm-tooltip" id="on_item_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("expand_sublist_of_items");?>
">
                    <span class="icon-caret-right"></span>
                </span>
                <span class="hand cm-combination hidden cm-tooltip" id="off_item_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
" title="<?php echo $_smarty_tpl->__("collapse_sublist_of_items");?>
">
                    <span class="icon-caret-down"></span>
                </span>
            <?php } else { ?>
                &nbsp;&nbsp;&nbsp;
            <?php }?>
            <a class="cm-external-click" data-ca-external-click-id="<?php echo htmlspecialchars("opener_group".((string)$_smarty_tpl->tpl_vars['item']->value['param_id']), ENT_QUOTES, 'UTF-8');?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['descr'], ENT_QUOTES, 'UTF-8');?>
</a>
        </span>
        </td>
        <td class="nowrap" width="10%">
            <div class="pull-right hidden-tools">
                <?php $_smarty_tpl->_capture_stack[0][] = array("tools_list", null, null); ob_start(); ?>
                    <li><?php ob_start();
echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['section_data']->value['edit_title']);
$_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ("common/popupbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('act'=>"edit",'text'=>$_tmp2.": ".((string)$_smarty_tpl->tpl_vars['item']->value['descr']),'link_text'=>$_smarty_tpl->__("edit"),'id'=>"group".((string)$_smarty_tpl->tpl_vars['item']->value['param_id']),'link_class'=>"tool-link",'no_icon_link'=>true,'href'=>"static_data.update?param_id=".((string)$_smarty_tpl->tpl_vars['item']->value['param_id'])."&section=".((string)$_smarty_tpl->tpl_vars['section']->value)."&".((string)$_smarty_tpl->tpl_vars['owner_condition']->value)), 0);?>
</li>
                    <li><?php smarty_template_function_btn($_smarty_tpl,array('type'=>"list",'text'=>$_smarty_tpl->__("delete"),'href'=>"static_data.delete?param_id=".((string)$_smarty_tpl->tpl_vars['item']->value['param_id'])."&section=".((string)$_smarty_tpl->tpl_vars['section']->value)."&".((string)$_smarty_tpl->tpl_vars['owner_condition']->value),'class'=>"cm-confirm cm-ajax cm-delete-row",'data'=>array('data-ca-target-id'=>'static_data_list'),'method'=>"POST"));?>
</li>
                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                <?php smarty_template_function_dropdown($_smarty_tpl,array('content'=>Smarty::$_smarty_vars['capture']['tools_list']));?>

            </div>
        </td>
        <td class="right" width="10%">
            <?php echo $_smarty_tpl->getSubTemplate ("common/select_popup.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>$_smarty_tpl->tpl_vars['item']->value['param_id'],'status'=>$_smarty_tpl->tpl_vars['item']->value['status'],'hidden'=>true,'object_id_name'=>"param_id",'table'=>"static_data"), 0);?>

        </td>
    </tr>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['item']->value['subitems']) {?>
        <div id="item_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
" class="hidden">
            <?php echo $_smarty_tpl->getSubTemplate ("views/static_data/components/multi_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('items'=>$_smarty_tpl->tpl_vars['item']->value['subitems'],'header'=>false), 0);?>

        </div>
    <?php }?>
<?php } ?><?php }} ?>

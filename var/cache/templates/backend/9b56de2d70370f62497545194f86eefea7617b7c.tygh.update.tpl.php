<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 15:03:05
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/views/static_data/update.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17458673395a1415f9208bd5-67638088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b56de2d70370f62497545194f86eefea7617b7c' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/views/static_data/update.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '17458673395a1415f9208bd5-67638088',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_data' => 0,
    'id' => 0,
    'section' => 0,
    'section_data' => 0,
    'request_key' => 0,
    'param_name' => 0,
    'value' => 0,
    'parent_items' => 0,
    'i' => 0,
    'p' => 0,
    'k' => 0,
    '_megabox_values' => 0,
    'vk' => 0,
    'vv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a1415f93c2639_37289185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1415f93c2639_37289185')) {function content_5a1415f93c2639_37289185($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('general','parent_item','root_level','position_short','none','category','all_categories','page','all_pages','static_data_use_item'));
?>
<?php if ($_smarty_tpl->tpl_vars['static_data']->value) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable($_smarty_tpl->tpl_vars['static_data']->value['param_id'], null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable("0", null, 0);?>
<?php }?>

<div id="content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">

<form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="static_data_form_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" enctype="multipart/form-data" class=" form-horizontal">
<input name="section" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value, ENT_QUOTES, 'UTF-8');?>
" />
<input name="param_id" type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" />

<div class="tabs cm-j-tabs">
    <ul class="nav nav-tabs">
        <li id="tab_general_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-js active"><a><?php echo $_smarty_tpl->__("general");?>
</a></li>
    </ul>
</div>

<div class="cm-tabs-content" id="content_tab_general_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
">
<fieldset>

    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['owner_object']) {?>
        <?php $_smarty_tpl->tpl_vars["param_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['section_data']->value['owner_object']['param'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars["request_key"] = new Smarty_variable($_smarty_tpl->tpl_vars['section_data']->value['owner_object']['key'], null, 0);?>    
        <?php $_smarty_tpl->tpl_vars["value"] = new Smarty_variable($_REQUEST[$_smarty_tpl->tpl_vars['request_key']->value], null, 0);?>

        
        
        <input type="hidden" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['param_name']->value, ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-text-large" />
        <input type="hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['request_key']->value, ENT_QUOTES, 'UTF-8');?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8');?>
" class="input-text-large" />
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['multi_level']) {?>
    <div class="control-group">
        <label for="parent_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required control-label"><?php echo $_smarty_tpl->__("parent_item");?>
:</label>
            <div class="controls">
                <select id="parent_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[parent_id]">
                    <option value="0">- <?php echo $_smarty_tpl->__("root_level");?>
 -</option>
                    <?php  $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["i"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['parent_items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["i"]->key => $_smarty_tpl->tpl_vars["i"]->value) {
$_smarty_tpl->tpl_vars["i"]->_loop = true;
?>
                        <?php if ((strpos($_smarty_tpl->tpl_vars['i']->value['id_path'],((string)$_smarty_tpl->tpl_vars['static_data']->value['id_path'])."/")===false||$_smarty_tpl->tpl_vars['static_data']->value['id_path']=='')&&$_smarty_tpl->tpl_vars['i']->value['param_id']!=$_smarty_tpl->tpl_vars['static_data']->value['param_id']||!$_smarty_tpl->tpl_vars['id']->value) {?>
                            <option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['i']->value['param_id'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['static_data']->value['parent_id']==$_smarty_tpl->tpl_vars['i']->value['param_id']) {?>selected="selected"<?php }?>><?php echo preg_replace('!^!m',str_repeat("&#166;&nbsp;&nbsp;&nbsp;&nbsp;",$_smarty_tpl->tpl_vars['i']->value['level']),htmlspecialchars($_smarty_tpl->tpl_vars['i']->value['descr'], ENT_QUOTES, 'UTF-8', true));?>
</option>
                        <?php }?>
                    <?php } ?>
                </select>
            </div>
    </div>
    <?php }?>

    <div class="control-group">
        <label for="descr_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required control-label"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['section_data']->value['descr']);?>
:</label>
        <div class="controls">
            <input type="text" size="40" id="descr_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[descr]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_data']->value['descr'], ENT_QUOTES, 'UTF-8');?>
" class="input-text-large main-input">
        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['multi_level']) {?>
    <div class="control-group">
        <label for="position_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label"><?php echo $_smarty_tpl->__("position_short");?>
:</label>
        <div class="controls">
            <input type="text" size="2" id="position_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[position]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_data']->value['position'], ENT_QUOTES, 'UTF-8');?>
" class="input-text-short">
        </div>
    </div>
    <?php }?>
    <div class="control-group">
        <label for="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['section_data']->value['param']);
if ($_smarty_tpl->tpl_vars['section_data']->value['tooltip']) {
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>$_smarty_tpl->__($_smarty_tpl->tpl_vars['section_data']->value['tooltip'])), 0);
}?>:</label>
        <div class="controls">
            <input type="text" size="40" id="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[param]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_data']->value['param'], ENT_QUOTES, 'UTF-8');?>
" class="input-text-large">
        </div>
    </div>

    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['icon']) {?>
    <div class="control-group">
        <label class="control-label"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['section_data']->value['icon']['title']);?>
:</label>
        <div class="controls">
            <?php echo $_smarty_tpl->getSubTemplate ("common/attach_images.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('image_name'=>"static_data_icon",'image_object_type'=>"static_data_".((string)$_smarty_tpl->tpl_vars['section']->value),'image_pair'=>$_smarty_tpl->tpl_vars['static_data']->value['icon'],'no_detailed'=>"Y",'hide_titles'=>"Y",'image_key'=>$_smarty_tpl->tpl_vars['id']->value,'image_object_id'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

        </div>
    </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['additional_params']) {?>
    <?php  $_smarty_tpl->tpl_vars["p"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["p"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['section_data']->value['additional_params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["p"]->key => $_smarty_tpl->tpl_vars["p"]->value) {
$_smarty_tpl->tpl_vars["p"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["p"]->key;
?>
        <?php if ($_smarty_tpl->tpl_vars['p']->value['type']=="hidden") {?>    
            <input type="hidden" id="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_data']->value[$_smarty_tpl->tpl_vars['p']->value['name']], ENT_QUOTES, 'UTF-8');?>
" class="input-text-large" />
        <?php } else { ?>
            <div class="control-group">
                <label for="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="control-label"><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['p']->value['title']);
if ($_smarty_tpl->tpl_vars['p']->value['tooltip']) {
echo $_smarty_tpl->getSubTemplate ("common/tooltip.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('tooltip'=>$_smarty_tpl->__($_smarty_tpl->tpl_vars['p']->value['tooltip'])), 0);
}?>:</label>
                <div class="controls mixed-controls cm-bs-group">
                    <?php if ($_smarty_tpl->tpl_vars['p']->value['type']=="checkbox") {?>
                        <input type="hidden" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" value="N" />
                        <input type="checkbox" id="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" value="Y" <?php if ($_smarty_tpl->tpl_vars['static_data']->value[$_smarty_tpl->tpl_vars['p']->value['name']]=="Y") {?>checked="checked"<?php }?> class="checkbox" />
                    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['type']=="megabox") {?>
                        <?php $_smarty_tpl->tpl_vars["_megabox_values"] = new Smarty_variable(fn_static_data_megabox($_smarty_tpl->tpl_vars['static_data']->value[$_smarty_tpl->tpl_vars['p']->value['name']]), null, 0);?>
                        <div class="cm-bs-container form-inline clearfix">
                            <label class="radio pull-left">
                                <input type="radio" class="cm-bs-trigger" name="static_data[megabox][type][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" <?php if (!$_smarty_tpl->tpl_vars['_megabox_values']->value) {?>checked="checked"<?php }?> value="" onclick="Tygh.$('#un_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
').prop('disabled', true);">
                                <?php echo $_smarty_tpl->__("none");?>

                            </label>
                        </div>
                        
                        <div class="cm-bs-container form-inline clearfix">
                            <label class="radio pull-left">
                                <input type="radio" class="cm-bs-trigger" name="static_data[megabox][type][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['_megabox_values']->value['types']['C']) {?>checked="checked"<?php }?> value="C" onclick="Tygh.$('#un_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
').prop('disabled', false);">
                                <?php echo $_smarty_tpl->__("category");?>
:
                            </label>
                            <div class="cm-bs-block pull-left disable-overlay-wrap">
                                <?php echo $_smarty_tpl->getSubTemplate ("pickers/categories/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_id'=>"megabox_category_".((string)$_smarty_tpl->tpl_vars['id']->value),'input_name'=>"static_data[".((string)$_smarty_tpl->tpl_vars['p']->value['name'])."][C]",'item_ids'=>$_smarty_tpl->tpl_vars['_megabox_values']->value['types']['C']['value'],'hide_link'=>true,'hide_delete_button'=>true,'default_name'=>$_smarty_tpl->__("all_categories"),'extra'=>''), 0);?>

                                <div class="disable-overlay cm-bs-off"></div>
                            </div>
                        </div>
                
                        <div class="cm-bs-container form-inline clearfix">
                            <label class="radio pull-left">
                                <input type="radio" class="cm-bs-trigger" name="static_data[megabox][type][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" <?php if ($_smarty_tpl->tpl_vars['_megabox_values']->value['types']['A']) {?>checked="checked"<?php }?> value="A" onclick="Tygh.$('#un_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
').prop('disabled', false);">
                                <?php echo $_smarty_tpl->__("page");?>
:
                            </label>
                            <div class="cm-bs-block pull-left disable-overlay-wrap">
                                <?php echo $_smarty_tpl->getSubTemplate ("pickers/pages/picker.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_id'=>"megabox_page_".((string)$_smarty_tpl->tpl_vars['id']->value),'input_name'=>"static_data[".((string)$_smarty_tpl->tpl_vars['p']->value['name'])."][A]",'item_ids'=>$_smarty_tpl->tpl_vars['_megabox_values']->value['types']['A']['value'],'hide_link'=>true,'hide_delete_button'=>true,'default_name'=>$_smarty_tpl->__("all_pages"),'extra'=>'','no_container'=>true,'prepend'=>true), 0);?>

                                <div class="disable-overlay cm-bs-off"></div>
                            </div>
                        </div>
                        <br />
                        <label for="un_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="checkbox clearfix">
                            <input type="hidden" name="static_data[megabox][use_item][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" value="N" />
                            <input type="checkbox" name="static_data[megabox][use_item][<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" id="un_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['_megabox_values']->value['use_item']=="Y") {?>checked="checked"<?php }?> value="Y" <?php if (!$_smarty_tpl->tpl_vars['_megabox_values']->value) {?>disabled="disabled"<?php }?>><?php echo $_smarty_tpl->__("static_data_use_item");?>

                        </label>

                    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['type']=="select") {?>
                        <select id="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]">
                        <?php  $_smarty_tpl->tpl_vars["vv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["vv"]->_loop = false;
 $_smarty_tpl->tpl_vars["vk"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['p']->value['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["vv"]->key => $_smarty_tpl->tpl_vars["vv"]->value) {
$_smarty_tpl->tpl_vars["vv"]->_loop = true;
 $_smarty_tpl->tpl_vars["vk"]->value = $_smarty_tpl->tpl_vars["vv"]->key;
?>
                        <option    value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vk']->value, ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['static_data']->value[$_smarty_tpl->tpl_vars['p']->value['name']]==$_smarty_tpl->tpl_vars['vk']->value) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->__($_smarty_tpl->tpl_vars['vv']->value);?>
</option>
                        <?php } ?>
                        </select>
                    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['type']=="input") {?>
                        <input type="text" id="param_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8');?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" name="static_data[<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8');?>
]" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['static_data']->value[$_smarty_tpl->tpl_vars['p']->value['name']], ENT_QUOTES, 'UTF-8');?>
" class="input-text-large" />
                    <?php }?>
                </div>
            </div>        
        <?php }?>
    <?php } ?>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['section_data']->value['has_localization']) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("views/localizations/components/select.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('data_name'=>"static_data[localization]",'data_from'=>$_smarty_tpl->tpl_vars['static_data']->value['localization']), 0);?>

    <?php }?>
</fieldset>
<!--content_tab_general_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>

<?php if (fn_allow_save_object('',"static_data",$_smarty_tpl->tpl_vars['section_data']->value['skip_edition_checking'])) {?>
    <div class="buttons-container">
        <?php echo $_smarty_tpl->getSubTemplate ("buttons/save_cancel.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[static_data.update]",'cancel_action'=>"close",'save'=>$_smarty_tpl->tpl_vars['id']->value), 0);?>

    </div>
<?php }?>

</form>
<!--content_group<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
--></div>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 15:35:34
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/views/templates/components/file_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11402129865a141d96571749-71438018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35cf22165147675e916d0727fc1d4c6cb6a58012' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/views/templates/components/file_list.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '11402129865a141d96571749-71438018',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
    'config' => 0,
    'active_object' => 0,
    'last_object' => 0,
    'uniqid' => 0,
    'file_ext' => 0,
    'render_placed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a141d96694627_89906680',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a141d96694627_89906680')) {function content_5a141d96694627_89906680($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_in_array')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/modifier.in_array.php';
?><?php $_smarty_tpl->tpl_vars['render_placed'] = new Smarty_variable(false, null, 0);?>

<ul>
    <?php  $_smarty_tpl->tpl_vars["item"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["item"]->_loop = false;
 $_smarty_tpl->tpl_vars["item_id"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["item"]->key => $_smarty_tpl->tpl_vars["item"]->value) {
$_smarty_tpl->tpl_vars["item"]->_loop = true;
 $_smarty_tpl->tpl_vars["item_id"]->value = $_smarty_tpl->tpl_vars["item"]->key;
?>
        <?php $_smarty_tpl->tpl_vars["forbidden"] = new Smarty_variable(false, null, 0);?>
        <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=="F") {?>
            <?php $_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable('', null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="gif") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("gif", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="jpg") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("jpg", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="jpeg") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("jpg", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="png") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("png", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="html"||$_smarty_tpl->tpl_vars['item']->value['ext']=="htm") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("html", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="tgz"||$_smarty_tpl->tpl_vars['item']->value['ext']=="zip"||$_smarty_tpl->tpl_vars['item']->value['ext']=="zip2"||$_smarty_tpl->tpl_vars['item']->value['ext']=="gz"||$_smarty_tpl->tpl_vars['item']->value['ext']=="bz"||$_smarty_tpl->tpl_vars['item']->value['ext']=="rar") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("zip", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="tpl"||$_smarty_tpl->tpl_vars['item']->value['ext']=="txt") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("tpl", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="php") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("php", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="css") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("css", null, 0);
}?>
            <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']=="js") {
$_smarty_tpl->tpl_vars["file_ext"] = new Smarty_variable("js", null, 0);
}?>
            <?php if (smarty_modifier_in_array($_smarty_tpl->tpl_vars['item']->value['ext'],$_smarty_tpl->tpl_vars['config']->value['forbidden_file_extensions'])) {
$_smarty_tpl->tpl_vars["forbidden"] = new Smarty_variable(true, null, 0);
}?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars["uniqid"] = new Smarty_variable(uniqid(10), null, 0);?>
        <li class="<?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->tpl_vars['active_object']->value) {?>parent<?php }?> <?php if ($_smarty_tpl->tpl_vars['last_object']->value&&$_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->tpl_vars['active_object']->value) {?>active<?php }?>">
            <a data-ca-item-full-path="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['full_path'], ENT_QUOTES, 'UTF-8');?>
" data-ca-item-path="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['path'], ENT_QUOTES, 'UTF-8');?>
" data-ca-item-filename="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['ext']) {?>data-ca-item-ext="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['ext'], ENT_QUOTES, 'UTF-8');?>
"<?php }?> data-ca-item-type="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['type'], ENT_QUOTES, 'UTF-8');?>
" class="cm-te-file" id="file_id_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['uniqid']->value, ENT_QUOTES, 'UTF-8');?>
">
                <span class="overlay"></span>
                <span class="item">
                <?php if ($_smarty_tpl->tpl_vars['item']->value['type']=="D") {?>
                    <i class="icon-caret-right"></i>
                <?php } elseif ($_smarty_tpl->tpl_vars['file_ext']->value=="gif"||$_smarty_tpl->tpl_vars['file_ext']->value=="jpg"||$_smarty_tpl->tpl_vars['file_ext']->value=="jpeg"||$_smarty_tpl->tpl_vars['file_ext']->value=="png") {?>
                    <i class="icon-picture"></i>
                <?php } else { ?>
                    <i class="icon-file"></i>
                <?php }?>
                    <span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['name'], ENT_QUOTES, 'UTF-8');?>
</span>
                </span>
            </a>

            <?php if ($_smarty_tpl->tpl_vars['item']->value['name']==$_smarty_tpl->tpl_vars['active_object']->value) {?>
                <?php $_smarty_tpl->tpl_vars['render_placed'] = new Smarty_variable(true, null, 0);?>
                <!--render_place-->
            <?php }?>
        </li>
    <?php } ?>

    <?php if (!$_smarty_tpl->tpl_vars['render_placed']->value) {?> 
        <!--render_place-->
    <?php }?>
</ul><?php }} ?>

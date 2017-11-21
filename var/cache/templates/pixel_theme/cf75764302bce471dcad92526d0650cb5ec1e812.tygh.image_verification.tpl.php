<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:54:40
         compiled from "/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/recaptcha/overrides/common/image_verification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7813557525a141400c5a758-13956944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf75764302bce471dcad92526d0650cb5ec1e812' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/recaptcha/overrides/common/image_verification.tpl',
      1 => 1511262100,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '7813557525a141400c5a758-13956944',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'runtime' => 0,
    'option' => 0,
    'id' => 0,
    'auth' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a141400ca53e3_81585559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a141400ca53e3_81585559')) {function content_5a141400ca53e3_81585559($_smarty_tpl) {?><?php if (!is_callable('smarty_function_set_id')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.set_id.php';
?><?php
fn_preload_lang_vars(array('image_verification_label','image_verification_label'));
?>
<?php if ($_smarty_tpl->tpl_vars['runtime']->value['customization_mode']['design']=="Y"&&@constant('AREA')=="C") {
$_smarty_tpl->_capture_stack[0][] = array("template_content", null, null); ob_start();
if (fn_needs_image_verification($_smarty_tpl->tpl_vars['option']->value)) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(uniqid("recaptcha_"), null, 0);?>
    <div class="captcha ty-control-group">
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required cm-recaptcha ty-captcha__label"><?php echo $_smarty_tpl->__("image_verification_label");?>
</label>
        <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-recaptcha ty-captcha-container"></div>
    </div>
<?php }
list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();
if (trim(Smarty::$_smarty_vars['capture']['template_content'])) {
if ($_smarty_tpl->tpl_vars['auth']->value['area']=="A") {?><span class="cm-template-box template-box" data-ca-te-template="/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/recaptcha/overrides/common/image_verification.tpl" id="<?php echo smarty_function_set_id(array('name'=>"/Users/richardh/Sites/pixel/design/themes/responsive/templates/addons/recaptcha/overrides/common/image_verification.tpl"),$_smarty_tpl);?>
"><div class="cm-template-icon icon-edit ty-icon-edit hidden"></div><?php echo Smarty::$_smarty_vars['capture']['template_content'];?>
<!--[/tpl_id]--></span><?php } else {
echo Smarty::$_smarty_vars['capture']['template_content'];
}
}
} else {
if (fn_needs_image_verification($_smarty_tpl->tpl_vars['option']->value)) {?>
    <?php $_smarty_tpl->tpl_vars["id"] = new Smarty_variable(uniqid("recaptcha_"), null, 0);?>
    <div class="captcha ty-control-group">
        <label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-required cm-recaptcha ty-captcha__label"><?php echo $_smarty_tpl->__("image_verification_label");?>
</label>
        <div id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['id']->value, ENT_QUOTES, 'UTF-8');?>
" class="cm-recaptcha ty-captcha-container"></div>
    </div>
<?php }
}?><?php }} ?>

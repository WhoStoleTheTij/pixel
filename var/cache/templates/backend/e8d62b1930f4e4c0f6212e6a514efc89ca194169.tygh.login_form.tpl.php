<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 23:37:10
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/views/auth/login_form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18423333455a148e76c489c3-28719098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8d62b1930f4e4c0f6212e6a514efc89ca194169' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/views/auth/login_form.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '18423333455a148e76c489c3-28719098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stored_user_login' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a148e76d03c40_91910137',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a148e76d03c40_91910137')) {function content_5a148e76d03c40_91910137($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('administration_panel','email','password','forgot_password_question'));
?>
<div class="modal signin-modal">
    <form action="<?php echo htmlspecialchars(fn_url(''), ENT_QUOTES, 'UTF-8');?>
" method="post" name="main_login_form" class=" cm-skip-check-items cm-check-changes">
        <input type="hidden" name="return_url" value="<?php echo htmlspecialchars(fn_query_remove(fn_url($_REQUEST['return_url'],"A","rel"),"return_url"), ENT_QUOTES, 'UTF-8');?>
">
        <div class="modal-header">
            <h4><?php echo $_smarty_tpl->__("administration_panel");?>
</h4>
        </div>
        <div class="modal-body">
            <div class="control-group">
                <label for="username" class="cm-trim cm-required cm-email"><?php echo $_smarty_tpl->__("email");?>
:</label>
                <input id="username" type="text" name="user_login" size="20" value="<?php if ($_smarty_tpl->tpl_vars['stored_user_login']->value) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['stored_user_login']->value, ENT_QUOTES, 'UTF-8');
} else {
echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['demo_username'], ENT_QUOTES, 'UTF-8');
}?>" class="cm-focus" tabindex="1">
            </div>
            <div class="control-group">
                <label for="password" class="cm-required"><?php echo $_smarty_tpl->__("password");?>
:</label>
                <input type="password" id="password" name="password" size="20" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['demo_password'], ENT_QUOTES, 'UTF-8');?>
" tabindex="2" maxlength="32">
            </div>
        </div>
        <div class="modal-footer">
            <?php echo $_smarty_tpl->getSubTemplate ("buttons/sign_in.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('but_name'=>"dispatch[auth.login]",'but_role'=>"button_main",'tabindex'=>"3"), 0);?>

            <a href="<?php echo htmlspecialchars(fn_url("auth.recover_password"), ENT_QUOTES, 'UTF-8');?>
" class="pull-right"><?php echo $_smarty_tpl->__("forgot_password_question");?>
</a>
        </div>
    </form>
</div><?php }} ?>

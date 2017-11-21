<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 15:32:42
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/common/theme_editor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7795685605a141cea414647-26933070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0fd65648b13aee71efa56e9590985d52ffaafe9' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/common/theme_editor.tpl',
      1 => 1510925878,
      2 => 'backend',
    ),
  ),
  'nocache_hash' => '7795685605a141cea414647-26933070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a141cea4679c3_73178831',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a141cea4679c3_73178831')) {function content_5a141cea4679c3_73178831($_smarty_tpl) {?><?php if (!is_callable('smarty_function_script')) include '/Users/richardh/Sites/pixel/app/functions/smarty_plugins/function.script.php';
?><?php echo smarty_function_script(array('src'=>"js/lib/ace/ace.js"),$_smarty_tpl);?>

<div id="theme_editor">
<div class="theme-editor"></div>
<?php echo '<script'; ?>
>
(function(_, $) {
    $.extend(_, {
        query_string: encodeURIComponent('<?php echo strtr($_SERVER['QUERY_STRING'], array("\\" => "\\\\", "'" => "\\'", "\"" => "\\\"", "\r" => "\\r", "\n" => "\\n", "</" => "<\/" ));?>
')
    });
})(Tygh, Tygh.$);
<?php echo '</script'; ?>
>
<?php echo smarty_function_script(array('src'=>"js/tygh/theme_editor.js"),$_smarty_tpl);?>

<!--theme_editor--></div>
<?php }} ?>

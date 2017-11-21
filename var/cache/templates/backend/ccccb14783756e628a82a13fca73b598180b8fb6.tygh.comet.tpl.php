<?php /* Smarty version Smarty-3.1.21, created on 2017-11-21 14:15:42
         compiled from "/Users/richardh/Sites/pixel/design/backend/templates/common/comet.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16554380575a140adeafe7f5-55195833%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccccb14783756e628a82a13fca73b598180b8fb6' => 
    array (
      0 => '/Users/richardh/Sites/pixel/design/backend/templates/common/comet.tpl',
      1 => 1510925878,
      2 => 'tygh',
    ),
  ),
  'nocache_hash' => '16554380575a140adeafe7f5-55195833',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5a140adeb05572_08191493',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a140adeb05572_08191493')) {function content_5a140adeb05572_08191493($_smarty_tpl) {?><?php
fn_preload_lang_vars(array('processing'));
?>
<a id="comet_container_controller" data-backdrop="static" data-keyboard="false" href="#comet_control" data-toggle="modal" class="hide"></a>

<div class="modal hide fade" id="comet_control" tabindex="-1" role="dialog" aria-labelledby="comet_title" aria-hidden="true">
    <div class="modal-header">
        <h3 id="comet_title"><?php echo $_smarty_tpl->__("processing");?>
</h3>
    </div>
    <div class="modal-body">
        <p></p>
        <div class="progress progress-striped active">
            
            <div class="bar" style="width: 0%;"></div>
        </div>
    </div>
</div><?php }} ?>

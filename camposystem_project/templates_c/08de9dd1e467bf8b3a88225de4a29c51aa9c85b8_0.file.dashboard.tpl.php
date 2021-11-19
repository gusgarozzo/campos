<?php
/* Smarty version 3.1.39, created on 2021-11-19 14:13:19
  from '/Applications/MAMP/htdocs/camposystem/camposystem_project/templates/dashboard.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6197db2f632733_44991627',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08de9dd1e467bf8b3a88225de4a29c51aa9c85b8' => 
    array (
      0 => '/Applications/MAMP/htdocs/camposystem/camposystem_project/templates/dashboard.tpl',
      1 => 1637335780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_6197db2f632733_44991627 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<h1>Bienvenido a Camposystem</h1>
<?php echo $_smarty_tpl->tpl_vars['date']->value;
}
}

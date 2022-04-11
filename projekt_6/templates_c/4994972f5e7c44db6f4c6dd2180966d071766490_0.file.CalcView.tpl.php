<?php
/* Smarty version 4.1.0, created on 2022-04-11 19:09:06
  from 'D:\PROGRAMY\xampp\xampp\htdocs\php_07_routing\app\views\CalcView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_625460b243a8e8_91557426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4994972f5e7c44db6f4c6dd2180966d071766490' => 
    array (
      0 => 'D:\\PROGRAMY\\xampp\\xampp\\htdocs\\php_07_routing\\app\\views\\CalcView.tpl',
      1 => 1649696945,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_625460b243a8e8_91557426 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_544409348625460b242da12_09688972', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_544409348625460b242da12_09688972 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_544409348625460b242da12_09688972',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_sum">Kwota kredytu: </label>
			<input id="id_sum" type="text" name="sum" placeholder="np. 25000 (zł)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->sum;?>
" /> zł<br />
		</div>
        <div class="pure-control-group">
			<label for="id_interest">Oprocentowanie: </label>
			<input id="id_interest" type="text" name="interest" placeholder="np. 4.7 (%)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" /> %<br />
		</div>
        <div class="pure-control-group">
			<label for="id_times">Ile lat chcesz spłacać kredyt: </label>
			<input id="id_times" type="text" name="times" placeholder="np. 5 (lat)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->times;?>
" /> lat<br />
		</div>
		<div class="pure-controls">
			<?php if ($_smarty_tpl->tpl_vars['user']->value->role == "admin") {?>
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
			<?php }?>
		</div>
	</fieldset>
</form>	

<?php $_smarty_tpl->_subTemplateRender('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ((isset($_smarty_tpl->tpl_vars['res']->value->result))) {?>
<div class="messages info">
	Wynik: <?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

</div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}

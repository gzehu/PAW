<?php
/* Smarty version 3.1.30, created on 2022-04-04 20:47:16
  from "D:\PROGRAMY\xampp\xampp\htdocs\projekt_5\app\views\CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_624b3d3468d836_20997116',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b3251154c85559fb53fc984b6452d3404d9eff9' => 
    array (
      0 => 'D:\\PROGRAMY\\xampp\\xampp\\htdocs\\projekt_5\\app\\views\\CalcView.tpl',
      1 => 1649097673,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
  ),
),false)) {
function content_624b3d3468d836_20997116 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1436138572624b3d34678451_97877317', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1111395505624b3d3468cfe8_78346178', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_1436138572624b3d34678451_97877317 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_1111395505624b3d3468cfe8_78346178 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
calcCompute" method="post">
	<fieldset>
		<label for="id_sum">Kwota kredytu: </label>
		<input id="id_sum" type="text" name="sum" placeholder="np. 20000 (zł)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->sum;?>
" /> <br /> 
		<label for="id_interest">Oprocentowanie: </label>
		<input id="id_interest" type="text" name="interest" placeholder="np. 4.7 (%)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->interest;?>
" /> <br />
		<label for="id_times">Ile lat: </label>
		<input id="id_times" type="text" name="times" placeholder="np. 5 (lat)" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->times;?>
" /> <br />
		</fieldset>	
		<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<div class="messages">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}

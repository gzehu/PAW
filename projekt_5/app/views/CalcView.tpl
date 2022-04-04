{extends file="main.tpl"}
{* przy zdefiniowanych folderach nie trzeba już podawać pełnej ścieżki *}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<h3>Prosty kalkulator</h2>


<form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
	<fieldset>
		<label for="id_sum">Kwota kredytu: </label>
		<input id="id_sum" type="text" name="sum" placeholder="np. 20000 (zł)" value="{$form->sum}" /> <br /> 
		<label for="id_interest">Oprocentowanie: </label>
		<input id="id_interest" type="text" name="interest" placeholder="np. 4.7 (%)" value="{$form->interest}" /> <br />
		<label for="id_times">Ile lat: </label>
		<input id="id_times" type="text" name="times" placeholder="np. 5 (lat)" value="{$form->times}" /> <br />
		</fieldset>	
		<input type="submit" value="Oblicz" class="pure-button pure-button-primary" />
</form>	

<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wynik</h4>
	<p class="res">
	{$res->result}
	</p>
{/if}

</div>

{/block}
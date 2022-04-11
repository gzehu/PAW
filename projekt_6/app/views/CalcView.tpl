{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_sum">Kwota kredytu: </label>
			<input id="id_sum" type="text" name="sum" placeholder="np. 25000 (zł)" value="{$form->sum}" /> zł<br />
		</div>
        <div class="pure-control-group">
			<label for="id_interest">Oprocentowanie: </label>
			<input id="id_interest" type="text" name="interest" placeholder="np. 4.7 (%)" value="{$form->interest}" /> %<br />
		</div>
        <div class="pure-control-group">
			<label for="id_times">Ile lat chcesz spłacać kredyt: </label>
			<input id="id_times" type="text" name="times" placeholder="np. 5 (lat)" value="{$form->times}" /> lat<br />
		</div>
		<div class="pure-controls">
			{if $user->role == "admin"}
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
			{/if}
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages info">
	Wynik: {$res->result}
</div>
{/if}

{/block}
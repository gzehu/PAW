<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="id_sum">Kwota kredytu: </label>
	<input id="id_sum" type="text" name="sum" placeholder="np. 20000 (zł)" value="<?php if(isset($sum)){print($sum);} ?>" /> zł<br /> 
	<label for="id_interest">Oprocentowanie: </label>
	<input id="id_interest" type="text" name="interest" placeholder="np. 4.7 (%)" value="<?php if(isset($interest)){print($interest);} ?>" /> %<br />
	<label for="id_time">Ile lat: </label>
	<input id="id_time" type="text" name="time" placeholder="np. 5 (lat)" value="<?php if(isset($time)){print($time);} ?>" /> lat<br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Rata miesięczna wynosi: '.$result.' zł'; ?>
</div>
<?php } ?>

</body>
</html>
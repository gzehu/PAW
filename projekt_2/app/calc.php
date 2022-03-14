<?php
require_once dirname(__FILE__).'/../config.php';

// KONTROLER strony kalkulatora

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$sum,&$interest,&$time){
	$sum = isset($_REQUEST['sum']) ? $_REQUEST['sum'] : null;
	$interest = isset($_REQUEST['interest']) ? $_REQUEST['interest'] : null;
	$time = isset($_REQUEST['time']) ? $_REQUEST['time'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$sum,&$interest,&$time,&$messages){
	// sprawdzenie, czy parametry zostały przekazane
	if ( ! (isset($sum) && isset($interest) && isset($time))) {
		// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
		// teraz zakładamy, ze nie jest to błąd. Po prostu nie wykonamy obliczeń
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $sum == "") {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( $interest == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $time == "") {
	$messages [] = 'Nie podano na ile lat';
}

	//nie ma sensu walidować dalej gdy brak parametrów
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $sum )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $interest ) && $interest > 0) {
		$messages [] = 'Oprocentowanie zostało błędnie podane. Wartość musi być większa od zera.';
	}	
	
	if (! is_numeric( $time )) {
		$messages [] = 'Czas trwania nie jest liczbą całkowitą';
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$sum,&$interest,&$time,&$messages,&$result,&$rata){
	global $role;
	
	//konwersja parametrów na int
	$sum = intval($sum);
	$time = intval($time);
	$interest = floatval($interest);
	$q = 1+(($interest/100)/12);
	$years = $time * 12;
	//wykonanie operacji;
	$rata = $sum*pow($q, $years)*($q-1)/((pow($q, $years))-1);
	$result = round($rata, 2);
}

//definicja zmiennych kontrolera
$sum = null;
$interest = null;
$time = null;
$result = null;
$rata = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($sum,$interest,$time);
if ( validate($sum,$interest,$time,$messages) ) { // gdy brak błędów
	process($sum,$interest,$time,$messages,$result,$rata);
}

// Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
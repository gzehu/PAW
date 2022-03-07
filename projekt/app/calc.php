<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$sum = $_REQUEST ['sum'];
$interest = $_REQUEST ['interest'];
$time = $_REQUEST ['time'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($sum) && isset($interest) && isset($time))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
	
	// sprawdzenie, czy $sum i $interest są liczbami całkowitymi
	if (! is_numeric( $sum )) {
		$messages [] = 'Kwota kredytu nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $interest ) && $interest > 0) {
		$messages [] = 'Oprocentowanie zostało błędnie podane. Wartość musi być większa od zera.';
	}	
	
	if (! is_numeric( $time )) {
		$messages [] = 'Czas trwania nie jest liczbą całkowitą';
	}
	
}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
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

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$sum,$interest,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';
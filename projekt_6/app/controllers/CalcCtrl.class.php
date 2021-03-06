<?php
// W skrypcie definicji kontrolera nie trzeba dołączać już niczego.
// Kontroler wskazuje tylko za pomocą 'use' te klasy z których jawnie korzysta
// (gdy korzysta niejawnie to nie musi - np używa obiektu zwracanego przez funkcję)

// Zarejestrowany autoloader klas załaduje odpowiedni plik automatycznie w momencie, gdy skrypt będzie go chciał użyć.
// Jeśli nie wskaże się klasy za pomocą 'use', to PHP będzie zakładać, iż klasa znajduje się w bieżącej
// przestrzeni nazw - tutaj jest to przestrzeń 'app\controllers'.

// Przypominam, że tu również są dostępne globalne funkcje pomocnicze - o to nam właściwie chodziło

namespace app\controllers;

//zamieniamy zatem 'require' na 'use' wskazując jedynie przestrzeń nazw, w której znajduje się klasa
use app\forms\CalcForm;
use app\transfer\CalcResult;

/** Kontroler kalkulatora

 */
class CalcCtrl {

	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
        $this->form->sum = getFromRequest('sum');
        $this->form->interest = getFromRequest('interest');
        $this->form->times = getFromRequest('times');
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
        if (! (isset ( $this->form->sum ) && isset ( $this->form->interest ) && isset ( $this->form->times ))) {
            // sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
        if ($this->form->sum == "") {
            getMessages()->addError('Nie podano kwoty');
        }
        if ($this->form->interest == "") {
            getMessages()->addError('Nie podano oprocentowania');
        }
        if ($this->form->times == "") {
            getMessages()->addError('Nie podano rat');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
        if (! getMessages()->isError()) {

            // sprawdzenie, czy $x i $y są liczbami całkowitymi
            if (! is_numeric ( $this->form->sum )) {
                getMessages()->addError('Kwota nie jest liczbą całkowitą');
            }

            if (! is_numeric ( $this->form->times )) {
                getMessages()->addError('Raty nie są liczbą całkowitą');
            }
        }

        return ! getMessages()->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			//konwersja parametrów na int
            $this->form->sum = intval($this->form->sum);
            $this->form->interest = intval($this->form->interest);
            $this->form->times = intval($this->form->times);
            getMessages()->addInfo('Parametry poprawne.');
				
			//wykonanie operacji
            $q = 1+((($this->form->interest)/100)/12);
            $years = $this->form->times  * 12;
            $rata = round($this->form->sum *pow($q, $years)*($q-1)/((pow($q, $years))-1),2);
            $this->result->result = $rata;


			
			getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	public function action_calcShow(){
		getMessages()->addInfo('Witaj w kalkulatorze');
		$this->generateView();
	}
	
	/**
	 * Wygenerowanie widoku
	 */
	public function generateView(){

		getSmarty()->assign('user',unserialize($_SESSION['user']));
				
		getSmarty()->assign('page_title','Kalkulejtor');

		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}

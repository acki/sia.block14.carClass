 <?php

	/**
	 * Autoklasse
	 *
	 * Macht ein bisschen was mit Autos
	*/

 	class Car {

 		private $car;
 		private $mysql;

 		/**
		 * Klasse initialisieren
 		*/

 		public function __construct() {

 			$this->mysql = new SQL('cars');

 			echo "Ich bin eine Autoklasse!<br><br>";

 		}

 		/**
		 * Alle Modelle ausgeben
 		*/

 		public function getModels() {

 			$query = $this->mysql->getEntries('models');

 			echo 'Folgende Modelle habe ich für Dich gespeichert:<br><br>';

 			foreach($query as $q) {

 				echo 'Modellname: <b>' . $q['name'] . '</b><br>';

 			}

 		}

 		/**
		 * Neues Modell speichern
		 *
		 * @param string $modelname Name des Modells
 		*/

 		public function setModel($modelname) {

 			$this->mysql->setEntry('models', array('name' => $modelname));

 			return "Neues Modell gespeichert.";

 		}

 	}

?>
 <?php

 	class Car {

 		private $car;
 		private $mysql;

 		public function __construct() {

 			$this->mysql = new SQL('cars');

 			echo "Ich bin eine Autoklasse!<br><br>";



 		}

 		public function getCars() {

 			$query = $this->mysql->getEntries('models');

 			echo 'Folgende Modelle habe ich für Dich gespeichert:<br><br>';

 			foreach($query as $q) {

 				echo 'Modellname: <b>' . $q['name'] . '</b><br>';

 			}

 		}

 		public function setModel($modelname) {

 			$this->mysql->setEntry('models', array('name' => $modelname));

 			return "Neues Modell gespeichert.";

 		}

 	}

?>
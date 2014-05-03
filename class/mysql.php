<?php

	/**
	 * Klasse für MySQL Funktionalität
	 *
	 * @param string $database Zu verbindende Datenbank
 	*/

	class SQL {

		public $mysql;

		public function __construct($database) {

			$this->mysql = @mysqli_connect('localhost', 'root', '', $database);

			if(mysqli_connect_errno()) {

				echo '<h2>MySQL Connect Fail: ' . mysqli_connect_error() . '</h2><br><br>';

			}

		}

		/**
		 * Gibt alle Einträge einer Tabelle zurück
		 *
		 * @param string $table Tabellenname
 		*/

		public function getEntries($table) {

			$query = mysqli_query($this->mysql, 'SELECT * FROM ' . $table);
			$result = array();
			while($fetch = mysqli_fetch_array($query)) {
				array_push($result, $fetch);
			}

			return $result;

		}

		/**
		 * Speichert Daten in einer Tabelle
		 *
		 * @param string $table Tabellenname
		 * @param array $data Array mit Daten
 		*/

		public function setEntry($table, $data) {

			$query = 'INSERT INTO ' . $table . ' ';

			$keys = '';
			$values = '';
			$i = 0;

			foreach($data as $key => $value) {

				$i++;

				$keys .= $key;
				$values .= "'" . $value . "'";

				if($i < count($data)) {
					$keys .= ',';
					$values .= ',';
				}

			}

			$query = $query . '(' . $keys . ')';
			$query = $query . ' VALUES (' . $values . ')';

			mysqli_query($this->mysql, $query) or mysqli_error($this->mysql);

		}

	}

?>
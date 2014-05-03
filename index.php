<?php

	// Dateien einbinden
	require_once('class/mysql.php');
	require_once('class/car.php');

	// Neue Autoklasse instanzieren
	$car = new Car;

	// Überprüfen ob Formulardaten abgesendet wurden
	if($_POST) {

		// Neues Modell speichern
		$message = $car->setModel($_POST['model']);

	}

	// Alle Autos anzeigen
	$car->getModels();

	echo '<hr>';

	// Formular anzeigen
	echo '
		<form method="post">

			<label for="model">Modell:</label>
			<input id="model" type="text" name="model">

			<input type="submit">

		</form>
	';

	// Meldung anzeigen wenn vorhanden
	if(isset($message)) {
		echo '<strong>' . $message . '</strong>';
	}

?>
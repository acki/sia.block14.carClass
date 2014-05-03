<?php

	require_once('class/mysql.php');
	require_once('class/cars.php');

	$car = new Car;

	if($_POST) {

		$message = $car->setModel($_POST['model']);

	}

	$car->getCars();

	echo '<hr>';

	echo '
		<form method="post">

			<label for="model">Modell:</label>
			<input id="model" type="text" name="model">

			<input type="submit">

		</form>
	';

	if(isset($message)) {
		echo '<strong>' . $message . '</strong>';
	}

?>
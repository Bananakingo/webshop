<?php

// File contains function that connects to localhost database. 
// Returns Connection query when called.
function setConnection() {

	$DB_HOST = 'localhost';
	$DB_NAME = 'avansperiode3';
	$DB_USER = 'root';
	$DB_PASS = '';

	$connection = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	if ($connection == false) {
		printf("Er kan geen verbinding worden gemaakt met de database. Foutmelding: %s\n", mysqli_connect_error());
	} else {
		echo "Verbinding geslaagd";
		echo "<br><br>";
		return $connection;
	}

}

setConnection();

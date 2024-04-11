<?php
// File contains function that connects to localhost database. 
// Returns Connection query when called.
// Contains global variables for connect query

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'avansperiode3';

function setConnection()
{
	global $host, $user, $pass, $db;
	$connection = mysqli_connect($host, $user, $pass, $db) ;

	$status = mysqli_get_links_stats();
	$connectionstat = mysqli_get_connection_stats($connection);

	if ($connection == false) {
		printf("Er kan geen verbinding worden gemaakt met de database. Foutmelding: %s\n", mysqli_connect_error());
	} else {
		// echo "Verbinding geslaagd | status: <br><br> Link status<br>";
		// print lines for debugging.
		// foreach ($status as $x => $y) { "$x: $y <br>"; };
		// print_r($connection) ;
		return $connection;
	}

}

?>
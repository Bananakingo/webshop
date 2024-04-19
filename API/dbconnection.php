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
	// Set connection variabls to global type
	global $host, $user, $pass, $db;
	// Create connection string
	$connection = mysqli_connect($host, $user, $pass, $db) ;

	if ($connection == false) {
		// No connection made; check var type, availability and typos
		printf("Er kan geen verbinding worden gemaakt met de database. Foutmelding: %s\n", mysqli_connect_error());
	} else {
		// Return Connection string when the connection is made succesfully
		return $connection;
	}

}

// gets arguments used in the connection, used for testing
function getConnectionParams()
{
	global $host, $user, $pass, $db;
	// add parameters to array and pass trough return function
	$connectionparams = array('localhost', 'test', 'test123', 'avansperiode3');
	return $connectionparams;
}

?>
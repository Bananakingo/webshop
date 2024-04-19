<?php
include '..\dbconnection.php';

// Set connection
$connection= setConnection(); 

// Taking all values from the form data(input)
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$companyname = $_REQUEST['companyname'];
$straat = $_REQUEST['straat'];
$plaats = $_REQUEST['plaats'];
$postcode = $_REQUEST['postcode'];
$huisnummer = $_REQUEST['huisnummer'];

// Create querystring to insert row into Formulier table
$queryString = 
"INSERT INTO Formulier 
VALUES ('$firstname', '$lastname', '$companyname', '$straat', '$plaats', '$postcode', '$huisnummer')";


// Check if the query is successful
if(mysqli_query($connection, $queryString)){
	echo "<h3>Succesvol aangemeld</h3>";


	echo nl2br("\n$firstname\n $lastname\n "
		. "$companyname\n $straat\n $plaats\n $postcode\n $huisnummer");
} else{
	echo "ERROR: Hush! Sorry $queryString. "
		. mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>

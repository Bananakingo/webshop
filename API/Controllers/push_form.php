<?php

// if ($connection->query($queryString) === TRUE) {
// 	echo "record inserted successfully";
// } else {
// 	echo "Error: " . $queryString . "<br>" . $connection->error;
// }
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'avansperiode3';

$connection= mysqli_connect("localhost", "root", "", "avansperiode3");

// Check connection
if($connection=== false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}

// Taking all values from the form data(input)

$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$companyname = $_REQUEST['companyname'];
$straat = $_REQUEST['straat'];
$plaats = $_REQUEST['plaats'];
$postcode = $_REQUEST['postcode'];
$huisnummer = $_REQUEST['huisnummer'];

// We are going to insert the data into our sampleDB table
$queryString = 
"INSERT INTO Formulier 
VALUES ('$firstname', '$lastname', '$companyname', '$straat', '$plaats', '$postcode', '$huisnummer')";


// Check if the query is successful
if(mysqli_query($connection, $queryString)){
	echo "<h3>data stored in a database successfully."
		. " Please browse your localhost php my admin"
		. " to view the updated data</h3>";

	echo nl2br("\n$firstname\n $lastname\n "
		. "$companyname\n $straat\n $plaats\n $postcode\n $huisnummer");
} else{
	echo "ERROR: Hush! Sorry $queryString. "
		. mysqli_error($connection);
}

// Close connection
mysqli_close($connection);
?>

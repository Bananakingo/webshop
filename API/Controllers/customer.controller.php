<?php
include('API\dbconnection.php');
include('API\datafactory.php');

function getAllCustomers($connection)
{
    // Prepare query string with klantnr passed as variable

    $queryString = "SELECT * FROM klant";

    $result = mysqli_query($connection, $queryString);

    //printRecords($result);

    return $result; 
}


function getCustomer($connection, $customerId)
{
    $queryString = "SELECT * FROM klant WHERE klantnr = $customerId";

    $result = mysqli_query($connection, $queryString);

    //printRecords($result);

    return $result;
}

function createCustomer($connection, $customer)
{
    $naam = $customer[0];
    $adres = $customer[1];
    $postcode = $customer[2];
    $plaats = $customer[3];
    $emailadres = $customer[4];
    $password = $customer[5];
     
    $queryString = "INSERT INTO Klant (klantnr, naam, adres, postcode, plaats, emailadres, password) VALUES ($naam, $adres, $postcode, $plaats, $emailadres, $password)";
}

?>
<?php

function arrayConverter($result) {
    

}

function getAllCustomers($connection)
{
    $queryString = "SELECT * FROM klant";

    $data = mysqli_query($connection, $queryString);
    $result = mysqli_fetch_all($data);
    return $result;
}


function getCustomer($connection, $customerId)
{
    $queryString = "SELECT * FROM klant WHERE klantnr = $customerId";

    $data = mysqli_query($connection, $queryString);
    $result = mysqli_fetch_all($data);
    return $result;
}

function createCustomer($connection, $customer) {
    $queryString = "UPDATE Klant SET voornaam=?, achternaam=?, postcode=?, telefoonnummer=?, straat=?, huisnummer=?, plaats=?, klantType=?, land=?, emailContactpersoon=? WHERE KlantID = ?;";
}

<?php
include('API\dbconnection.php');

// get functions return queried table, create and update functions write to database
// DataFactory does row by row iterations for displaying data and doing needed transformations

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
     
    $queryString = 
    "INSERT INTO Klant (klantnr, naam, adres, postcode, plaats, emailadres, password) 
    VALUES ($naam, $adres, $postcode, $plaats, $emailadres, $password)";
}

function getAllProducts($connection)
{
    // Prepare query string with klantnr passed as variable

    $queryString = 
    "SELECT *, product_afbeelding.image_id 
    FROM product, product_afbeelding 
    WHERE product.productnummer = product_afbeelding.productnummer 
    GROUP BY productnaam ORDER BY productnaam";

    $result = mysqli_query($connection, $queryString);

    //printRecords($result);
    return $result; 
}

function getProduct($connection, $productId)
{
    $queryString = 
    "SELECT
    product.productnummer, 
    product.productnaam, 
    product.prijs, 
    product.beschrijving,
    product.leverbaar, 
    product.voorraad, 
    product_afbeelding.image_id
    FROM product, product_afbeelding
    WHERE product.productnummer = product_afbeelding.productnummer
    AND product.productnummer = $productId
    GROUP BY productnaam
    ORDER BY productnaam";

    $result = mysqli_query($connection, $queryString);

    //printRecords($result);

    return $result;
}

function getImages($connection, $productId)
{

    // Images need an index column to prioritise images if count > 1
    $queryString = 
    "SELECT 
        product.productnummer AS 'product.productnummer', 
        product_afbeelding.productnummer AS 'product_afbeelding.productnummer', 
        afbeelding.image_id AS 'afbeelding.image_id' 
        FROM product 
        INNER JOIN product_afbeelding ON product.productnummer = product_afbeelding.productnummer 
        INNER JOIN afbeelding ON product_afbeelding.image_id = afbeelding.image_id 
        WHERE product.productnummer = $productId; 
    ";

    $result = mysqli_query($connection, $$queryString);

    return $result;

}

// function createCustomer($connection, $customer)
// {
//     $naam = $customer[0];
//     $adres = $customer[1];
//     $postcode = $customer[2];
//     $plaats = $customer[3];
//     $emailadres = $customer[4];
//     $password = $customer[5];
     
//     $queryString = 
//     "INSERT INTO Klant (klantnr, naam, adres, postcode, plaats, emailadres, password) 
//     VALUES ($naam, $adres, $postcode, $plaats, $emailadres, $password)";
// }

function updateInventory($connection, $productId) 
{
    // $queryString = 
    
}

function createTransaction($connection, $transaction) 
{
    // 
}

?>
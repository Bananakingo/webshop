<?php
include 'API\dbconnection.php';

// get functions return queried table, create and update functions write to database
// DataFactory does row by row iterations for displaying data and doing needed transformations
// $queryString contains the prepared query for CRUD actions.
// $result is always the the result returned from the database.
// This is done using mysqli_query, this function requires the connection string and query.
// The connection string has to be passed in the function for security reasons and changebility.
// The result is then returned.

function getAllCustomers($connection)   
{
    // Prepare query string
    // Select all customers
    $queryString = "SELECT * FROM klant";

    $result = mysqli_query($connection, $queryString);

    // Return all customers
    return $result;
}


function getCustomer($connection, $customerId)
{
    // Get a specific customer
    $queryString = "SELECT * FROM klant WHERE klantnr = $customerId";

    $result = mysqli_query($connection, $queryString);

    // Return the specific customer
    return $result;
}

function createCustomer($connection, $customer)
{
    // Assign all values from $customer parameter to local variables 
    $naam = $customer[0];
    $adres = $customer[1];
    $postcode = $customer[2];
    $plaats = $customer[3];
    $emailadres = $customer[4];
    $password = $customer[5];
    $klantnr = $customer[6];

    // Create customer with local variables
    $queryString =
    "INSERT INTO Klant (klantnr, naam, adres, postcode, plaats, emailadres, password) 
    VALUES ($klantnr, $naam, $adres, $postcode, $plaats, $emailadres, $password)";

    // Run query to database with connection argument.
    $result = mysqli_query($connection, $queryString);

    // Return result of created customer
    return $result;
}

function getAllProducts($connection)
{
    // Get all products from database
    $queryString = "SELECT 
    `product`.`productnummer`, 
    `product`.`productnaam`, 
    `product`.`prijs`, 
    `product`.`beschrijving`,
    `product`.`leverbaar`, 
    `product`.`voorraad`, 
    `product_afbeelding`.`image_id`
    FROM `product`, `product_afbeelding`
    WHERE `product`.`productnummer` = `product_afbeelding`.`productnummer`
    GROUP BY `productnaam`
    ORDER BY `productnaam`;";

    // Run query to database with connection argument.
    $result = mysqli_query($connection, $queryString);

    // Return all products
    return $result;
}

function getProduct($connection, $productId)
{

    // Prepare query for getting specific product passed through as an argument
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

    // Run query to database, 
    $result = mysqli_query($connection, $queryString);

    // Return result 
    return $result;
}

function getImages($connection, $image_id)
{

    // Images need an index column to prioritise images if count > 1
    // Get images with image_id, join tables to get all product images related to product.
    $queryString =
        "SELECT 
        product.productnummer AS 'product.productnummer', 
        product_afbeelding.productnummer AS 'product_afbeelding.productnummer', 
        afbeelding.image_id AS 'afbeelding.image_id' 
        FROM product 
        INNER JOIN product_afbeelding ON product.productnummer = product_afbeelding.productnummer 
        INNER JOIN afbeelding ON product_afbeelding.image_id = afbeelding.image_id 
        WHERE product.productnummer = $image_id; 
    ";

    // Run query to database
    $result = mysqli_query($connection, $$queryString);

    // Return result
    return $result;

}

function getTopImage($connection, $productId)
{

    // Get top image related to productId and prepare in query
    $queryString =
        "SELECT 
            product.productnummer AS 'product.productnummer', 
            afbeelding.image AS 'image',
            product_afbeelding.productnummer AS 'product_afbeelding.productnummer', 
            MIN(afbeelding.image_id) AS 'afbeelding.image_id',
            FROM product 
            INNER JOIN product_afbeelding ON product.productnummer = product_afbeelding.productnummer 
            INNER JOIN afbeelding ON product_afbeelding.image_id = afbeelding.image_id 
            WHERE product.productnummer = $productId;";

    // Run query to database
    $result = mysqli_query($connection, $$queryString);

    // Return result
    return $result;
}
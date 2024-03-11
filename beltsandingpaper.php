<?php

include 'api/controllers/customer.controller.php';

// Only give errors
error_reporting(E_ERROR | E_PARSE);

// Set up header page
$page_title = "Bosch Abrasives";
$page_subtitle = "Schuurmiddelen voor elke toepassing";
$active = 1;
 
include 'html/header.html';

getAllCustomers( setConnection() );

getCustomer( setConnection(), 3) ;



?>
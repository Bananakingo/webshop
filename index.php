<?php
include "API\Controllers\customer.controller.php";
include "API\dbconnection.php";

echo getAllCustomers(setConnection());

?>
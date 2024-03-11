<?php

function printRecords($result)
{
    foreach ($x = mysqli_fetch_assoc($result) as $attribute) { echo " | ".$attribute." | " ; }
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $customer = mysqli_fetch_assoc($result);
        echo "<br>";
        foreach ($customer as $attribute) { echo " | ".$attribute." | " ; }
    }
}

?>
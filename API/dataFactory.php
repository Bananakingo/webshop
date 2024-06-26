<?php
// dataFactory gets all rows from the controllers and returns printables or prints the rows directly.
// This gives a readable ETL process

include 'Controllers/controller.php';

// Used as test to print selected records, not in use
function printTestRecords($result)
{
    foreach ($x = mysqli_fetch_assoc($result) as $attribute) {
        echo " | " . $attribute . " | ";
    }
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $customer = mysqli_fetch_assoc($result);
        echo "<br>";
        foreach ($customer as $attribute) {
            echo " | " . $attribute . " | ";
        }
    }
}


function printProducts($products) // Can also print a single product
{
    $result = $products;

    // Print products while there is a product to be printed
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<!-- ---------------------------------- -->\n";
        echo "<div id=\"product\">\n<form action=\"add.php\" method=\"post\">\n";
        echo "<input type=\"hidden\" name=\"productnummer\" value=\"".$row["productnummer"]."\" />\n";
        echo "<div id=\"prijs\">€ ".number_format($row["prijs"], 2, ',', '.')."</div>\n";
        echo "<div id=\"prodnaam\">".$row["productnaam"]."</div>\n";
        echo "<div id=\"beschrijving\">".$row["beschrijving"]."</div>\n";
        echo "<div id=\"leverbaar\">Leverbaar: ".$row["leverbaar"]."</div>\n";
        echo "<div id=\"voorraad\">Voorraad: ".$row["voorraad"]."</div>\n";
        echo "<div id=\"selecteer\">Aantal: <input type=\"text\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" />";
        echo "<input type=\"submit\" value=\"Bestel\" class=\"button\" /></div>\n";
        echo "</form>\n</div>\n";
        mysqli_close(setConnection());
    }
}


?>
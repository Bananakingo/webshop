<?php
include 'API\dataFactory.php';

// Only give errors
error_reporting(E_ERROR | E_PARSE);

// Set up header page
$page_title = "OMNIGRIT";
$page_subtitle = "Schuurmiddelen voor elke toepassing";
$active = 1;
 
include 'header.html';


// Test functions
// getAllCustomers( setConnection() );
// getCustomer( setConnection(), 3) ;



// // Print all products
// //while($row = mysqli_fetch_assoc( getAllProducts( setConnection() ) ) )
// foreach(mysqli_fetch_assoc( getAllProducts( setConnection() ) ) as $row )
// {
// 	echo "<!-- ------------------------------------>\n";
// 	echo "<div id=\"product\">\n<form action=\"add.php\" method=\"post\">\n";
// 	echo "<input type=\"hidden\" name=\"productnummer\" value=\"".$row["productnummer"]."\" />\n";
// 	// echo "<div id=\"prodnummer\">".$row["productnummer"]."</div>\n";

// 	echo '<p><img id=\'plaatje\' src="showfile.php?image_id='.$row["image_id"].'"></p>';
	
// 	echo "<div id=\"prijs\">€ ".number_format($row["prijs"], 2, ',', '.')."</div>\n";
// 	echo "<div id=\"prodnaam\">".$row["productnaam"]."</div>\n";
// 	echo "<div id=\"beschrijving\">".$row["beschrijving"]."</div>\n";
// 	echo "<div id=\"leverbaar\">Leverbaar: ".$row["leverbaar"]."</div>\n";
// 	echo "<div id=\"voorraad\">Voorraad: ".$row["voorraad"]."</div>\n";
// 	echo "<div id=\"selecteer\">Aantal: <input type=\"text\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" />";
// 	echo "<input type=\"submit\" value=\"Bestel\" class=\"button\" /></div>\n";
// 	echo "</form>\n</div>\n";
// 	mysqli_close( setConnection() );
// }

printProducts( getAllProducts( setConnection() ) );

include 'footer.html';

?>
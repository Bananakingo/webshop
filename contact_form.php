<?php


// Only give errors
error_reporting(E_ERROR | E_PARSE);

// Set up header page
$page_title = "Bosch Abrasives";
$page_subtitle = "Meld u aan als test gebruiker";

include 'API\Controllers\controller.php';
include 'header.html';

?> 

<html lang="en">
    <div class="form">
        <!-- <form action="" method="post"> -->
        <!-- <input name="firstname" value=""> -->

        <form action="API\Controllers\push_form.php" method="post">

            <label for="firstname">Voornaam</label> 
            <input type="text" name="firstname" id="firstname">

            <label for="lastname">Achternaam</label> 
            <input type="text" name="lastname" id="lastname">

            <label for="companyname">Bedrijfsnaam</label> 
            <input type="text" name="companyname" id="companyname">

            <label for="straat">Straat</label> 
            <input type="text" name="straat" id="straat">

            <label for="plaats">Plaats</label> 
            <input type="text" name="plaats" id="plaats">

            <label for="postcode">Postcode</label> 
            <input type="text" name="postcode" id="postcode">

            <label for="huisnummer">Huisnummer</label> 
            <input type="number" name="huisnummer" id="huisnummer">

            <input type="submit" value="Verzenden" size="4" id="submit">
            
        </form>
    </div>
</html>

<?php


// echo "<div class=\"p roduct\">\n<form action=\"add.php\" method=\"post\">\n";
// echo "<input type=\"hidden\" name=\"productnummer\" value=\"".$row["productnummer"]."\" />\n";
// // echo "<div id=\"prodnummer\">".$row["productnummer"]."</div>\n";

// echo "<div id=\"prijs\">€ ".number_format($row["prijs"], 2, ',', '.')."</div>\n";
// echo "<div id=\"prodnaam\">".$row["productnaam"]."</div>\n";
// echo "<div id=\"beschrijving\">".$row["beschrijving"]."</div>\n";
// echo "<div id=\"leverbaar\">Leverbaar: ".$row["leverbaar"]."</div>\n";
// echo "<div id=\"voorraad\">Voorraad: ".$row["voorraad"]."</div>\n";
// echo "<div id=\"selecteer\">Aantal: <input type=\"text\" name=\"hoeveelheid\" size=\"2\" maxlength=\"2\" value=\"1\" />";
// echo "<input type=\"submit\" value=\"Bestel\" class=\"button\" /></div>\n";
// echo "</form>\n</div>\n";

?>

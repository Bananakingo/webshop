<?php


// Only give errors
error_reporting(E_ERROR | E_PARSE);

// Set up header page and local variables
$page_title = "OMNIGRIT";
$page_subtitle = "Meld u aan als test gebruiker";

// Include data controllers and html header for page
include 'API\Controllers\controller.php';
include 'header.html';

?>
<html lang="en">
<div class="indexwrapper">
    <div class="index">
        <div class="form">

        <!-- Show form, passes it to push_form when submitted through button -->

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
    </div>
</div>

</html>

<?php

?>
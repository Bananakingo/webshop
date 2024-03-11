<?php
	// Toon de inhoud van je winkelwagen en de naam van de gebruiker linksboven in header.
	echo "<ul id='menu'>\n";
	// Kijk of er iets in de winkelwagen zit
	if (empty($_SESSION['cart'])) {
		echo "<li>Winkelwagen is leeg</li>\n";
	} else {
		// Exploden
		$cart2 = explode("|",$_SESSION['cart']);

		// Tellen inhoud winkelwagen
		$count = count($cart2);
		if ($count == 1) {
			echo "<li>1 product ";
		} else {
			echo "<li>".$count." producten ";
		}
		echo "in <a href=\"cart.php\">winkelwagen</a></li>\n";

	}
	if (empty($_SESSION['klantnr'])) {
		echo "<li>U bent niet ingelogd | <a href=\"login.php\">login</a></li>\n";
	} else {
		echo "<li>Welkom <a href=\"account.php\">".$_SESSION['klantnaam']."</a> | <a href=\"javascript:logOut()\">logout</a></li>\n";
	}
	echo("</ul>");
	if (!isset($active)) $active = 0;
?>
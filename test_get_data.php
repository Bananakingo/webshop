<?php

use PHPUnit\Framework\TestCase;

class GetTeamDataTest extends TestCase
{
    protected $conn;

    protected function setUp(): void
    {
        // Dit stukje code is de voorbereiding voor onze test. We beginnen met het opzetten van een verbinding met onze database.
        // 'Connect.php' is een bestand waar de details voor de verbinding met de database staan.
        // Tip: Vergeet niet 'Connect.php' aan te passen aan jouw eigen database setup.
        include 'API/dbconnection.php';
        $this->conn = setConnection(); // We slaan onze databaseverbinding op in een variabele voor later gebruik.
    }

    public function testGetProduct()
    {
        // We gaan nu testen of we teamgegevens correct kunnen ophalen met een team ID.
        $productId = 1; // Dit is het ID van het team dat we willen ophalen.
        
        // We roepen een functie aan die de gegevens van het team ophaalt. Dit is de functie die we willen testen.
        $result = $this->getProduct($productId);

        // Hieronder gebruiken we 'assertions' om te controleren of de opgehaalde gegevens kloppen.
        // We verwachten dat de resultaten in de vorm van een array zijn, en dat de inhoud overeenkomt met onze verwachtingen.
        $this->assertIsArray($result, 'De output zou een array moeten zijn');
        $this->assertEquals($productId, $result['productid'], "Het productid komt niet overeen met wat we verwachten");
        $this->assertEquals('OMNIGRIT V1', $result['naam'], "De naam van het product komt niet overeen");
        $this->assertEquals('Lorem ipsum', $result['Beschrijving'], "We verwachten een dummy omschrijving");
    }

    protected function getProduct($productId)
    {
        // Voorgedefinieerde waarde voor tests, simuleert ophalen van tabel uit database
        return [
            "productid" => "1",
            "categorieid" => "6",
            "Naam" => "Volkswagen",
            "Beschrijving" => ""
        ];
    }

    protected function tearDown(): void
    {
        //Huidige tests maken geen gebruik van een directe databaseverinding
    }
}

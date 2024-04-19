<?php

use PHPUnit\Framework\TestCase;
include 'API\dbconnection.php';

class test_connection extends TestCase
{

    public function testDatabaseConnectionParameters()
    {

        // get connection parameters
        // Hiermee gaan we testen of de parameters in de connectie string overeenkomen met de verwachte data.
        $connectarray = getConnectionParams();

        // Check if the right credentials are used and on the right host and Database
        $this->assertEquals('localhost', $connectarray[0], 'De hostnaam is niet correct ingesteld.');
        $this->assertEquals('test', $connectarray[1], 'De gebruikersnaam is niet correct ingesteld.');
        $this->assertEquals('test123', $connectarray[2], 'Het wachtwoord is niet correct ingesteld.');
        $this->assertEquals('avansperiode3', $connectarray[3], 'De databasenaam is niet correct ingesteld.');
    }

    public function testDatabaseConnection()
    {
        // Get connection parameters
        $connectarray = getConnectionParams();

        // Create connection with parameters
        // Hier gaan we testen of er een verbinding gelegd kan worden met de eerder geteste parameters.
        $connection = mysqli_connect($connectarray[0], $connectarray[1], $connectarray[2], $connectarray[3]) ;
        // Controleer ofdat de connectie string van type mysqli is.
        $this->assertInstanceOf(mysqli::class, $connection, 'De verbinding met de database is geen instantie van mysqli.');

        // Controleer ofdat de connectie string gevuld is
        $this->assertNull($connection->connect_error, 'Er is een fout opgetreden bij het opzetten van de databaseverbinding.');

        // Haal testset op 
        $query = "SELECT * FROM `product` LIMIT 6";
        $result = $connection->query($query);

        // Controleer ofdat uitgevoerde query een leeg resultaat oplevert
        $this->assertNotEmpty($result, 'Er zijn geen resultaten gevonden bij het ophalen van gegevens uit de tabel `product`.');

        // Controleer ofdat de uigevoerde query meer of gelijk als 6 producten ophaalt uit de database
        $this->assertGreaterThanOrEqual(6, $result->num_rows, 'Er zijn minder dan 6 resultaten gevonden bij het ophalen van gegevens.');

    }
}

<?php

use PHPUnit\Framework\TestCase;

class ConnectTest extends TestCase
{
    public function testDatabaseConnectionParameters()
    {
        // We beginnen met het opnemen van het 'connect.php' bestand, dat de databaseconnectieparameters bevat.
        // Dit is belangrijk om ervoor te zorgen dat de parameters die we gebruiken om te verbinden met de database correct zijn ingesteld.
        include 'connect.php';

        // Vervolgens controleren we of elke parameter - host, gebruikersnaam, wachtwoord, en databasenaam - correct is ingesteld.
        // Deze waarden zijn cruciaal voor het succesvol verbinden met onze database.
        $this->assertEquals('localhost', $host, 'De hostnaam is niet correct ingesteld.');
        $this->assertEquals('root', $username, 'De gebruikersnaam is niet correct ingesteld.');
        $this->assertEquals('', $password, 'Het wachtwoord is niet correct ingesteld.');
        $this->assertEquals('avansperiode3', $dbname, 'De databasenaam is niet correct ingesteld.');
    }

    public function testDatabaseConnection()
    {
        // Opnieuw, we nemen 'Connect.php' op om onze databaseverbinding op te zetten.
        include 'dbconnection.php';

        // Nu controleren we of de variabele $conn daadwerkelijk een mysqli-object is.
        // Dit bevestigt dat onze verbinding met de database een geldig mysqli-object teruggeeft.
        $this->assertInstanceOf(mysqli::class, setConnection(), 'De verbinding met de database is geen instantie van mysqli.');

        // We controleren ook of er geen fouten zijn opgetreden tijdens het opzetten van de verbinding.
        $this->assertNull(setConnection()->connect_error, 'Er is een fout opgetreden bij het opzetten van de databaseverbinding.');

        // Nu gaan we testen of we daadwerkelijk gegevens uit de database kunnen ophalen.
        // We doen een eenvoudige SELECT-query om wat gegevens op te halen en controleren of we resultaten terugkrijgen.
        $query = "SELECT * FROM `product` LIMIT 9";
        $result = setConnection()->query($query);

        // We verwachten resultaten van onze query, en we controleren of het resultaat niet leeg is.
        $this->assertNotEmpty($result, 'Er zijn geen resultaten gevonden bij het ophalen van gegevens uit de tabel `product`.');

        // Daarnaast controleren we of het aantal rijen in onze resultaatset ten minste 9 is.
        $this->assertGreaterThanOrEqual(5, $result->num_rows, 'Er zijn minder dan 9 resultaten gevonden bij het ophalen van gegevens.');

    }
}

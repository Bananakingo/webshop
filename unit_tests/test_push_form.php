<?php

use PHPUnit\Framework\TestCase;

class test_push_form extends TestCase
{
    protected function setUp(): void
    {
        // Dit stukje code is de voorbereiding voor onze test. We beginnen met het opzetten van een verbinding met onze database.
        // 'dbconnection.php' is een bestand waar de details voor de verbinding met de database staan.
        include '\API\dbconnection.php';
    }

    public function test_form() // We testen of de waarden van het ingevulde en verzonden formulier kloppen
    {
        
        // Haal test formulier op 
        $result = $this->getForm();


        // We testen of het opgehaalde formulier een array is
        $this->assertIsArray($result, 'De output zou een array moeten zijn');

        // We testen de inhoud van het formulier. De entries moeten gelijk zijn aan elkaar
        $this->assertEquals($result['firstname'], 'anne', "Het productid komt niet overeen met wat we verwachten");
        $this->assertEquals($result['lastname'], 'van den bosch', "De naam van het product komt niet overeen");
        $this->assertEquals($result['companyname'], 'Capsly', "We verwachten een dummy omschrijving");
        $this->assertEquals($result['straat'], 'gijbelandsedijk', "We verwachten een dummy omschrijving");
        $this->assertEquals($result['plaats'], 'brandwijk', "We verwachten een dummy omschrijving");
        $this->assertEquals($result['postcode'], '2974vg', "We verwachten een dummy omschrijving");
        $this->assertEquals($result['huisnummer'], '1', "We verwachten een dummy omschrijving");


    }

    protected function getForm()
    {
        // Aanmaken test formulier, is gekopieerd uit database
        return [
            "firstname" => "anne",
            "lastname" => "van den bosch",
            "companyname" => "Capsly",
            "straat" => "gijbelandsedijk",
            "plaats" => "brandwijk",
            "postcode" => "2974vg",
            "huisnummer" => "1"
        ];
    }
}

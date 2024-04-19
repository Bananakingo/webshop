<?php

use PHPUnit\Framework\TestCase;

class test_get_data extends TestCase
{
    public function testGetProduct()
    {
        // Product Id dat wordt gebruikt om te testen 
        $productId = 111; 
        
        // We halen een het product op en hangen het aan $result
        $result = $this->getProduct($productId);

        // Het opgehaalde product in result wordt getest op het zijn van een array
        // In de volgende 3 stappen testen we het op de data die het bevat
        // Het moet gelijk zijn aan de data in de functie GetProduct()
        $this->assertIsArray($result, 'De output zou een array moeten zijn');
        $this->assertEquals($productId, $result['productid'], "Het productid komt niet overeen met wat we verwachten");
        $this->assertEquals('OMNIGRIT V1', $result['naam'], "De naam van het product komt niet overeen");
        $this->assertEquals('Lorem ipsum', $result['beschrijving'], "We verwachten een dummy omschrijving");
    }

    protected function getProduct($productId)
    {
        // Het testproduct wordt hier gedeclareerd
        // Dit is op te halen door de functie getProduct() te noemen
        return [
            "productid" => "111",
            "leverbaar" => "ja",
            "voorraad" => "12",
            "Beschrijving" => "Lorem ipsum"
        ];
    }
}

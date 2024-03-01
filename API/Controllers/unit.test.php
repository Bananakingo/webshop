<?php


function testData($result)
{
    while ($record = mysqli_fetch_assoc($result)) {

        //Eventueel testen wat de inhoud is van $record
        print_r($record);
        echo $record["Customernumber"] . ", " .
            $record["Customername"];
        echo "<br>";
    }
    //Afdrukken aantal records in resultaat
    echo "<br>";
    echo "Aantal records: " . mysqli_num_rows($result);
    echo "<br><br>";
}
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $gebruikersnaam = $_POST["gebruikersnaam"];
    $wachtwoord = $_POST["wachtwoord"];
    $email = $_POST["e-mail"];
    // controleer lege gebruikersnaam of wachtwoord veld
    if(empty($gebruikersnaam)){
        echo "Vul een gebruikersnaam in";
    }
    elseif(empty($wachtwoord)){
        echo "Vul een wachtwoord in";
    }
    //controleer op een geldig mail adres
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo("$email is geen geldig e-mailadres");
    } 
    //controleer leeg mail veld
    elseif(empty($email)){
        echo "Vul een e-mail adres in";
    }
    //Als alles klopt dan voeg de gegevens toe aan de DBS
    else{
        $sql = "INSERT INTO klant (gebruikersnaam, wachtwoord, emailadres) VALUES ('$gebruikersnaam', '$wachtwoord', '$email')";
        //Vang foutmeldingen af met try op dubbele ingevoerde gebruikersnamen
        try{
            mysqli_query($conn, $sql);
            echo "Je bent geregistreerd!</br>";
            echo "Log" . "<a href='loginpagina.php'> HIER </a>" . "in om verder te gaan";
        }
        catch(mysqli_sql_exception){
            echo"Deze gebruikersnaam: $gebruikersnaam bestaat al";
        }
        
    }
    
}
//variabelen om de leden te tellen in de DBS
$sql2 = "SELECT Gebruikersnaam FROM klant; ";
$result = mysqli_query($conn, $sql2);
$gebruiker = mysqli_fetch_array($result, MYSQLI_ASSOC);
$uitkomst = 0;
//Tel het aantal leden op de DBS
foreach ($result as $gebruiker) {
    $aantal = count($gebruiker);
    $uitkomst = $uitkomst + 1;
}
echo "<br><br>Er zijn al " . $uitkomst . " leden die je voor zijn gegaan!";

?>
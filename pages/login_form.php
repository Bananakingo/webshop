
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <title>Registratieformulier</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2>Welkom bij RBCP</h2>
        Gebruikersnaam:<br>
        <input type="tekst" name="gebruikersnaam"><br>
        Wachtwoord:<br>
        <input type="password" name="wachtwoord"><br>
        E-mail:<br>
        <input type="tekst" name="e-mail"><br>
        <input type="submit" name="submit" value="registreer">
    </form>
</body>

<?php

include '../General/nav.php';
include '../General/footer.php';
require_once '../DB/db_connectie.php';

session_start(); // Start de sessie 

$melding = ''; // Lege variabele aanmaken voor evt plek van een error bericht

if (isset($_POST['inloggen'])) {
    // Lees de input van het login formulier
    $balienummer = $_POST['balienummer'];
    $wachtwoord = $_POST['wachtwoord'];

    // Debugging output
    error_log("Balienummer: " . $balienummer);
    error_log("Wachtwoord: " . $wachtwoord);

    // Controlleer de data
    // Haal wachtwoord op van db
    $db = maakVerbinding(); // verbind met db
    if (!$db) {
        error_log("Database verbinding mislukt");
        $melding = 'Database verbinding mislukt!';
    } else {
        $sql = 'SELECT wachtwoord FROM Balie WHERE Balienummer = :balienummer'; // locatie van inloggegevens
        $query = $db->prepare($sql);

        $data_array = [
            ':balienummer' => $balienummer
        ];

        if (!$query->execute($data_array)) {
            error_log("Query mislukt: " . implode(":", $query->errorInfo()));
            $melding = 'Query mislukt!';
        } else {
            if ($rij = $query->fetch()) {
                // Gebruiker is gevonden
                $passwordhash = $rij['wachtwoord'];
                error_log("Password hash: " . $passwordhash);

                // Verifieer password
                if (password_verify($wachtwoord, $passwordhash)) {
                    $_SESSION['gebruiker'] = $balienummer;
                    header('location: medewerker.php'); // Brengt je naar de correcte pagina, in dit geval medewerker.php
                    exit(); // Zorg ervoor dat de rest van de script niet uitgevoerd wordt
                } else {
                    error_log("Wachtwoord verificatie mislukt");
                    $melding = 'Fout: Onjuiste inloggegevens!';
                }
            } else {
                error_log("Gebruiker niet gevonden");
                $melding = 'Onjuiste inloggegevens';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/nav-header.css">  
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/forms.css">
  <title>GelreAirport: Bereik meer!</title>
</head>

<body>

<?php
displayNav();
?>

  <!-- Pagina header/welkomst text -->
  <main>
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220"/>
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Login voor Gelre Checkin! </p>
    </div>
  </section>

  <!-- Inlog box -->
  <section class="inlog-sectie">
  <div class="inlog-formulier">
    <h2>Login</h2>
    <form method="post" action="">
      <label for="balienummer">Gebruikersnaam:</label>
      <input type="text" id="balienummer" name="balienummer" required>

      <label for="wachtwoord">Wachtwoord:</label>
      <input type="wachtwoord" id="wachtwoord" name="wachtwoord" required>

      <button type="submit">Inloggen</button>
    </form>
    <?=$melding?>
  </div>
</section>

<!-- Footer onderaan pagina -->
<?php
 displayFooter();
      ?>
</main>
</body>

</html>

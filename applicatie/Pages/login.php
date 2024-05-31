<?php
require_once '../DB/db_connectie.php';


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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="../Styles/main.css">
    <title>GelreAirport</title>
</head>

<body>
<!-- Navigatie balk -->
<?php include '../General/nav.php';?>

<main>
<!-- Pagina header(column1), en welkomst text(column2) -->

<?php include '../General/header.php';?>


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
include '../General/footer.php';
?>
</main>
</body>

</html>

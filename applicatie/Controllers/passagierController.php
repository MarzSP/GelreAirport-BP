<?php
/* Code is veilig gemaakt door middel van: Filter_input, santize input, prepared statements, htmlspecialchars ren PDO::data-type */
include '../DB/db_connectie.php';

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

try {
  $data = $verbinding;
  $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Functie om de eerste volgende passagiersummer te gebruiken
  function getNextPassagiernummer($db) {
    $sql = "SELECT MAX(Passagiernummr) + 1 AS next_nummer FROM Passagier";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['next_nummer'] ?? 1; 
  }

  // Gebruik het eerst volgende passagiernummer
  $passagiernummer = getNextPassagiernummer($data);

  // Haal data uit POST van formulier
  $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
  $vluchtnummer = filter_input(INPUT_POST, 'vluchtnummer', FILTER_SANITIZE_NUMBER_INT);
  $geslacht = filter_input(INPUT_POST, 'geslacht', FILTER_SANITIZE_STRING);
  $balienummer = filter_input(INPUT_POST, 'balienummer', FILTER_SANITIZE_NUMBER_INT); // Balienummer is optioneel
  $stoel = filter_input(INPUT_POST, 'stoel', FILTER_SANITIZE_STRING); // Stoel is optioneel
  $incheckstijdstip = filter_input(INPUT_POST, 'incheckstijdstip', FILTER_SANITIZE_STRING); // Incheckstijdstip is optioneel
  $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Hash password for security


  // Prepare SQL statement
  $sql = "INSERT INTO Passagier (Passagiernummr, naam, vluchtnummer, Geslacht, balienummer, stoel, incheckstijdstip, wachtwoord)
          VALUES (:passagiernummer, :naam, :vluchtnummer, :geslacht, :balienummer, :stoel, :incheckstijdstip, :wachtwoord)";
  $stmt = $data->prepare($sql);

  // Bind parameters met formulier data
  $stmt->bindParam(':passagiernummer', $passagiernummer, PDO::PARAM_INT);
  $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
  $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
  $stmt->bindParam(':geslacht', $geslacht, PDO::PARAM_STR);
  $stmt->bindParam(':balienummer', $balienummer, PDO::PARAM_INT);
  $stmt->bindParam(':stoel', $stoel, PDO::PARAM_STR);
  $stmt->bindParam(':incheckstijdstip', $incheckstijdstip, PDO::PARAM_STR);
  $stmt->bindParam(':wachtwoord', $wachtwoord, PDO::PARAM_STR);

  // Execute the prepared statement
  if ($stmt->execute()) {
    echo "Nieuwe passagier toegevoegd! Passagiernummer: " . htmlspecialchars($passagiernummer, ENT_QUOTES, 'UTF-8');
  } else {
    echo "Error adding passenger.";
  }
} catch(PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}

?>

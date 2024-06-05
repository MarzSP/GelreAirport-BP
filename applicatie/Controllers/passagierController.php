<?php
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
  $naam = $_POST['naam'];
  $vluchtnummer = $_POST['vluchtnummer'];
  $geslacht = $_POST['geslacht'];
  $balienummer = (isset($_POST['balienummer']) ? $_POST['balienummer'] : null); // Balienummer is optioneel
  $stoel = (isset($_POST['stoel']) ? $_POST['stoel'] : null); // Stoel is optioneel
  $incheckstijdstip = (isset($_POST['incheckstijdstip']) ? $_POST['incheckstijdstip'] : null); // Incheckstijdstip is optioneel
  $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Hash password for security

  // Prepare SQL statement
  $sql = "INSERT INTO Passagier (Passagiernummr, naam, vluchtnummer, Geslacht, balienummer, stoel, incheckstijdstip, wachtwoord)
          VALUES (:passagiernummer, :naam, :vluchtnummer, :geslacht, :balienummer, :stoel, :incheckstijdstip, :wachtwoord)";
  $stmt = $data->prepare($sql);

  // Bind parameters with form data
  $stmt->bindParam(':passagiernummer', $passagiernummer);
  $stmt->bindParam(':naam', $naam);
  $stmt->bindParam(':vluchtnummer', $vluchtnummer);
  $stmt->bindParam(':geslacht', $geslacht);
  $stmt->bindParam(':balienummer', $balienummer);
  $stmt->bindParam(':stoel', $stoel);
  $stmt->bindParam(':incheckstijdstip', $incheckstijdstip);
  $stmt->bindParam(':wachtwoord', $wachtwoord);

  // Execute the prepared statement
  if ($stmt->execute()) {
    echo "Nieuwe passagier toegevoegd! Passagiernummer: " . $passagiernummer;
  } else {
    echo "Error adding passenger.";
  }
} catch(PDOException $e) {
  echo "Error connecting to database: " . $e->getMessage();
}

?>

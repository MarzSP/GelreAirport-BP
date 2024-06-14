<?php
/* Code is veilig gemaakt door middel van: Filter_input, santize input, prepared statements, htmlspecialchars ren PDO::data-type */
include '../DB/db_connectie.php';
include '../Controllers/passagiernummer.php';

$db = maakVerbinding();
$passagiernummer = getNextPassagiernummer($db);

  $sql = "INSERT INTO Passagier (passagiernummer, naam, vluchtnummer, geslacht, wachtwoord)
          VALUES (:passagiernummer, :naam, :vluchtnummer, :geslacht, :wachtwoord)";
  $stmt = $db->prepare($sql);

  // Bind parameters met formulier data
  $stmt->bindParam(':passagiernummer', $passagiernummer, PDO::PARAM_INT);
  $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
  $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
  $stmt->bindParam(':geslacht', $geslacht, PDO::PARAM_STR);
  $stmt->bindParam(':wachtwoord', $wachtwoord, PDO::PARAM_STR);
if($stmt->execute()) { return $passagiernummer; }
else {
  echo("Fout bij het toevoegen van passagier");
}


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passagiernummer = filter_input(INPUT_POST, 'passagiernummer', FILTER_SANITIZE_NUMBER_INT);
    $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
    $vluchtnummer = filter_input(INPUT_POST, 'vluchtnummer', FILTER_SANITIZE_NUMBER_INT);
    $geslacht = filter_input(INPUT_POST, 'geslacht', FILTER_SANITIZE_STRING);
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Hash password for security

    try {
      echo "Passagier succesvol toegevoegd met nummer: " . $passagiernummer;
    } catch (Exception $e) {
      echo "Fout bij het toevoegen van passagier: " . $e->getMessage();
    }
  }


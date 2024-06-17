<?php
/* Code is veilig gemaakt door middel van: Filter_input, santize input, prepared statements, htmlspecialchars ren PDO::data-type */
include '../DB/db_connectie.php';
include '../Controllers/passagiernummer.php';


  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passagiernummer = htmlspecialchars($_POST['passagiernummer'], ENT_QUOTES, 'UTF-8');
    $naam = htmlspecialchars($_POST['naam'], ENT_QUOTES, 'UTF-8');
    $vluchtnummer = htmlspecialchars($_POST['vluchtnummer'], ENT_QUOTES, 'UTF-8');
    $geslacht = htmlspecialchars($_POST['geslacht'], ENT_QUOTES, 'UTF-8');
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); // Hash password for security
    try {
      echo "Passagier succesvol toegevoegd met nummer: " . $passagiernummer;
    } catch (Exception $e) {
      echo "Fout bij het toevoegen van passagier: " . $e->getMessage();
    }
  }
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
  

<?php
declare(strict_types=1);

include_once 'db_connectie.php';
function getPassagier($gebruikersnaam) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT passagiernummer, wachtwoord FROM Passagier WHERE passagiernummer = :gebruikersnaam');
        $query->execute([':gebruikersnaam' => $gebruikersnaam]);
        return $query->fetch();
    }
    
    function getMedewerker($balienummer) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT balienummer, wachtwoord FROM Balie WHERE balienummer = :gebruikersnaam');
        $query->execute([':gebruikersnaam' => $balienummer]);
        return $query->fetch();
    }

// Voeg een nieuwe passagier toe
if (isset($_POST['submit'])) {
  $passagiernummer = $_POST['passagiernummer'];
  $naam = $_POST['naam'];
  $vluchtnummer = $_POST['vluchtnummer'];
  $geslacht = $_POST['geslacht'];
  $balienummer = $_POST['balienummer'];
  $incheckstijdstip = $_POST['inchecktijdstip'];
  $wachtwoord = $_POST['wachtwoord'];

  $gebruiker = new Passagier($naam, $wachtwoord);

  // Gebruik prepared statements om SQL-injectie te voorkomen
  $query = $verbinding->prepare("INSERT INTO Passagier (naam, vluchtnummer, geslacht, balienummer, inchecktijdstip, wachtwoord) VALUES (?, ?, ?, ?, ?, ?)");
  $hash = password_hash($gebruiker->wachtwoord, PASSWORD_DEFAULT);

  try {
      $query->execute([$gevalideerdeNaam, $hash]);
      return true;
  } catch (PDOException $ex) {
      throw new Exception($ex->getMessage());
      return false;
  }
}

  // Probeer de gebruiker te creëren
  if (createUser($gebruiker)) {
      // Gebruiker succesvol gecreëerd
      echo "<p>Gebruiker succesvol gecreëerd!</p>";
  } else {
      // Fout bij het creëren van gebruiker
      echo "<p>Er is een fout opgetreden bij het creëren van de gebruiker.</p>";
  }

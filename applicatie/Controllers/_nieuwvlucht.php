<?php
global $verbinding, $verbinding;
require_once '../DB/db_connectie.php';

if (isset($_POST['submit'])) {
    $vluchtnummer = htmlspecialchars($_POST['vluchtnummer'], ENT_QUOTES, 'UTF-8');
    $bestemming = htmlspecialchars($_POST['bestemming'], ENT_QUOTES, 'UTF-8');
    $max_aantal = htmlspecialchars($_POST['max_aantal'], ENT_QUOTES, 'UTF-8');
    $max_gewicht_pp = htmlspecialchars($_POST['max_gewicht_pp'], ENT_QUOTES, 'UTF-8');
    $max_totaalgewicht = htmlspecialchars($_POST['max_totaalgewicht'], ENT_QUOTES, 'UTF-8');
    $vertrektijd = $_POST['vertrektijd'];
    $maatschappijcode = htmlspecialchars($_POST['maatschappijcode'], ENT_QUOTES, 'UTF-8');


    $format = "Y-M-D H:i:s.u"; // Format in DB
    $dateTimeObject = DateTime::createFromFormat($format, $vertrektijd);

    $vluchtnummer = intval($vluchtnummer);
    $max_aantal = intval($max_aantal);
    $max_gewicht_pp = floatval($max_gewicht_pp);
    $max_totaalgewicht = floatval($max_totaalgewicht);

    if ($max_aantal < 0 || $max_aantal > 999) {
        header('Location: ../Views/nieuwvlucht.php?foutmelding=Maximaal aantal passagiers moet tussen 0 en 999 liggen.');
        exit;
    }

    $db = maakVerbinding();

    // Prepare SQL statement
    $sql = "INSERT INTO Vlucht (vluchtnummer, bestemming, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode)
                VALUES (:vluchtnummer, :bestemming, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode)";
    $stmt = $db->prepare($sql);


    // Bind parameters with correct types
    $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
    $stmt->bindParam(':bestemming', $bestemming);
    $stmt->bindParam(':max_aantal', $max_aantal, PDO::PARAM_INT);
    $stmt->bindParam(':max_gewicht_pp', $max_gewicht_pp);
    $stmt->bindParam(':max_totaalgewicht', $max_totaalgewicht);
    $stmt->bindParam(':vertrektijd', $dateTimeObject);
    $stmt->bindParam(':maatschappijcode', $maatschappijcode);

    // Execute the query and check for success
    try {
        $stmt->execute();
        header('Location: ../Views/nieuwvlucht.php?succesmelding=Vlucht+succesvol+toegevoegd.');
        exit;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            header('Location: ../Views/nieuwvlucht.php?foutmelding=Vluchtnummer al in gebruik. Kies een ander vluchtnummer.');
            $_SESSION['foutmelding'] = "Vlucht met vluchtnummer $vluchtnummer kan niet worden toegevoegd omdat dit vluchtnummer al in gebruik is. Kies een andere.";
        } else {
            header('Location: ../Views/nieuwvlucht.php?foutmelding=Vlucht+kon+niet+worden+toegevoegd.');
            throw $e;
        }
    }
}


try {
    $data = maakVerbinding();
    $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

    function getDestinations($db) {
      $sql = "SELECT bestemming FROM Vlucht";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  

    function getMaatschappijCodes($db) {
      $sql = "SELECT maatschappijcode FROM Maatschappij";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    // Roep functies aan en sla resultaten op
    $bestemmingen = getDestinations($data);
    $maatschappijcodes = getMaatschappijCodes($data);
  } catch(PDOException $e) {
    echo "Error fetching options: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    $bestemmingen = [];
    $maatschappijcodes = [];
  }

<?php
require_once '../DB/db_connectie.php';

if (isset($_POST['submit'])) {
    $vluchtnummer = htmlspecialchars($_POST['vluchtnummer'], ENT_QUOTES, 'UTF-8');
    $bestemming = htmlspecialchars($_POST['bestemming'], ENT_QUOTES, 'UTF-8');
    $max_aantal = htmlspecialchars($_POST['max_aantal'], ENT_QUOTES, 'UTF-8');
    $max_gewicht_pp = htmlspecialchars($_POST['max_gewicht_pp'], ENT_QUOTES, 'UTF-8');
    $max_totaalgewicht = htmlspecialchars($_POST['max_totaalgewicht'], ENT_QUOTES, 'UTF-8');
    $vertrektijd = htmlspecialchars($_POST['vertrektijd'], ENT_QUOTES, 'UTF-8');
    $maatschappijcode = htmlspecialchars($_POST['maatschappijcode'], ENT_QUOTES, 'UTF-8');
   

    // Validate and format $vertrektijd
    try {
      // Use DateTime::createFromFormat to explicitly parse the input
      $dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $vertrektijd);
      if (!$dateTime) {
          // Handle different formats or add more error handling if necessary
          echo "Voer een geldige datum en tijd in (expected format: Y-m-d H:i:s).";
          exit();
      }
      $vertrektijdFormatted = $dateTime->format('Y-m-d H:i:s');
  } catch (Exception $e) {
      echo "Voer een geldige datum en tijd in.";
      exit();
  }

    // Convert numeric fields to correct format
    $vluchtnummer = intval($vluchtnummer);
    $max_aantal = intval($max_aantal);
    $max_gewicht_pp = floatval($max_gewicht_pp);
    $max_totaalgewicht = floatval($max_totaalgewicht);

    try {
        $db = maakVerbinding();

        // Prepare SQL statement
        $sql = "INSERT INTO Vlucht (vluchtnummer, bestemming, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode)
                VALUES (:vluchtnummer, :bestemming, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode)";
        $stmt = $db->prepare($sql);
        
    // Convert numeric fields to correct format
    $vluchtnummer = intval($vluchtnummer);
    $max_aantal = intval($max_aantal);
    $max_gewicht_pp = floatval($max_gewicht_pp);
    $max_totaalgewicht = floatval($max_totaalgewicht);


        // Bind parameters with correct types
        $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
        $stmt->bindParam(':bestemming', $bestemming, PDO::PARAM_STR);
        $stmt->bindParam(':max_aantal', $max_aantal, PDO::PARAM_INT);
        $stmt->bindParam(':max_gewicht_pp', $max_gewicht_pp, PDO::PARAM_STR);  
        $stmt->bindParam(':max_totaalgewicht', $max_totaalgewicht, PDO::PARAM_STR);  
        $stmt->bindParam(':vertrektijd', $vertrektijdFormatted, PDO::PARAM_STR);
        $stmt->bindParam(':maatschappijcode', $maatschappijcode, PDO::PARAM_STR);

        // Execute the query and check for success
        if ($stmt->execute()) {
            echo "Vlucht succesvol toegevoegd.";
        } else {
            echo "Error: Vlucht niet toegevoegd.";
        }
    } catch (PDOException $e) {
        // Log error internally
        error_log("Database error: " . $e->getMessage());
        echo "Er is een fout opgetreden bij het toevoegen van de vlucht. Probeer het later opnieuw.";
    }
} else {
    echo "Gebruik het formulier om een vlucht toe te voegen.";
}





try {
    $data = $verbinding; 
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

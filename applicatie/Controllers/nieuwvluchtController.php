<?php
/* Code is veilig gemaakt door middel van: filter_input, santized input, prepared statements, PDO params, en htmlspecialchars */
include '../DB/db_connectie.php';

if(isset($_POST['submit'])){
  $vluchtnummer = filter_input(INPUT_POST, 'vluchtnummer', FILTER_SANITIZE_STRING);
  $bestemming = filter_input(INPUT_POST, 'bestemming', FILTER_SANITIZE_STRING);
  $max_aantal = filter_input(INPUT_POST, 'max_aantal', FILTER_SANITIZE_NUMBER_INT);
  $max_gewicht_pp = filter_input(INPUT_POST, 'max_gewicht_pp', FILTER_SANITIZE_NUMBER_FLOAT);
  $max_totaalgewicht = filter_input(INPUT_POST, 'max_totaalgewicht', FILTER_SANITIZE_NUMBER_FLOAT);
  $vertrektijd = filter_input(INPUT_POST, 'vertrektijd', FILTER_SANITIZE_STRING);
  $maatschappijcode = filter_input(INPUT_POST, 'maatschappijcode', FILTER_SANITIZE_STRING);

    // Prepare SQL statement
 $sql = "INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode)
VALUES (:vluchtnummer, :bestemming, NULL, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode)";


$stmt = $verbinding->prepare($sql);

// Bind parameters met formulier data
$stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_STR);
$stmt->bindParam(':bestemming', $bestemming, PDO::PARAM_STR);
$stmt->bindParam(':max_aantal', $max_aantal, PDO::PARAM_INT);
$stmt->bindParam(':max_gewicht_pp', $max_gewicht_pp, PDO::PARAM_STR);
$stmt->bindParam(':max_totaalgewicht', $max_totaalgewicht, PDO::PARAM_STR);
$stmt->bindParam(':vertrektijd', $vertrektijd, PDO::PARAM_STR);
$stmt->bindParam(':maatschappijcode', $maatschappijcode, PDO::PARAM_STR);
} else {
echo "Error: Vlucht niet toegevoegd.";
}




try {
    $data = $verbinding; 
    $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // Function to get destinations
    function getDestinations($db) {
      $sql = "SELECT bestemming FROM Vlucht";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    // Function to get maatschappijcodes
    function getMaatschappijCodes($db) {
      $sql = "SELECT maatschappijcode FROM Maatschappij";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    // Call functions and store results
    $bestemmingen = getDestinations($data);
    $maatschappijcodes = getMaatschappijCodes($data);
  } catch(PDOException $e) {
    echo "Error fetching options: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
    $bestemmingen = [];
    $maatschappijcodes = [];
  }

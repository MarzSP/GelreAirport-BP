<?php
// Include the database connection
include '../DB/db_connectie.php';

if(isset($_POST['submit'])){
    $vluchtnummer = $_POST['vluchtnummer'];
    $bestemming = $_POST['bestemming'];
    $max_aantal = $_POST['max_aantal'];
    $max_gewicht_pp = $_POST['max_gewicht_pp'];
    $max_totaalgewicht = $_POST['max_totaalgewicht'];
    $vertrektijd = $_POST['vertrektijd'];

    // Prepare SQL statement
$sql = "INSERT INTO Vlucht (vluchtnummer, bestemming, gatecode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode)
VALUES (:vluchtnummer, :bestemming, NULL, :max_aantal, :max_gewicht_pp, :max_totaalgewicht, :vertrektijd, :maatschappijcode)";

$stmt = $verbinding->prepare($sql);

// Bind parameters with form data
$stmt->bindParam(':vluchtnummer', $vluchtnummer);
$stmt->bindParam(':bestemming', $bestemming);
$stmt->bindParam(':max_aantal', $max_aantal);
$stmt->bindParam(':max_gewicht_pp', $max_gewicht_pp);
$stmt->bindParam('max_totaalgewicht', $max_totaalgewicht);
$stmt->bindParam(':vertrektijd', $vertrektijd);


// Execute the prepared statement
if ($stmt->execute()) {
echo "New flight added successfully!";
} else {
echo "Error adding flight.";
}
}



try {
    $data = $verbinding; 
    $data->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // Function to get destinations
    function getDestinations($db) {
      $sql = "SELECT naam FROM Luchthaven";
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
    echo "Error fetching options: " . $e->getMessage();
    $bestemmingen = [];
    $maatschappijcodes = [];
  }

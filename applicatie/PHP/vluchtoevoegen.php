<?php
require_once '../db_connectie.php';

$db = maakVerbinding();

 // SQL Query voor selecteer Luchthaven
 $query 'select maatschappijcode, naam FROM Maatschappij;';
 $data = $db-> query($query)
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['maatschappijcode'] . '">' . $row['naam'] . '</option>';
                    }
                } else {
           echo '<option value="">Geen maatschappijen gevonden</option>';
           }
               
$vluchtnummer = $_POST['vluchtnummer'];
$luchthavencode = $_POST['luchthavencode'];
$maxAantal = $_POST['max_aantal']; // Assuming form field names
$maxGewichtPP = $_POST['max_gewicht_pp'];
$maxTotaalGewicht = $_POST['max_totaalgewicht'];
$vertrektijd = $_POST['vertrektijd'];
$maatschappijcode = $_POST['maatschappijcode'];


$luchthavenOptions = getLuchthavenCodes($verbinding);


$maatschappijOptions = getMaatschappijCodes($verbinding);

function getLuchthavenCodes($db) {
  $sql = "SELECT luchthavencode, naam FROM Luchthaven"; // Assuming table names
  $stmt = $db->prepare($sql);
  $stmt->execute();

  $options = ""; // Initialize empty options string

  if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $options .= "<option value='" . $row['luchthavencode'] . "'>" . $row['naam'] . "</option>";
    }
  } else {
    $options = "<option value=''>Geen luchthavens gevonden</option>";
  }

  return $options;
}

function getMaatschappijCodes($db) {
  $sql = "SELECT maatschappijcode, naam FROM Maatschappij"; // Assuming table names
  $stmt = $db->prepare($sql);
  $stmt->execute();

  $options = ""; // Initialize empty options string

  if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $options .= "<option value='" . $row['maatschappijcode'] . "'>" . $row['naam'] . "</option>";
    }
  } else {
    $options = "<option value=''>Geen maatschappijen gevonden</option>";
  }

  return $options;
}
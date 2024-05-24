<?php
require_once '../db_connectie.php';

$db = maakVerbinding();

function getLuchthavenCodes($db) {
    $sql = "SELECT naam FROM Luchthaven"; 
    $data = $db->query($query);
    $data->execute();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row['naam'] . '</option>';
                        }
                    } else {
               echo '<option value="">luchthavencodes gevonden</option>';
               }
   
    return $options;
  }
  

 // SQL Query voor selecteer Luchthaven
 function getMaatschappijCodes($db){
 $query 'select maatschappijcode, naam FROM Maatschappij;';
 $data = $db-> query($query)
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['maatschappijcode'] . '">' . $row['naam'] . '</option>';
                    }
                } else {
           echo '<option value="">Geen maatschappijen gevonden</option>';
           }
           return $options;
        }
               
$vluchtnummer = $_POST['vluchtnummer'];
$luchthavencode = $_POST['luchthavencode'];
$maxAantal = $_POST['max_aantal']; // Assuming form field names
$maxGewichtPP = $_POST['max_gewicht_pp'];
$maxTotaalGewicht = $_POST['max_totaalgewicht'];
$vertrektijd = $_POST['vertrektijd'];
$maatschappijcode = $_POST['maatschappijcode'];



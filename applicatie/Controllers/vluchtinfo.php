<?php
session_start();

include 'db/db_connectie.php';

$db = maakVerbinding();

//Gebruik de view vluchtinfo.sql in directory Views
$sql = "SELECT vertrektijd,
vluchtnummer,
luchthaven_naam,
land,
maatschappij_naam,
gatecode FROM vluchtinfo"; // Laat alles zien uit de view vluchtinfo
$result = $db->query($sql); // Resultaat van deze view is de variabele $result
$totalRows = $result->rowCount(); // Totaal aantal rijen
while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Variabele $result uit view - lus doorloopt de result rij voor rij
    echo '<tr>';
    echo '<td>' . $row['vertrektijd'] . '</td>';
    echo '<td>' . $row['vluchtnummer'] . '</td>';
    echo '<td>' . $row['luchthaven_naam'] . '</td>';
    echo '<td>' . $row['land'] . '</td>';
    echo '<td>' . $row['maatschappij_naam'] . '</td>';
    echo '<td>' . $row['gatecode'] . '</td>';
    echo '</tr>';
    }
?>

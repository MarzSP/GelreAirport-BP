<?php
include 'db/db_connectie.php';

$db = maakVerbinding();

//Gebruik de view vluchtinfo in DB
$sql = "SELECT vertrektijd,
vluchtnummer,
luchthaven_naam,
land,
maatschappij_naam,
gatecode,
Incheck_balie FROM vluchtinfo"; 
$result = $db->prepare($sql); 
$result->execute();
$totalRows = $result->rowCount(); 
while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Variabele $result uit view - lus doorloopt de result rij voor rij
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['vertrektijd'], ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td>' . htmlspecialchars($row['vluchtnummer'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '<td>' . htmlspecialchars($row['luchthaven_naam'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '<td>' . htmlspecialchars($row['land'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '<td>' . htmlspecialchars($row['maatschappij_naam'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '<td>' . htmlspecialchars($row['gatecode'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '<td>' . htmlspecialchars($row['Incheck_balie'], ENT_QUOTES, 'UTF-8')  . '</td>';
    echo '</tr>';
    }



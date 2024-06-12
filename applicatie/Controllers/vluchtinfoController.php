<?php

$db = maakVerbinding();
// Check of er een zoekterm is ingevoerd
$zoekVluchtnummer = $_GET['zoekVluchtnummer'] ?? '';

//Gebruik de view vluchtinfo in DB
$sql = "SELECT vertrektijd,
vluchtnummer,
luchthaven_naam,
land,
maatschappij_naam,
gatecode,
Incheck_balie FROM vluchtinfo"; 

// Query als er een zoekterm is ingevoerd
if ($zoekVluchtnummer) {
    $sql .= " WHERE vluchtnummer LIKE :zoekVluchtnummer";
}
$result = $db->prepare($sql); 

if ($zoekVluchtnummer) {
    $result->bindValue(':zoekVluchtnummer', '%' . $zoekVluchtnummer . '%');
}

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



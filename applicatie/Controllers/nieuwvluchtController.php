<?php
// Include the database connection
include '../DB/db_connectie.php';

$db = maakVerbinding();

// Function to get luchthaven codes
function getLuchthaven($db) {
    $sql = "SELECT naam FROM Luchthaven";
    $result = $db->query($sql);

    $options = '';

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options .= '<option value="' . $row['naam'] . '</option>';
        }
    } else {
        $options .= '<option value="">Geen luchthavens gevonden</option>';
    }
    return $options;
}

// Function to get maatschappij codes
function getMaatschappijCodes($db) {
    $sql = "SELECT maatschappijcode FROM Maatschappij";
    $result = $db->query($sql);

    $options = '';

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options .= '<option value="' . $row['maatschappijcode'] . '</option>';
        }
    } else {
        $options .= '<option value="">Geen maatschappijen gevonden</option>';
    }
    return $options;
}

// Get options from database
$luchthavenOptions = getLuchthaven($db);
$maatschappijOptions = getMaatschappijCodes($db);

?>

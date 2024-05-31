<?php
// Include the database connection
include '../DB/db_connectie.php';

$db = maakVerbinding();

// Function to get maatschappij codes
function getMaatschappijCodes($db) {
    echo "Database connection: ";
    var_dump($db);
    $sql = 'SELECT maatschappijcode FROM Maatschappij';
    $result = $db->query($sql);

    $options = '';

    if ($result && $result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $options .= '<option value="' . $row['maatschappijcode'] . '</option>';
        }
    } else {
        $options .= '<option value="">Geen maatschappijen gevonden</option>';
    }

    return $options;
}
// Get options from database
$maatschappijOptions = getMaatschappijCodes($db);

<?php
require_once '../DB/staff_zoektabel.php'; // Include the common functions

$db = maakVerbinding();
$luchthaven = "";
$vlucht_data = array();
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['luchthaven'])) {
    $luchthaven = filter_var($_POST['luchthaven'], FILTER_SANITIZE_STRING);

    if (empty($luchthaven)) {
        $error_message = "Luchthaven is ongeldig.";
    } else {
        $vlucht_data = fetchFlightDataLuchthaven($db, $luchthaven);
        if (empty($vlucht_data)) {
            $error_message = "Geen luchthaven gevonden met naam: " . htmlspecialchars($luchthaven, ENT_QUOTES, 'UTF-8');
        }
    }
}

if (!empty($error_message)) {
    echo "<span class='error-message'>$error_message</span>";
}

renderStaffZoekTabel($vlucht_data);


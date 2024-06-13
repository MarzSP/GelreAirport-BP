<?php
require_once '../DB/staff_zoektabel.php'; // Include the common functions

$db = maakVerbinding();
$vluchtnummer = "";
$vlucht_data = array();
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vluchtnummer'])) {
    $vluchtnummer = filter_var($_POST['vluchtnummer'], FILTER_SANITIZE_NUMBER_INT);

    if (!$vluchtnummer || strlen($vluchtnummer) != 5 || !is_numeric($vluchtnummer)) {
        $error_message = "Ongeldig vluchtnummer.";
    } else {
        $vlucht_data = fetchFlightDataVluchtnummer($db, $vluchtnummer);
        if (empty($vlucht_data)) {
            $error_message = "Geen vlucht gevonden met nummer: " . htmlspecialchars($vluchtnummer, ENT_QUOTES, 'UTF-8');
        }
    }
}

if (!empty($error_message)) {
    echo "<span class='error-message'>$error_message</span>";
}

renderStaffZoekTabel($vlucht_data);


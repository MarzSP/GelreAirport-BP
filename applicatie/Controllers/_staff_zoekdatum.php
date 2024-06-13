<?php
require_once '../DB/staff_zoektabel.php'; 

$db = maakVerbinding();
$vertrektijd = "";
$vlucht_data = array();
$error_message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['vertrektijd'])) {
    $luchthaven = htmlspecialchars($_POST['vertrektijd'], ENT_QUOTES, 'UTF-8');

    if (empty($vertrektijd)) {
        $error_message = "vertrektijd is ongeldig.";
    } else {
        $vlucht_data = fetchFlightDataLuchthaven($db, $vertrektijd);
        if (empty($vlucht_data)) {
            $error_message = "Geen vertrektijd gevonden: " . htmlspecialchars($vertrektijd, ENT_QUOTES, 'UTF-8');
        }
    }
}

if (!empty($error_message)) {
    echo "<span class='error-message'>$error_message</span>";
}

renderStaffZoekTabel($vlucht_data);
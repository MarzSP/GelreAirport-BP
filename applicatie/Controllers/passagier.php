<?php
require_once '../includes.php';
require_once '../DB/checkin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vluchtnummer = htmlspecialchars($_POST['vluchtnummer'], ENT_QUOTES, 'UTF-8');
    $gewichten = $_POST['gewicht'];
    $passagiernummer = $_SESSION['gebruikersnaam'];

    foreach ($gewichten as $key => $gewicht) {
        $gewichten[$key] = floatval($gewicht);
    }

    $data = getBaggageInfo($vluchtnummer);
    $maxObjecten = $data['objecten'];
    $maxGewicht = $data['pp'];

    $totaalGewicht = array_sum($gewichten);

    if ($totaalGewicht > $maxGewicht) {
        $_SESSION['foutmelding'] = "Het totale gewicht overschrijdt het limiet van $maxGewicht kg.";
    } elseif (count($gewichten) > $maxObjecten) {
        $_SESSION['foutmelding'] = "Het aantal objecten overschrijdt het limiet van $maxObjecten.";
    } else {
        foreach ($gewichten as $key => $gewicht) {
            if ($gewicht >= 0) {
                try {
                    addBaggage($passagiernummer, $key, $gewicht);
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) {
                        $_SESSION['foutmelding'] = "Passagier $passagiernummer is reeds ingecheckt voor vluchtnummer: $vluchtnummer.";
                    } else {
                        throw $e;
                    }
                }
            }
        }

        $_SESSION['succesmelding'] = "U bent ingecheckt!";
    }

    header('Location: ../Views/passagier.php?vluchtnummer=' . urlencode($vluchtnummer));
    exit;
}

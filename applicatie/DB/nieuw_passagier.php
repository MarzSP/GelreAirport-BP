<?php

include 'db_connectie.php';

// Functie om passagiergegevens te valideren
function valideerPassagierInvoer($passagiernummer, $naam, $vluchtnummer, $geslacht, $wachtwoord) {
    $geldig = true;
    $foutmeldingen = [];

    if (!is_numeric($passagiernummer) || $passagiernummer <= 0) {
        $geldig = false;
        $foutmeldingen[] = "Ongeldig passagiernummer";
    }

    if (empty($naam)) {
        $geldig = false;
        $foutmeldingen[] = "Naam mag niet leeg zijn";
    }
    if (empty($vluchtnummer)) {
        $geldig = false;
        $foutmeldingen[] = "Vluchtnummer mag niet leeg zijn";
    }

    if (empty($wachtwoord)) {
        $geldig = false;
        $foutmeldingen[] = "Wachtwoord mag niet leeg zijn";
    }

    if ($geldig) {
        return true;
    } else {
        return $foutmeldingen;
    }
}

// Passagiersgegevens opslaan
function slaPassagierOp($passagiernummer, $naam, $vluchtnummer, $geslacht, $wachtwoord) {
    $db = maakVerbinding();

    $sql = "INSERT INTO Passagier (passagiernummer, naam, vluchtnummer, geslacht, wachtwoord)
          VALUES (:passagiernummer, :naam, :vluchtnummer, :geslacht, :wachtwoord)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':passagiernummer', $passagiernummer, PDO::PARAM_INT);
    $stmt->bindParam(':naam', $naam, PDO::PARAM_STR);
    $stmt->bindParam(':vluchtnummer', $vluchtnummer, PDO::PARAM_INT);
    $stmt->bindParam(':geslacht', $geslacht, PDO::PARAM_STR);
    $stmt->bindParam(':wachtwoord', $wachtwoord, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

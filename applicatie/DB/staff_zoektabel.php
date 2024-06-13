<?php

$db = maakVerbinding();

function fetchFlightDataVluchtnummer($db, $vluchtnummer)
{
    $sql = 'SELECT vluchtnummer, Lnaam, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, gatecode, naam, maatschappijcode, luchthavencode FROM vluchtnummer WHERE vluchtnummer = ?';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $vluchtnummer, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchFlightDataLuchthaven($db, $luchthaven) {
    $sql = 'SELECT vluchtnummer, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, gatecode, naam, maatschappijcode, Lnaam, luchthavencode FROM vluchtnummer WHERE Lnaam = ?';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(1, $luchthaven, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
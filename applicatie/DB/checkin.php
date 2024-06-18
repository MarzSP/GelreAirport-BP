<?php
require_once '../includes.php';

function getPassagierBoekingen($login) {
    $db = maakVerbinding();

    $sql = "SELECT
        vertrektijd,
        vluchtnummer,
        luchthaven_naam,
        land,
        maatschappij_naam,
        gatecode,
        Incheck_balie
    FROM boeking_passagier
    WHERE passagiernummer = ?
    AND vertrektijd > GETDATE()";

    $result = $db->prepare($sql);
    $result->bindValue(1, $login);
    $result->execute();

    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function getBaggageInfo($vluchtnummer) {
    $db = maakVerbinding();

    $sql = 'SELECT TOP (1) max_objecten_pp as objecten, max_gewicht_pp as pp
        FROM Vlucht v
        join Maatschappij m on v.maatschappijcode = m.maatschappijcode
        where v.vluchtnummer = ?';

    $result = $db->prepare($sql);
    $result->bindValue(1, $vluchtnummer);
    $result->execute();

    return $result->fetch(PDO::FETCH_ASSOC);
}

function addBaggage($passagiernummer, $key, $gewicht) {
    $db = maakVerbinding();

    $sql = 'INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) VALUES (?, ?, ?)';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $passagiernummer, PDO::PARAM_STR);
    $stmt->bindValue(2, $key, PDO::PARAM_INT);
    $stmt->bindValue(3, $gewicht, PDO::PARAM_STR);

    return $stmt->execute();
}

function updateInchecktijdstip($passagiernummer, $inchecktijdstip) {
    $db = maakVerbinding();

    $sql = 'UPDATE Passagier SET Inchecktijdstip = ? WHERE passagiernummer = ?';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $inchecktijdstip);
    $stmt->bindValue(2, $passagiernummer);

    return $stmt->execute();
}
?>

<?php


function getPassengierBoeking()
{
    $db = maakVerbinding();
    $login = $_SESSION['gebruikersnaam'];

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
    $data = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Variabele $result uit view - lus doorloopt de result rij voor rij
        $data[] = $row;
    }

    return $data;
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
    // ToDo insert into BagageObject
    $db = maakVerbinding();

    $sql = 'INSERT INTO BagageObject (passagiernummer, objectvolgnummer, gewicht) VALUES (?, ?, ?)';

    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $passagiernummer, PDO::PARAM_INT);
    $stmt->bindValue(2, $key, PDO::PARAM_STR);
    $stmt->bindValue(3, $gewicht, PDO::PARAM_STR);

    return $stmt->execute();
}

function passagierInchecktijdstip($passagiernummer, $inchecktijdstip) {
    $db = maakVerbinding();
    $sql = 'UPDATE Passagier SET Inchecktijdstip = ? WHERE passagiernummer = ?';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(1, $inchecktijdstip, PDO::PARAM_STR);
    $stmt->bindValue(2, $passagiernummer, PDO::PARAM_STR);
    return $stmt->execute();
}
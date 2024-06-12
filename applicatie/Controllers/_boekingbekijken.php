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
WHERE passagiernummer = ?";

    $result = $db->prepare($sql);
    $result->bindValue(1, $login);
    $result->execute();
    $data = [];

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Variabele $result uit view - lus doorloopt de result rij voor rij
        $data[] = $row;
    }

    return $data;
}

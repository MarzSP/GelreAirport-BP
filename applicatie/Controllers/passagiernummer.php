<?php
function getNextPassagiernummer($db) {
    $sql = "SELECT MAX(passagiernummer) as maxNummer FROM Passagier";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['maxNummer'] + 1 : 1;
}

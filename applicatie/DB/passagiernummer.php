<?php
function getNextPassagiernummer($db) {
    $sql = "SELECT MAX(passagiernummer) + 1 AS next_passagiernummer FROM Passagier";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row['next_passagiernummer'];
}

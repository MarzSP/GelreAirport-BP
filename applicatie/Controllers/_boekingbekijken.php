<?php


function getPassengierBoeking() {
    $db = maakVerbinding();
$login = $_SESSION['gebruikersnaam'];

  $sql = "SELECT
Passagier.passagiernummer,
     Vertrektijd,
    Vlucht.vluchtnummer,
    luchthaven_naam,
    Luchthaven.land,
    maatschappij_naam,
    Vlucht.gatecode,
    Incheck_balie
FROM boeking_passagier
WHERE passagiernummer = ?";

  $stmt = $db->prepare($sql);
  $stmt->bind_param(":login", $login);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
  } else {
    return null;
  }
}
?>



<?php
include '../DB/db_connectie.php';

$db = maakVerbinding(); 

$vluchtnummer = ""; // initialisatie variabele om vluchtnummer in te bewaren
$flight_data = array(); // lege array om de opgehaalde vluchtdetails  in op te slaan
$error_message = ""; // plek om error messages in op te slaan

// Gegevens uit formulier -> Server (POST)
// Constante FILTER_SANITIZE_NUMBER_INT: om input van user "reinigen" / voorkomen van SQL injectie
// Constante ^ verwijderd alle tekends uit de invoer behalve 0-9
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['vluchtnummer'])) {
    $vluchtnummer = filter_var($_POST['vluchtnummer'], FILTER_SANITIZE_NUMBER_INT); 

    // Validatie dat het een vluchtnummer uit 5 cijfers bestaat
    if (!$vluchtnummer || strlen($vluchtnummer) != 5 || !is_numeric($vluchtnummer)) {
      $error_message = "Ongeldig vluchtnummer.";
    } else {
      // SQL query wordt voorbereid:
      $stmt = $db->prepare('SELECT v.vluchtnummer, v.max_aantal, v.max_gewicht_pp, v.max_totaalgewicht, v.vertrektijd, v.gatecode, m.naam, m.maatschappijcode, l.naam, l.luchthavencode FROM Vlucht v JOIN Maatschappij m ON v.maatschappijcode = m.maatschappijcode JOIN Luchthaven l ON v.bestemming = l.luchthavencode WHERE v.vluchtnummer = ?');

      // Controlleert of vluchtnummer leeg is of ingevuld
      if (!empty($vluchtnummer) && is_numeric($vluchtnummer)) {
        // Bind parameter vluchtnummer aan het sql statement
        $stmt->bindParam(1, $vluchtnummer, PDO::PARAM_INT);
      } else {
        $error_message = "Vluchtnummer is ongeldig.";
      }

      // Controlleert of de query geslaagd is Zo ja, komen de resultaten als associatieve rijen terug
      if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Controle of er een vluchtnummer is in dB
        if (count($result) > 0) {
          // Fetch de gevonden vluchtdetails en sla ze op in $flight-details
          $flight_data = $result;
        } else {
          $error_message = "Geen vlucht gevonden met nummer: " . $vluchtnummer;
        }
      } else {
        // Error bericht als de query mislukt
        $error_message = "Error executing query: " . $stmt->errorInfo()[0];
      }
    }
  } else {
    // Error als vluchtnummer niet is ingevuld
    $error_message = "Vluchtnummer ongeldig.";
  }
}


if (!empty($error_message)) {
    echo "<span class='error-message'>$error_message</span>";
}
// Als vluchtdata wordt opgehaald, dan moet dat als HTML op de pagina in een tabel worden weergegeven.
if (count($flight_data) > 0): ?>
<div id="flight_results">
    <h3>Vluchtgegevens</h3>
    <table>
        <thead>
            <tr>
                <th>Vluchtnummer</th>
                <th>Vertrektijd</th>
                <th>Maatschappij</th>
                <th>Maatschappijcode</th>
                <th>Luchthaven</th>
                <th>Luchthavencode</th>
                <th>Max. Aantal</th>
                <th>Max. gewicht PP</th>
                <th>Max. totaal gewicht</th>
                <th>Gate</th>
        </thead>
        <tbody>
            <?php foreach ($flight_data as $flight): ?>
            <tr>
                <td><?php echo $flight['vluchtnummer']; ?></td>
                <td><?php echo $flight['vertrektijd']; ?></td>
                <td><?php echo $flight['naam']; ?></td>
                <td><?php echo $flight['maatschappijcode']; ?></td>
                <td><?php echo $flight['naam']; ?></td>
                <td><?php echo $flight['luchthavencode']; ?></td>
                <td><?php echo $flight['max_aantal']; ?></td>
                <td><?php echo $flight['max_gewicht_pp']; ?></td>
                <td><?php echo $flight['max_totaalgewicht']; ?></td>
                <td><?php echo $flight['gatecode']; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

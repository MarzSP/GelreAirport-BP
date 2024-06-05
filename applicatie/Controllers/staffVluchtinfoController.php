<?php
/* Code is veilig gemaakt tegen SQL-Injection en XSS door middel van: Prepared statements, Sanitized input, htmlspecialchars, error handling en validatie. */
include '../DB/db_connectie.php';

$db = maakVerbinding(); 

$vluchtnummer = ""; 
$flight_data = array(); 
$error_message = ""; 

// Constante FILTER_SANITIZE_NUMBER_INT: om input van user "reinigen" / voorkomen van SQL injectie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['vluchtnummer'])) {
    $vluchtnummer = filter_var($_POST['vluchtnummer'], FILTER_SANITIZE_NUMBER_INT); 

    // Validatie dat het een vluchtnummer uit 5 cijfers bestaat
    if (!$vluchtnummer || strlen($vluchtnummer) != 5 || !is_numeric($vluchtnummer)) {
      $error_message = "Ongeldig vluchtnummer.";
    } else {
      // SQL query wordt voorbereid:
      $stmt = $db->prepare('SELECT v.vluchtnummer, v.max_aantal, v.max_gewicht_pp, v.max_totaalgewicht, v.vertrektijd, v.gatecode, m.naam, m.maatschappijcode, l.naam, l.luchthavencode FROM Vlucht v JOIN Maatschappij m ON v.maatschappijcode = m.maatschappijcode JOIN Luchthaven l ON v.bestemming = l.luchthavencode WHERE v.vluchtnummer = ?');

      if (!empty($vluchtnummer) && is_numeric($vluchtnummer)) {
        // Bind parameter vluchtnummer aan het sql statement
        $stmt->bindParam(1, $vluchtnummer, PDO::PARAM_INT);
      } else {
        $error_message = "Vluchtnummer is ongeldig.";
      }

      if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
          $flight_data = $result;
        } else {
          $error_message = "Geen vlucht gevonden met nummer: " . $vluchtnummer;
        }
      } else {
        $error_message = "Error executing query: " . $stmt->errorInfo()[0]; //Als query mislukt
      }
    }
  } else {
    $error_message = "Vluchtnummer ongeldig."; // Als invoer incorrect is
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
                <td><?php echo htmlspecialchars($flight['vluchtnummer'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['vertrektijd'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['naam'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['maatschappijcode'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['naam'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['luchthavencode'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['max_aantal'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['max_gewicht_pp'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['max_totaalgewicht'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['gatecode'], ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>

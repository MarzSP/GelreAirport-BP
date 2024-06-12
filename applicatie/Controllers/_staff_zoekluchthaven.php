<?php
/* Code is veilig gemaakt tegen SQL-Injection en XSS door middel van: Prepared statements, Sanitized input, htmlspecialchars, error handling en validatie. */
$db = maakVerbinding();

$luchthaven = ""; 
$vlucht_data = array(); 
$error_message = ""; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['luchthaven'])) {
      $luchthaven = filter_var($_POST['luchthaven'], FILTER_SANITIZE_STRING);

      if (!empty($luchthaven)) {
          $sql = 'SELECT vluchtnummer, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, gatecode, naam, maatschappijcode, Lnaam, luchthavencode FROM vluchtnummer WHERE Lnaam = ?';
          $stmt = $db->prepare($sql);
   
          $stmt->bindParam(1, $luchthaven, PDO::PARAM_STR);
          
          if ($stmt->execute()) {
              $vlucht_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

              if (empty($vlucht_data)) {
                  $error_message = "Geen luchthaven gevonden met naam: " . htmlspecialchars($luchthaven, ENT_QUOTES, 'UTF-8');
              }
          } else {
              $error_message = "Fout bij het uitvoeren van query: " . $stmt->errorInfo()[2];
          }
      } else {
          $error_message = "Luchthaven is ongeldig.";
      }
  }
}

if (!empty($error_message)) {
  echo "<span class='error-message'>$error_message</span>";
}

// Als vluchtdata wordt opgehaald, dan moet dat als HTML op de pagina in een tabel worden weergegeven.
if (count($vlucht_data) > 0): ?>
<div id="luchthaven">
    <h3>Vluchtgegevens</h3>
    <table>
        <thead>
            <tr>
            <th>Luchthaven</th>
            <th>Vluchtnummer</th>
            <th>Vertrektijd</th>
            <th>Maatschappij</th>
            <th>Maatschappijcode</th>
            <th>Luchthavencode</th>
            <th>Max. Aantal</th>
            <th>Max. gewicht PP</th>
            <th>Max. totaal gewicht</th>
            <th>Gate</th>
        </thead>
        <tbody>
            <?php foreach ($vlucht_data as $flight): ?>
            <tr>
            <td><?php echo htmlspecialchars($flight['vluchtnummer'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['vertrektijd'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['maatschappij'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['maatschappijcode'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($flight['luchthaven'], ENT_QUOTES, 'UTF-8'); ?></td>
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

<?php
include '../db_connectie.php';

$db = maakVerbinding(); 

$vluchtnummer = ""; // initialisatie variabele om vluchtnummer in te bewaren
$flight_data = array(); // lege array om de opgehaalde vluchtdetails op te slaan
$error_message = ""; // plek om fouten in op te slaan

// Gegevens uit formulier naar server verzenden (Post)
 // Constante FILTER_SANITIZE_NUMBER_INT: om input van user "reinigen" / voorkomen van SQL injectie
 // Constante ^ verwijderd alle tekends uit de invoer behalve 0-9
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Controleer op vluchtnummer bestaat in Post
  if (isset($_POST['vluchtnummer'])) {
    $vluchtnummer = filter_var($_POST['vluchtnummer'], FILTER_SANITIZE_NUMBER_INT); 

    // Validatie dat het een vluchtnummer uit 5 cijfers bestaat
    if (!$vluchtnummer || strlen($vluchtnummer) != 5 || !is_numeric($vluchtnummer)) {
      $error_message = "Ongeldig vluchtnummer.";
    } else {
      // SQL view/Query wordt voorbereid:
      $stmt = $db->prepare('SELECT v.vluchtnummer, v.max_aantal, v.max_gewicht_pp, v.max_totaalgewicht, v.vertrektijd, v.gatecode, m.naam, m.maatschappijcode, l.naam, l.luchthavencode FROM Vlucht v JOIN Maatschappij m ON v.maatschappijcode = m.maatschappijcode JOIN Luchthaven l ON v.bestemming = l.luchthavencode WHERE v.vluchtnummer = ?');

      // Controlleert of vluchtnummer leeg is of ingevuld
      if (!empty($vluchtnummer) && is_numeric($vluchtnummer)) {
        // Bind parameter vluchtnummer aan het sql statement
        $stmt->bindParam(1, $vluchtnummer, PDO::PARAM_INT);
      } else {
        $error_message = "Vluchtnummer is ongeldig.";
      }

      // Controlleert of de query geslaagd is Zo ja, dan komen de resultaten als associatieve rijen terug
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
?>



<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/normalize.css">
  <link rel="stylesheet" href="../CSS/nav-header.css">  
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/forms.css">
  <title>GelreAirport: Bereik meer!</title>
</head>

<body>
  <!-- Navigatie balk -->
  <nav>
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="../Pages/passagier.php">Checkin</a></li>
      <li><a href="../Pages/contact.php">Contact</a></li>
      <li><a href="../Pages/login.php"><button type="button" class="shift-right">Log in</button></a></li>
      <li><a href="../Pages/medewerker.php">Medewerkertest</a></li>
    </ul>
  </nav>


  <!-- Main pagina vulling -->
  <main>
    <!-- Pagina header Logo - Welkomsttext -->
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Welkom Baliemedewerker </p>
    </div>
  </section>

  <!-- Linker box/formulier met Passagier toevoegen -->
  <section class="container-wrapper">
  <section class="leftcontainer">
  <form action="process_baggage.php" method="post"> <h3>Passagiergegevens</h3>
      <label for="name">Naam:</label>
      <input type="text" id="naam" name="naam" pattern=" [a-zA-Z\-'\s]+" maxlength="50" required>
      <span class="message">Voer een naam in met letters.</span>
       <br>

      <label for="name">Passagiernummer:</label>
      <input type="text" id="passagiernummer" name="passagiernummer" pattern="[a-zA-Z0-9]" maxlength="50" required>
      <span class="message">Voer de cijfers van het passagiersnummers in.</span>
      <br>

      <label for="vluchtnummer">Vluchtnummer:</label>
      <input type="text" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="5" required>
      <span class="message">Voer de cijfers van het vluchtnummer in.</span>
      <br>

      <label for="passport">Paspoortnummer:</label>
      <input type="text" id="passport" name="passport" required>
      <span class="message">Voer de cijfers van het passpoortnummer in.</span>
      <br>

      <h3>Bagage Informatie</h3>
      <label for="num_bags">Aantal baggage:</label>
      <input type="number" id="num_bags" name="num_bags" min="0" max="7" required>
      <span class="message">Voer in cijfers het aantal stuks baggage in.</span>
      <br>
        
      <label for="num_bags">Gewicht baggage:</label>
      <input type="number" id="gewicht" name="gewicht" min="0" max="70" required>
      <span class="message">Voer in cijfers het aantal kilo baggage in.</span>
      <br>
        <div id="bag_details"> </div>
        <button type="submit">Inchecken</button>
    </form> </section>
  
  <!-- Vlucht gegevens ophalen box/formulier -->
    <section class="rightcontainer">
            <h3>Vluchtgegevens Ophalen</h3>
            <form action="" method="post" id="vluchtnummer">
                <label for="vluchtnummer">Vluchtnummer:</label>
                <input type="text" id="vluchtnummer" name="vluchtnummer" required>
                <span class="error-message"><?php echo $error_message; ?></span>
                <br>
                <button type="submit">Zoek Vlucht</button>
            </form>

            <?php if (count($flight_data) > 0): ?>
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

        </section>
            </section>

<!-- Formulier: Nieuwe Vlucht toevoegen-->
<section class="leftcontainer">
<h2>Nieuwe Vlucht Toevoegen </h2>
<form action="includes/db_connectie.php" method="post">

<label for="vluchtnummer">Vluchtnummer:</label>
<input type="number" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="15" required><br>

<label for="luchthavencode">Luchthavencode:</label>
<select id="luchthavencode" name="luchthavencode" required>
  <option value="">Selecteer luchthaven</option>
  <?php echo $luchthavenOptions; 
  ?>
</select><br>

<label for="max_aantal">Maximaal aantal passagiers:</label>
<input type="number" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="5000" required><br>

<label for="max_gewicht_pp">Maximaal gewicht per persoon (kg):</label>
<input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required><br>

<label for="max_totaalgewicht">Maximaal totaalgewicht (kg):</label>
<input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required><br>

<label for="vertrektijd">Vertrektijd:</label>
<input type="datetime-local" id="vertrektijd" name="vertrektijd" required><br>

<label for="maatschappijcode">Maatschappijcode:</label>
<select id="maatschappijcode" name="maatschappijcode" required>
  <option value="">Selecteer maatschappij</option>
  <?php echo $maatschappijOptions; ?>
</select> <br>
        <p>
          
<button type="submit">Vlucht toevoegen</button>
</form>
</div>
</section>
            </body>
<!-- Footer -->
<footer>
  <p> 2024 Marianne Peterson S2136361</p>
</footer>
            </main>
</html>

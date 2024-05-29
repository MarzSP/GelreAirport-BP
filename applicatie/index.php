<?php
include 'db_connectie.php';

$db = maakVerbinding();

// Gebruik de view vluchtinfo.sql in directory Views
$sql = "SELECT * FROM vluchtinfo"; // Laat alles zien uit de view vluchtinfo
$result = $db->query($sql); // Resultaat van deze view is de variabele $result
$totalRows = $result->rowCount(); // Totaal aantal rijen

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/normalize.css">
  <link rel="stylesheet" href="../CSS/nav-header.css">  
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/forms.css">
    <title>GelreAirport</title>
</head>

<body>
<!-- Navigatie balk -->
<nav> 
  <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="../Pages/passagier.php">Checkin</a></li>
      <li><a href="../Pages/contact.php">Contact</a></li>
      <li><a href="../Pages/login.php"><button type="button" class="shift-right">Log in</button></a></li>
      <li><a href="../Pages/medewerker.php">Medewerkertest</a></li>
    </ul>
  </nav>

<main>

<!-- Pagina header(column1), en welkomst text(column2) -->
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220"/>
            </div> 
    </div>
    <div class="column2">
      <div class="welkomst-animatie">
     <h1>Welkom bij GelreAirport!</h1> </div>
        <p>Ontdek een wereld van mogelijkheden! Beheer uw boekingen, check online in, zoek aankomende en vertrekkende vluchten en nog veel meer! 
        <p>Uw avontuur begint hier - klaar voor vertrek?</p>
    </div>
    <!-- Vliegtuig afbeelding die geanimeerd wordt -->
    <div class="vliegtuigje">
        <img src="../Images/airplane.png" alt="animatie van een vliegtuigje" width="50"/>
  </div>
  </section>


    <!--Container2 linker box met vluchtinformatie-->
  <section class="container-wrapper">
    <div class="leftcontainer">
          <!-- Vluchtinfo hier -->
          <h1> Vertrekkende vluchten: </h1>

          <!-- Tabel in linker container met de actuele vlucht informatie uit de View -->
  <div class="vlucht-tabel-container">
    <table>
      <thead>
        <tr>
          <th>Tijd</th>
          <th>Vluchtnummer</th>
          <th>Bestemming</th>
          <th>Land</th>
          <th>Maatschappij</th>
          <th>Gate</th>
        </tr>
      </thead>
      <tbody>
      <?php
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) { // Variabele $result uit de view wordt hier gebruikt:
        echo '<tr>';
        echo '<td>' . $row['vertrektijd'] . '</td>';
        echo '<td>' . $row['vluchtnummer'] . '</td>';
        echo '<td>' . $row['luchthaven_naam'] . '</td>';
        echo '<td>' . $row['land'] . '</td>';
        echo '<td>' . $row['maatschappij_naam'] . '</td>';
        echo '<td>' . $row['gatecode'] . '</td>';
        echo '</tr>';
        }
      ?>
        </tbody>
    </table>
</div>
</div>

<!-- Container3 rechter box met Algemene informatie -->
    <div class="rightcontainer">
        <div class="Algemeneinfo">
          <h1>Algemene Informatie</h1>
<!-- De onderdelen van Algemene informatie in een lijst -->
<section class="inchecken">
  <h3>Inchecken</h3>
  <ul>
    <li>Online inchecken kan 24 uur - 2 uur voor vertrek </li>
    <li>Inchecken bij de luchthaven kan 2 uur voor vertrek</li>
  </ul>
</section>

<section class="vluchtinformatie">
  <h3>Vluchtinformatie</h3>
  <ul>
    <li>Bekijk op deze website: Aankomende & vertrekkende vluchten</li>
  </ul>
</section>

<section class="bagage">
  <h3>Bagage</h3>
  <p>Check online of bij de balie uw bagage in. Gewicht en aantal toegestane stuks bagage kan per maatschappij verschillen. Raadpleeg de website van de luchtvaartmaatschappij voor de exacte regels en voorschriften.</p>
</section>


<section class="tips">
  <h3>Tips</h3>
  <ul>
    <li>Kom op tijd naar luchthaven!</li>
    <li>Neem uw reisdocumenten mee</li>
  </ul>
</section>

<p class="afsluiting">Fijne reis!</p>
        </div>
    </div>
</section>

  
<!-- Footer onderaan pagina -->
  <footer>
    <p> 2024 Marianne Peterson S2136361</p>
  </footer>
</main> <!-- </main> moet onder Footer, zo strekt de achtergrond afbeedling totaan de onderkant van de pagina -->
</body>
</html>
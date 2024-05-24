
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="nav" href="../CSS/nav.css">
    <title>GelreAirport</title>
</head>
<main>
<!-- Navigatie balk -->
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="../Pages/passagier.php">Checkin</a></li>
      <li><a href="../Pages/contact.php">Contact</a></li>
      <li><a href="../Pages/loginpassagier.php"><button type="button" class="shift-right">Log in</button></a></li>
      <li><a href="../Pages/nieuwvlucht.php">Nieuwe Vlucht</a></li>
      <li><a href="../Pages/loginmedewerker.php"><button type="button" class="shift-right">Medewerker login</button></a></li>
    </ul>
  </nav>

<body>
  <!-- Container: Pagina header(column1), en welkomst text(column2) -->
  
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p>Ontdek een wereld van mogelijkheden! Beheer uw boekingen, check online in, zoek aankomende en vertrekkende vluchten en nog veel meer! 
        <p>Uw avontuur begint hier - klaar voor vertrek?</p>
    </div>
    <div class="vliegtuigje">
        <img src="../Images/airplane.png" alt="animatie van een vliegtuigje" width="50">
</div>
  </section>


    <!--Container2 linker box met vluchtinformatie-->
  <section class="container-wrapper">
    <div class="container2">
          <!-- Vluchtinfo hier -->
          <div class="toggle-switch">
          <input type="radio" id="aankomst" name="vlucht-type" value="aankomst" checked>
          <label for="aankomst">Aankomst</label>
          <input type="radio" id="vertrek" name="vlucht-type" value="vertrek">
          <label for="vertrek">Vertrek</label>
         </div>

  <div class="vlucht-tabel-container">
    <table>
      <thead>
        <tr>
          <th>Tijd</th>
          <th>Vluchtnummer</th>
          <th>Land van afkomst/Bestemming</th>
          <th>Maatschappijnaam</th>
        </tr>
      </thead>
      <tbody>
        </tbody>
    </table>
</div>
</div>

<!-- Container3 rechter box met overige informatie -->
    <div class="container3">
        <div class="Algemeneinfo">
          <!-- Algemene info hier -->
          <h3>Algemene info </h3>
          <p>Hier komt algemene info</p>
          <p> dat zal wat ruimte innemen</p>
          <p> zoals hier</p>
          <p> en hier </p> 
          <p> en ook hier</p>
          <p> wat plaatjes van plekken waar je toch niet heen gaat </p> 
        </div>
    </div>
</section>

  
</body>
  <!-- Footer -->
  <footer>
    <p> 2024 Marianne Peterson S2136361</p>
  </footer></main>
</html>
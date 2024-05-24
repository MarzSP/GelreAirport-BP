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

<body><main>
  <!-- Container: Pagina header(column1), en welkomst text(column2) -->
  
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Deze pagina biedt u de mogelijkheid om in te checken, inclusief bagage, en om uw boekingen te raadplegen. </p>
    </div>
    <div class="vliegtuigje">
        <img src="../Images/airplane.png" alt="animatie van een vliegtuigje" width="50">
</div>
  </section>

  <section class="container-wrapper">
    <div class="container2">
  <h2>Inchecken</h2>
  <p>Check hier online in en bekijk uw bagage-informatie.</p>

  <form id="inchecken-form" action="inchecken.php" method="post">
    <label for="vluchtnummer">Vluchtnummer:</label>
    <input type="text" id="vluchtnummer" name="vluchtnummer" required>

    <label for="achternaam">Achternaam:</label>
    <input type="text" id="achternaam" name="achternaam" required>

    <label for="aantal-stukken">Aantal stuks bagage (max 2):</label>
    <input type="number" id="aantal-stukken" name="aantal-stukken" min="0" max="2" required>

    <label for="gewicht">Gewicht bagage (max 30 kg):</label>
    <input type="number" id="gewicht" name="gewicht" step="0.1" min="0.1" max="30" required> 

    <button type="submit">Inchecken</button>
  </form>

  <div id="inchecken-resultaat">
    </div> 
</div>


    
  <div class="container3">
      <h2>Mijn Boekingen</h2>
      <p>Bekijk hier uw aankomende vluchten</p>
    </section>
  </div>
</section>



  <!--Check in onderdelen -->
  
    </main>
    </body>
    <footer>
      <p> 2024 Marianne Peterson S2136361</p>
    </footer>
    </html>

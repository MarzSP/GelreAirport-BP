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
      <li><a href="../Pages/nieuwvlucht.php">Nieuwe Vlucht</a></li>
      <li><a href="../Pages/loginmedewerker.php"><button type="button" class="shift-right">Medewerker login</button></a></li>
    </ul>
  </nav>


  <!-- Pagina vulling -->
  <main>
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
      <input type="text" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="15" required>
      <span class="message">Voer de cijfers van het vluchtnummer in.</span>
      <br>

      <label for="passport">Paspoortnummer:</label>
      <input type="text" id="passport" name="passport" required>
      <span class="message">Voer de cijfers van het passpoortnummer in.</span>
      <br>

      <h3>Bagage Informatie</h3>
      <label for="num_bags">Aantal tassen:</label>
      <input type="number" id="num_bags" name="num_bags" min="0" required>
      <span class="message">Voer in cijfers het aantal stuks baggage in.</span>
      <br>
        
        <div id="bag_details"> </div>
        <button type="submit">Inchecken</button>
    </form> </section>
  
    <section class="rightcontainer">
        <h3>Vluchtgegevens Ophalen</h3>
        <form action="process_flight_info.php" method="post"> <label for="flight_number">Vluchtnummer:</label>
            <input type="text" id="flight_number" name="flight_number" required>
            <br>
            <button type="submit">Zoek Vlucht</button>
        </form>
        <div id="flight_details"> </div>
    </section>

  </main>

<footer>
  <p> 2024 Marianne Peterson S2136361</p>
</footer>
</body>
</html>

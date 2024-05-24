<!DOCTYPE html>
<html lang="nl">

<head>
  <link rel="navigation" href="../CSS/navigation.css">
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GelreAirport: Bereik meer!</title>
</head>

<body>
  <!-- Navigatie balk -->
  <nav>
    <ul>
      <li><a href="../index.php">Home</a></li>
      <li><a href="../Pages/passagier.php">Checkin</a></li>
      <li><a href="../Pages/contact.php">Contact</a></li>
      <li><a href="../Pages/loginpassagier.php"><button type="button" class="shift-right">Log in</button></a></li>
      <li><a href="../Pages/nieuwvlucht.php">Nieuwe Vlucht</a></li>
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
        <p> Welkom Baliemdewerker </p>
    </div>
  </section>

  <section class="container2">
  <form action="process_baggage.php" method="post"> <h2>Passagiergegevens</h2>
        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="passport">Paspoortnummer:</label>
        <input type="text" id="passport" name="passport" required>
        <br>
        <h2>Bagage Informatie</h2>
        <label for="num_bags">Aantal tassen:</label>
        <input type="number" id="num_bags" name="num_bags" min="0" required>
        <br>
        <div id="bag_details"> </div>
        <button type="submit">Inchecken</button>
    </form> </section>
  
    <section class="container3">
        <h1>Vluchtgegevens Ophalen</h1>
        <form action="process_flight_info.php" method="post"> <label for="flight_number">Vluchtnummer:</label>
            <input type="text" id="flight_number" name="flight_number" required>
            <br>
            <button type="submit">Zoek Vlucht</button>
        </form>
        <div id="flight_details"> </div>
    </section>

  </main>
</body>
<footer>
  <p> 2024 Marianne Peterson S2136361</p>
</footer>
</html>

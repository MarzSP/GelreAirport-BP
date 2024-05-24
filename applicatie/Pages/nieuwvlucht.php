
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/normalize.css">
  <link rel="stylesheet" href="../CSS/nav-header.css">  
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <title>GelreAirport: Voeg Vlucht Toe</title>
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

  <!-- Main: pagina informatie voor pagina Nieuwe Vlucht -->
  <main>
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Voeg een nieuwe vlucht toe </p>
    </div>
  </section>


    <section class="container2">

          <!-- Formulier: Nieuwe Vlucht toevoegen-->
          <h1>Nieuwe Vlucht Toevoegen</h1>
    <form action="includes/vluchtoevoegen.php" method="post">

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
            <?php echo $maatschappijOptions; // Insert retrieved options ?>
        </select> <br>
                  <p>
                    
        <button type="submit">Vlucht toevoegen</button>
    </form>
</section>
    
  </main>
  </body>
  <!-- Footer -->
  <footer>
    <p> 2024 Marianne Peterson S2136361</p>
  </footer>
</html>
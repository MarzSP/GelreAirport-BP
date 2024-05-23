<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="navigation" href="../CSS/navigation.css">
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GelreAirport: Voeg Vlucht Toe</title>
</head>

<body>
  <!-- Navigatie balk -->
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="passagier.php">Checkin</a></li>
      <li><a href="nieuwvlucht.php">Nieuwe Vlucht</a></li>
      <li><a href="contact.php">Contact</a></li>
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


    <div class="containerNieuweVlucht">
      <div class="left-box">

          <!-- Formulier: Nieuwe Vlucht toevoegen-->
          <h1>Nieuwe Vlucht Toevoegen</h1>
    <form action="add_flight.php" method="post">
        <label for="vluchtnummer">Vluchtnummer:</label>
        <input type="text" id="vluchtnummer" name="vluchtnummer" required><br>

        <label for="luchthavencode">Luchthavencode:</label>
        <select id="luchthavencode" name="luchthavencode" required>
            <option value="">Selecteer luchthaven</option>
            <?php
                // Eenmalige aanroep naar de DB
                 //require_once '../dbconnectie.php'

                 // Maak connectie met DB
                //$db = maakVerbinding();

                // SQL Query voor selecteer Luchthaven
                //$query 'select luchthavencode, naam FROM Luchthaven';
                //$data = $db-> query($query)

                //if ($result->num_rows > 0) {
                  //while ($row = $result->fetch_assoc()) {
                 //     echo '<option value="' . $row['luchthavencode'] . '">' . $row['naam'] . '</option>';
                   // }
              //} else {
               //     echo '<option value="">Geen luchthavens gevonden</option>';
                //}
            ?>
        </select><br>

        <label for="max_aantal">Maximaal aantal passagiers:</label>
        <input type="number" id="max_aantal" name="max_aantal" required><br>

        <label for="max_gewicht_pp">Maximaal gewicht per persoon (kg):</label>
        <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required><br>

        <label for="max_totaalgewicht">Maximaal totaalgewicht (kg):</label>
        <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required><br>

        <label for="vertrektijd">Vertrektijd:</label>
        <input type="datetime-local" id="vertrektijd" name="vertrektijd" required><br>

        <label for="maatschappijcode">Maatschappijcode:</label>
        <select id="maatschappijcode" name="maatschappijcode" required>
            <option value="">Selecteer maatschappij</option>
            <?php
                   // Eenmalige aanroep naar de DB
                  // require_once '../dbconnectie.php'

                   // Maak connectie met DB
                  //$db = maakVerbinding();
  
                  // SQL Query voor selecteer Luchthaven
                  //$query 'select maatschappijcode, naam FROM Maatschappij;';
                  //$data = $db-> query($query)
  
                  //if ($result->num_rows > 0) {
                    //while ($row = $result->fetch_assoc()) {
                      //  echo '<option value="' . $row['maatschappijcode'] . '">' . $row['naam'] . '</option>';
                      //}
                //} else {
                  //    echo '<option value="">Geen maatschappijen gevonden</option>';
                  //}
               
            ?>
        </select> <br>
                  <p>
                    
        <button type="submit">Vlucht toevoegen</button>
    </form>
        </div>
      </div>
    </div>
  </main>
  </body>
  <!-- Footer -->
  <footer>
    <p> 2024 Marianne Peterson S2136361</p>
  </footer>
</html>
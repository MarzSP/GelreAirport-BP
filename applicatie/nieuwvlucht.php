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
      <li><a href="nieuwevlucht.php">Nieuwe Vlucht</a></li>
      <li><a href="contact.php">Contact</a></li>
    </ul>
  </nav>

  <!-- Pagina vulling -->
  <main>
    <div class="container1">
      <div class="box">
        <div class="column1">
          <div class="logo">
            <img src="../Images/logomain.png" alt="GelreAirport Logo" width="200">
          </div>
        </div>
      </div>
      
      <div class="column2">
        <div class="text">
          <h1>Welkom bij GelreAirport!</h1>
          <p> Voer hier een nieuwe vlucht in.</p>
        </div>
      </div>
    </div>

    <div class="containerNieuweVlucht">
      <div class="left-box">

          <!-- Nieuwe Vlucht toevoegen-->
          <h1>Nieuwe Vlucht Toevoegen</h1>
    <form action="add_flight.php" method="post">
        <label for="vluchtnummer">Vluchtnummer:</label>
        <input type="text" id="vluchtnummer" name="vluchtnummer" required><br>

        <label for="luchthavencode">Luchthavencode:</label>
        <select id="luchthavencode" name="luchthavencode" required>
            <option value="">Selecteer luchthaven</option>
            <?php
                // Connect to the database
                //$db = new mysqli('localhost', 'sa', 'abc123!@#', 'GelreAirport');

                // Get all airports from the database
                //$sql = "SELECT luchthavencode, naam FROM Luchthaven";
                //$result = $db->query($sql);

                //if ($result->num_rows > 0) {
                  //  while ($row = $result->fetch_assoc()) {
                   //     echo '<option value="' . $row['luchthavencode'] . '">' . $row['naam'] . '</option>';
                   // }
               //} else {
                   // echo '<option value="">Geen luchthavens gevonden</option>';
               // }

                //$db->close();
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
                   //verbind met DB
                   //$db = new mysqli('localhost', 'sa', 'abc123!@#', 'GelreAirport');

                // Alle maatschappijcodes uit de DB
               // $sql = "SELECT maatschappijcode, naam FROM Maatschappij";
                //$result = $db->query($sql);

               // if ($result->num_rows > 0) {
                //    while ($row = $result->fetch_assoc()) {
                //       echo '<option value="' . $row['maatschappijcode'] . '">' . $row['naam'] . '</option>';
               //     }
               // } else {
               //     echo '<option value="">Geen maatschappijen gevonden</option>';
               // }

              //$db->close();
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
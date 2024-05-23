<!DOCTYPE html>
<html lang="en">
<main>
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
      <li><a href="index.php">Home</a></li>
      <li><a href="passagier.php">Checkin</a></li>
      <li><a href="vluchten.php">Vluchten</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="loginpassagier.php"><button type="button" class="shift-right">Log in</button></a></li>
    </ul>
  </nav>

  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Login voor Passagiers </p>
    </div>
  </section>

  <section class="inlog-sectie">
  <div class="inlog-formulier">
    <h2>Passagier: Login</h2>
    <form action="login.php" method="post">
      <label for="gebruikersnaam">Gebruikersnaam:</label>
      <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>

      <label for="wachtwoord">Wachtwoord:</label>
      <input type="password" id="wachtwoord" name="wachtwoord" required>

      <button type="submit">Inloggen</button>
    </form>
  </div>
</section>


<footer>
  <p> 2024 Marianne Peterson S2136361</p>
</footer>

</main>
</body>
</html>

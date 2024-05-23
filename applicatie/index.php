<?php
require_once 'db_connectie.php';
$db = maakVerbinding();
?>

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

<!-- Navigatie balk -->
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="passagier.php">Checkin</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li><a href="loginpassagier.php"><button type="button" class="shift-right">Log in</button></a></li>
      <li><a href="nieuwvlucht.php">Nieuwe Vlucht</a></li>
    </ul>
  </nav>
<main>
<body>
  <!-- Container: Pagina header(column1), en welkomst text(column2) -->
  
    <div class="container1">
        <div class="column1">
          <div class="logo">
            <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
        </div>
      </div>
      
      <div class="column2">
        <div class="text">
          <h1>Welkom bij GelreAirport!</h1>
          <p>Ontdek een wereld van mogelijkheden! Beheer uw boekingen, check online in, zoek aankomende en vertrekkende vluchten en nog veel meer! 
            <p>Uw avontuur begint hier - klaar voor vertrek?
        </div>
      </div>
    </div>

    <!--Container2 linker box met vluchtinformatie-->
    <div class="container2">
      <div class="left-box">
        <div class="Vlucht-info">
          <!-- Vluchtinfo hier -->
          <h3>Vlucht info </h3>
          <p>Hier komt vluchtinfo >> >> >> >> >> </p>
          <p> dat zal wat ruimte innemen >> >> >> >> >></p>
          <p> zoals hier, maar dan in een tabel</p>
          <p> met info uit een db </p> 
          <p> die iets van 10 vluchten weergeeft</p>
          <p> dus ook hier >> >> >> >> >> >> >> >> >> >> >></p> 
          <p> hoeveel vluchten wil je op een display?</p>
          <p> wss veel want aankomend en vertrekkend</p>
          <p> save some space for that</p>
        </div>
      </div>
    </div>
<!-- Container3 rechter box met overige informatie -->
    <div class="container3">
      <div class="right-box">
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
    </div>

    <div class="container4">
      <div class="center-box">
            <img src="../Images/logonobk.png" alt="GelreAirport Logo" width="100">
      </div>
    </div>

  
</body>
  <!-- Footer -->
  <footer>
    <p> 2024 Marianne Peterson S2136361</p>
  </footer></main>
</html>
<?php
include '../General/nav.php';
include '../General/footer.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/nav-header.css">  
  <link rel="stylesheet" href="../CSS/stylesheet.css">
  <link rel="stylesheet" href="../CSS/forms.css">
  <title>GelreAirport: Bereik meer!</title>
</head>

<body><main>
  <!-- Navigatie balk -->
  <?php
displayNav();
?>

  <!-- Pagina vulling -->
  <section class="pagina-header">
    <div class="column1">
            <div class="logo">
                <img src="../Images/logomain.png" alt="GelreAirport Logo" width="220">
            </div> 
    </div>
    <div class="column2">
     <h1>Welkom bij GelreAirport!</h1>
        <p> Wilt u contact met ons opnemen?</p>
    </div>
  </section>



    <div class="leftcontainer">
      <div class="left-box">
        <div class="Vlucht-info">
          <!-- Vluchtinfo hier -->
          <h3> Contact/Bezoek: </h3>
          <p> Adres: </p>
          <p>Ruitenberglaan 26</p>
          <p>6826CC</p>
          <p> Arnhem</p>
        
          <p> Mail: ms.peterson@student.han.nl</p>
          
        </div>
      </div>
    </div>


 <!-- Footer onderaan pagina -->
 <?php
 displayFooter();
      ?>
</main>
</body>
  </html>

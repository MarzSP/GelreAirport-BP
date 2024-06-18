<?php require_once "../includes.php" ?>
<?php redirectIfNotLoggedin() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/main.css">
    <title>GelreAirport</title>
</head>
<body>
<!-- Navigatie balk -->
<?php include '../Components/General/nav.php';?>

<main>
<!-- Pagina header(column1), en welkomst text(column2) -->
<?php include '../Components/General/header.php';?>


<section class="leftcontainer">

  <form action="../Controllers/passagier.php" method="post"> <h3>Passagier inchecken</h3>
      <label for="naam">Naam:</label><input type="text" id="naam" name="naam" pattern=" [a-zA-Z\-'\s]+" maxlength="50" required>
      <span class="message">Voer een naam in met letters.</span>
    <br>

      <label for="passagiernummer">Passagiernummer:</label><input type="text" id="passagiernummer" name="passagiernummer" pattern="[0-9]" maxlength="50" required>
      <span class="message">Voer de cijfers van het passagiersnummer in.</span>
    <br>

    <label for="vluchtnummer">Vluchtnummer:</label>
      <input type="text" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="5" required>
      <span class="message">Voer de cijfers van het vluchtnummer in.</span>
    <br>


      <h3>Bagage Informatie</h3>
      <?php
      $vluchtnummer = $_GET['vluchtnummer'] ?? ''; // Check if vluchtnummer exists in GET
      ?>
      <label for="gewicht">Gewicht bagage:</label>
                <?php
                $vluchtnummer = $_GET['vluchtnummer'] ?? '';
                if($vluchtnummer) {
                $data = getBaggageInfo($_GET['vluchtnummer']);
                for($i = 0; $i<$data['objecten']; $i++){
                    ?>
                    <input type="number" id="gewicht" name="gewicht[]" step="0.1" min="0" max="35">
                    <?php
                }
                ?><br>

      <button type="submit">Inchecken</button>
      <br>
  </form>

    <div id="inchecken-resultaat">
    </div>

    <?php }  ?>
</section>


<!-- Footer onderaan pagina -->
<?php include '../Components/General/footer.php';?>
</body>
</html>
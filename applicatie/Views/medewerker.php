<?php //require_once "../DB/sessionCheck.php" ?>

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
<?php include '../General/nav.php';?>

<main>
<!-- Pagina header(column1), en welkomst text(column2) -->

<?php include '../General/header.php';?>


  <!-- Linker box/formulier met Passagier toevoegen -->
  <section class="container-wrapper">
  <section class="leftcontainer">
  <form action="process_baggage.php" method="post"> <h3>Passagier inchecken</h3>
    <label for="name">Naam:</label>
      <input type="text" id="naam" name="naam" pattern=" [a-zA-Z\-'\s]+" maxlength="50" required>
      <span class="message">Voer een naam in met letters.</span>
    <br>

    <label for="name">Passagiernummer:</label>
      <input type="text" id="passagiernummer" name="passagiernummer" pattern="[a-zA-Z0-9]" maxlength="50" required>
      <span class="message">Voer de cijfers van het passagiersnummer in.</span>
    <br>

    <label for="vluchtnummer">Vluchtnummer:</label>
      <input type="text" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="5" required>
      <span class="message">Voer de cijfers van het vluchtnummer in.</span>
    <br>

    <label for="inchecktijdstip">Inchecktijdstip:</label>
      <select id="hours" name="hour">
      <option value="">Uur</option>
        <?php for ($i = 1; $i <= 12; $i++) : ?>
      <option value="<?= $i ?>"><?= $i ?></option>
        <?php endfor; ?>
      </select>
      <select id="minutes" name="minute">
      <option value="">Minuten</option>
      <?php for ($i = 0; $i <= 59; $i += 5): ?>
        <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>"><?= str_pad($i, 2, '0', STR_PAD_LEFT) ?></option>
      <?php endfor; ?>
      </select>
      <select id="ampm" name="ampm">
      <option value="">AM/PM</option>
      <option value="AM">AM</option>
      <option value="PM">PM</option>
      </select>
    <br>
      <h3>Bagage Informatie</h3>
      <label for="num_bags">Aantal baggage:</label>
      <input type="number" id="num_bags" name="num_bags" min="0" max="7" required>
      <span class="message">Voer in cijfers het aantal stuks baggage in.</span>
      <br>
        
      <label for="num_bags">Gewicht baggage:</label>
      <input type="number" id="gewicht" name="gewicht" min="0" max="70" required>
      <span class="message">Voer in cijfers het aantal kilo baggage in.</span>
      <br>
        <div id="bag_details"> </div>
        <button type="submit">Inchecken</button>
    </form> </section>
  
  <!-- Vlucht gegevens ophalen box/formulier -->
  <section class="rightcontainer">
        <h3>Vluchtgegevens Ophalen</h3>
        <form action="" method="post" id="vluchtnummer">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="text" id="vluchtnummer" name="vluchtnummer" required>
            <span class="error-message"></span>
            <br>
            <button type="submit">Zoek Vlucht</button>
        </form>

        <!-- Include the controller to process and display flight data -->
        <?php include '../Controllers/staffVluchtinfoController.php'; ?>
    </section>
</section>


</body>
<!-- Footer onderaan pagina -->
<?php include '../General/footer.php';?>
</html>

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



  <!-- Vlucht gegevens ophalen op vluchtnummer formulier -->
  <section class="container4">
        <h3>Vluchtgegevens Ophalen: Vluchtnummer</h3>
        <form action="" method="post" id="vluchtnummer">
            <label for="vluchtnummer">Vluchtnummer:</label>
            <input type="text" id="vluchtnummer" name="vluchtnummer" required>
            <span class="error-message"></span>
            <br>
            <button type="submit">Zoek Vlucht</button>
            <?php include '../Controllers/_staff_vluchtinfo.php'; ?>
        </form>
      </section> 

<!-- Vlucht gegevens ophalen op Luchthaven formulier -->
      <section class="container4">
    <h3>Vluchtgegevens Ophalen: Luchthaven</h3>
    <form action=" " method="post" id="luchthaven">
        <label for="luchthaven">Luchthavennaam:</label>
        <input type="text" id="luchthaven" name="luchthaven" required>
        <span class="error-message"></span>
        <br>
        <button type="submit">Zoek op luchthaven</button>
        <?php include '../Controllers/_staff_zoekluchthaven.php'; ?>
    </form>

      </section>

<!-- Vlucht gegevens ophalen op Vertrektijd formulier -->
    <section class="container4">
    <h3>Vluchtgegevens Ophalen: Datum & Tijd</h3>
    <form action="" method="post">
        <label for="datum">Datum:</label>
        <input type="date" id="datum" name="datum">

        <label for="tijdstip">Tijdstip:</label>
        <input type="time" id="tijdstip" name="tijdstip"> <p>

        <button type="submit">Zoeken op Datum & Tijd </button>
    </form>
    <?php include '../Controllers/_staff_zoekdatum.php'; ?> 
</section>



</body>
<!-- Footer onderaan pagina -->
<?php include '../Components/General/footer.php';?>

</html>

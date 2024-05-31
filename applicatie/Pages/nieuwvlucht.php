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


<section class="leftcontainer">
<?php include '../Controllers/nieuwvluchtController.php'; ?>
    <!-- Formulier: Nieuwe Vlucht toevoegen-->
    <h2>Nieuwe Vlucht Toevoegen</h2>
    <form action="includes/../DB/db_connectie.php" method="post">
        <label for="vluchtnummer">Vluchtnummer:</label>
        <input type="number" id="vluchtnummer" name="vluchtnummer" pattern="[0-9]{1,15}" maxlength="15" required><br>

        <label for="Luchthaven">Luchthaven:</label>
        <input type="varchar" id="Luchthaven" name="vlucLuchthaven" pattern="a-zA-Z" maxlength="35" required><br>

        <label for="max_aantal">Maximaal aantal passagiers:</label>
        <input type="number" id="max_aantal" name="max_aantal" pattern="[0-9]{1,15}" maxlength="5000" required><br>

        <label for="max_gewicht_pp">Maximaal gewicht per persoon (kg):</label>
        <input type="number" id="max_gewicht_pp" name="max_gewicht_pp" required><br>

        <label for="max_totaalgewicht">Maximaal totaalgewicht (kg):</label>
        <input type="number" id="max_totaalgewicht" name="max_totaalgewicht" required><br>

        <label for="vertrektijd">Vertrektijd:</label>
        <input type="datetime-local" id="vertrektijd" name="vertrektijd" required><br>

        <label for="maatschappijcode">Maatschappijcode:</label>
        <select id="maatschappijcode" name="maatschappijcode" required>
            <option value="">Selecteer maatschappij </option>
            <?php echo $selectbox; ?> </option>
        </select><br>

        <button type="submit">Vlucht toevoegen</button>
    </form>
</section>
</main>

<!-- Footer onderaan pagina -->
<?php include '../General/footer.php';?>
</body>
</html>

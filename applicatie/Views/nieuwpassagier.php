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


<section class="leftcontainer">
<?php // include Controller nieuwe passagier ?>
    <!-- Formulier: Nieuwe Passagier toevoegen -->
    <h2>Nieuwe Passagier toevoegen</h2>
    <form action="includes/../DB/db_connectie.php" method="post">
        <label for="naam ">Naam</label>
        <input type="varchar" id="naam" name="naam" pattern="a-zA-Z" maxlength="35" required><br>

        <label for="Geslacht">Geslacht:</label>
        <select id="Geslacht" name="Geslacht" required>
            <option value="">M </option>
            <option value="">V </option>
            <option value="">X </option>
        </select><br>
        <button type="submit">Passagier toevoegen</button>
    </form>
</section>
</main>

<!-- Footer onderaan pagina -->
<?php include '../General/footer.php';?>
</body>
</html>

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

<body>
<!-- Navigatie balk -->
<?php include '../Components/General/nav.php'; ?>

<main>

    <!-- Pagina General/(column1), en welkomst text(column2) -->

    <?php include '../Components/General/header.php';

    if (isset($_GET['vluchtnummer'])) {
    ?>
        <div class="container4">
            <h2>Inchecken</h2>
            <p>Check hier online in en bekijk uw bagage-informatie.</p>
            <form id="inchecken-form" action="inchecken.php" method="post">
                <!-- <input type="hidden" name="csrf_token" value="<?php //echo htmlspecialchars($_SESSION['csrf_token']); ?>"> -->
                <label for="vluchtnummer">Vluchtnummer:</label>
                <input id="vluchtnummer" name="vluchtnummer"
                       readonly required value="<?= $_GET['vluchtnummer']?>">
                <span class="message">Voer de cijfers van het vluchtnummer in.</span>
                <br>

                <label for="aantal-stukken">Aantal stuks bagage (max 2):</label>
                <input type="number" id="aantal-stukken" name="aantal-stukken" min="0" max="2" required>
                <span class="message">Voer in cijfers het aantal stuks baggage in.</span>
                <br>

                <label for="gewicht">Gewicht bagage (max 30 kg):</label>
                <input type="number" id="gewicht" name="gewicht" step="0.1" min="0" max="30" required>
                <br>

                <button type="submit">Inchecken</button>
                <br>

            </form>

            <div id="inchecken-resultaat">
            </div>
        </div>
    <?php } else { ?>
        <div class="container4">
            <?php
            include '../Controllers/_boekingbekijken.php';
            include '../Components/General/vluchtinformatie.php';
            if ($_SESSION['rol'] === 'passagier') {
                $boeking = getPassengierBoeking();
            } ?>
            <h2>Mijn Boekingen</h2>
            <?php
            $data = getPassengierBoeking();
            if (count($data)) {
                renderVluchtInformatieTabel($data, '/Views/passagier.php?vluchtnummer=');
            } else { ?>
                <p>U heeft momenteel geen aankomende vluchten.</p>
            <?php } ?>
        </div>

    <!-- Footer onderaan pagina -->
    <?php
    }
    include '../Components/General/footer.php'; ?>
</main> <!-- moet onder General/ zodat achtergrond afbeelding meestrekt tot onderkant -->
</body>

</html>

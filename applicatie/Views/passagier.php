<?php require_once "../includes.php"; ?>
<?php redirectIfNotLoggedin(); ?>

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
<?php include '../Components/General/nav.php'; ?>

<main>
    <!-- Pagina Passagier: Als er boekingen zijn worden deze displayed, als niet, dan staat er alleen dat er geen boekingen zijn. -->
    <?php include '../Components/General/header.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Controller doet deze
    } else if (isset($_GET['vluchtnummer'])) { ?>
        <div class="container4">
            <h2>Inchecken</h2>
            <p>Check hier online in en voeg uw bagage gegevens toe.</p>
            <form id="inchecken-form" action="../Controllers/passagier.php" method="post">
                <label for="vluchtnummer">Vluchtnummer:</label>
                <input id="vluchtnummer" name="vluchtnummer" readonly required value="<?= htmlspecialchars($_GET['vluchtnummer']) ?>">
                <br><br>
                <label for="gewicht">Gewicht bagage:</label>
                <?php
                require_once '../DB/checkin.php';
                $data = getBaggageInfo($_GET['vluchtnummer']);
                for ($i = 0; $i < $data['objecten']; $i++) {
                    ?>
                    <input type="number" id="gewicht" name="gewicht[]" step="0.1" min="0" max="35"><br>
                    <?php
                }
                ?><br>
                <button type="submit">Inchecken</button><br>
            </form>

            <?php if (isset($_SESSION['foutmelding'])) { ?>
                <p class="foutmelding"><?= htmlspecialchars($_SESSION['foutmelding']); unset($_SESSION['foutmelding']); ?></p>
            <?php } elseif (isset($_SESSION['succesmelding'])) { ?>
                <p class="succesmelding"><?= htmlspecialchars($_SESSION['succesmelding']); unset($_SESSION['succesmelding']); ?></p>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="container4">
            <?php
            include '../Components/General/vluchtinformatie.php';
            include '../DB/checkin.php';
            $data = getPassagierBoekingen($_SESSION['gebruikersnaam']);
            ?>
            <h2>Mijn Boekingen</h2>
            <p>Bekijk hier uw aankomende boekingen. Klik op het vluchtnummer om in te checken!</p>
            <?php
            if (count($data)) {
                renderVluchtInformatieTabel($data, '/Views/passagier.php?vluchtnummer='); // Deze zit in Components/vluchtinformatie.php om herbruikbare code te maken.
            } else { ?>
                <p>U heeft momenteel geen aankomende vluchten.</p>
            <?php } ?>
        </div>
    <?php } ?>
    <?php include '../Components/General/footer.php'; ?>
</main>
</body>
</html>

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
<?php include '../Components/General/nav.php'; ?>

<main>
    <!-- Pagina Passagier: Als er boekingen zijn worden deze displayed, als niet, dan staat er alleen dat er geen boekingen zijn. -->
<?php include '../Components/General/header.php';

include '../Controllers/passagier.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // ToDo; check in
        $vluchtnummer = $_POST['vluchtnummer'];
        $gewichten = $_POST['gewicht'];
        $passagiernummer = $_SESSION['gebruikersnaam'];

        foreach ($gewichten as $key => $gewicht) {
            $gewichten[$key] = floatval($gewicht);
        }
        $data = getBaggageInfo($vluchtnummer);
        $maxObjecten = $data['objecten'];
        $maxGewicht = $data['pp'];

        // ToDo; check max weight
        $totaalGewicht = array_sum($gewichten);
         if ($totaalGewicht > $maxGewicht) {
                    echo "<p>Het totale gewicht overschrijdt het limiet van {$maxGewicht} kg.</p>";
                } elseif (count($gewichten) > $maxObjecten) {
                    echo "<p>Het aantal objecten overschrijdt het limiet van {$maxObjecten}.</p>";
                } else {
        // ToDo; check if count of gewichten is allowed
        foreach ($gewichten as $key => $gewicht) {
            if ($gewicht >= 0) {
                addBaggage($_SESSION['gebruikersnaam'], $key, $gewicht);
            }

        } echo "<p> U bent ingechecked!</p>";

}
    } else if (isset($_GET['vluchtnummer'])) {
    ?>
        <div class="container4">
            <h2>Inchecken</h2>
            <p>Check hier online in en voeg uw bagage gegevens toe.</p>
            <form id="inchecken-form" action="" method="post">
                <!-- <input type="hidden" name="csrf_token" value="<?php //echo htmlspecialchars($_SESSION['csrf_token']); ?>"> -->
                <label for="vluchtnummer">Vluchtnummer:</label>
                <input id="vluchtnummer" name="vluchtnummer"
                       readonly required value="<?= $_GET['vluchtnummer']?>">
                <br>
                <br>
                <label for="gewicht">Gewicht bagage:</label>
                <?php
                $data = getBaggageInfo($_GET['vluchtnummer']);
                for($i = 0; $i<$data['objecten']; $i++){
                    ?>
                    <input type="number" id="gewicht" name="gewicht[]" step="0.1" min="0" max="35"><br>
                    <?php
                }
                ?><br>

                <button type="submit">Inchecken</button>
                <br>
            </form>

            <div id="inchecken-resultaat">
            </div>
        </div>
    <?php } else { ?>
        <div class="container4">
            <?php
            include '../Components/General/vluchtinformatie.php';
            ?>
            <h2>Mijn Boekingen</h2>
            <p> Bekijk hier uw aankomended boekingen. Klik op het vluchtnummer om in te checken!</p>
            <?php
            $data = getPassengierBoeking();
            if (count($data)) {
                renderVluchtInformatieTabel($data, '/Views/passagier.php?vluchtnummer='); // Deze zit in Components/vluchtinformatie.php om herbruikbare code te maken.
            } else { ?>
                <p>U heeft momenteel geen aankomende vluchten.</p>
            <?php } ?>
        </div>

    <?php
    }
    include '../Components/General/footer.php'; ?>
</main>
</body>

</html>

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
<?php include '../Components/General/nav.php';
include '../Components/General/formIncheck.php';
include '../Components/General/vluchtinformatie.php';
?>

<main>
    <!-- Pagina Passagier: Als er boekingen zijn worden deze displayed, als niet, dan staat er alleen dat er geen boekingen zijn. -->
    <?php include '../Components/General/header.php'; ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Controller doet deze
    } else if (isset($_GET['vluchtnummer'])) {
        renderFormInCheck("passagier");
    } else { ?>
        <div class="container4">
            <?php
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

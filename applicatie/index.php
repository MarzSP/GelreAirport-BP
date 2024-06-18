<?php
//ToDo: Marz: CSS Success bericht + error bericht kleuren

//ToDo: (!)Fix error messages nieuwpassagier.php
//ToDo: (!)nieuwpassagier.php: als passagier successvol toegevoegd dan terug naar view met success melding
//ToDo: (!)staffcheckin.php: Passagier inchecken met baggage + inchecktijdstip + stoel
//ToDo: (!)passagier.php: Stoel bij inchecken + inchecktijdstip

//ToDo: (!)User-Story OG-01: Ik wil dat er niet meer passagiers in het vliegtuig worden ingechecked dan dat er plaats is
//ToDo: (!)User-Story OG-02: Ik wil dat het totale gewicht aan baggage niet het maximum van de vlucht overtreft

?>

<?php require_once "includes.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/main.css">
    <title>GelreAirport</title>
</head>

<body>

<!-- Navigatie balk -->
<?php include 'Components/General/nav.php'; ?>

<main>

    <!-- Pagina header(column1), en welkomst text(column2) -->
    <?php include 'Components/General/header.php'; ?>


    <!-- Container-Wrapper = gridbox waar left en right container inzitten
    Container2 linker box met vluchtinformatie-->

    <section class="container-wrapper">
        <div class="leftcontainer">

            <!-- Vluchtinfo hier -->
            <h1> Vertrekkende vluchten: </h1>

            <!-- Zoekformulier -->
            <form method="GET" action="">
                <label>
                    <input type="text" name="zoekVluchtnummer" placeholder="Zoek vluchtnummer"
                           value="<?php echo htmlspecialchars($_GET['zoekVluchtnummer'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                </label>
                <button type="submit">Zoek op vluchtnummer</button>
            </form>

            <?php
            include 'Controllers/vluchtinfo.php';
            include 'Components/General/vluchtinformatie.php';
            $data = getVluchtInformatie($_GET['zoekVluchtnummer'] ?? '');
            renderVluchtInformatieTabel($data, null);
            ?>
        </div>

        <!-- Right container box met Algemene informatie -->
        <div class="rightcontainer">
            <div class="Algemeneinfo">
                <h1>Algemene Informatie</h1>
                <!-- De onderdelen van Algemene informatie in een lijst -->
                <section class="inchecken">
                    <h3>Inchecken</h3>
                    <ul>
                        <li>Online inchecken kan 24 uur - 2 uur voor vertrek</li>
                        <li>Inchecken bij de luchthaven kan 2 uur voor vertrek</li>
                    </ul>
                </section>

                <section class="vluchtinformatie">
                    <h3>Vluchtinformatie</h3>
                    <ul>
                        <li>Bekijk op deze website: Aankomende & vertrekkende vluchten</li>
                    </ul>
                </section>

                <section class="bagage">
                    <h3>Bagage</h3>
                    <p>Check online of bij de balie uw bagage in. Gewicht en aantal toegestane stuks bagage kan per
                        maatschappij verschillen. Raadpleeg de website van de luchtvaartmaatschappij voor de exacte
                        regels en voorschriften.</p>
                </section>


                <section class="tips">
                    <h3>Tips</h3>
                    <ul>
                        <li>Kom op tijd naar luchthaven!</li>
                        <li>Neem uw reisdocumenten mee</li>
                    </ul>
                </section>

                <p class="afsluiting">Fijne reis!</p>
            </div>
        </div>
    </section>


<!-- Footer onderaan pagina -->
    <?php include 'Components/General/footer.php'; ?>

</main> <!-- </main> moet onder Footer, zo strekt de achtergrond afbeedling totaan de onderkant van de pagina -->
</body>
</html>
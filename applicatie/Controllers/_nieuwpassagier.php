<?php
/* Code is veilig gemaakt door middel van: Filter_input, santize input, prepared statements, htmlspecialchars ren PDO::data-type */
include '../DB/nieuw_passagier.php';
include '../DB/passagiernummer.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passagiernummer = htmlspecialchars($_POST['passagiernummer'], ENT_QUOTES, 'UTF-8');
    $naam = htmlspecialchars($_POST['naam'], ENT_QUOTES, 'UTF-8');
    $vluchtnummer = htmlspecialchars($_POST['vluchtnummer'], ENT_QUOTES, 'UTF-8');
    $geslacht = htmlspecialchars($_POST['geslacht'], ENT_QUOTES, 'UTF-8');
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);

    if (valideerPassagierInvoer($passagiernummer, $naam, $vluchtnummer, $geslacht, $wachtwoord)) {
        if (slaPassagierOp($passagiernummer, $naam, $vluchtnummer, $geslacht, $wachtwoord)) {
            echo "Passagier succesvol toegevoegd met nummer: " . $passagiernummer;
        } else {
            echo "Fout bij het opslaan van passagiergegevens";
        }
    } else {
        echo "<ul>";
        foreach ($foutmeldingen as $foutmelding) {
            echo "<li>" . $foutmelding . "</li>";
        }
        echo "</ul>";
    }
}

$db = maakVerbinding();
$passagiernummer = getNextPassagiernummer($db);

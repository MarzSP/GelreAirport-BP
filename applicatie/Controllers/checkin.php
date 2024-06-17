<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
        // ToDo; check in
    $naam = $_POST['naam'];
    $vluchtnummer = $_POST['vluchtnummer'];
    $passagiernummer = $_SESSION['gebruikersnaam'];
    $gewichten = $_POST['gewicht'];
    $inchecktijdstip = date('Y-m-d H:i:s');

        foreach ($gewichten as $key => $gewicht) {
            $gewichten[$key] = floatval($gewicht);
        }
        $data = getBaggageInfo($vluchtnummer);
        $maxObjecten = $data['objecten'];
        $maxGewicht = $data['pp'];

        // ToDo; check max weight
        $totaalGewicht = array_sum($gewichten);
         if ($totaalGewicht > $maxGewicht) {
                    echo "<p>Het totale gewicht overschrijdt het limiet van $maxGewicht kg.</p>";
                } elseif (count($gewichten) > $maxObjecten) {
                    echo "<p>Het aantal objecten overschrijdt het limiet van $maxObjecten.</p>";
                } else {
        // ToDo; check if count of gewichten is allowed
        foreach ($gewichten as $key => $gewicht) {
            if ($gewicht >= 0) {
                addBaggage($_SESSION['gebruikersnaam'], $key, $gewicht);
            }

        }
             // Update inchecktijdstip in passagiertabel
             passagierInchecktijdstip($passagiernummer, $inchecktijdstip);


             echo "<p>Passagier $naam is ingechecked op $inchecktijdstip!</p>";
    }
}

    
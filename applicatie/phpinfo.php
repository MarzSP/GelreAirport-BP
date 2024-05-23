<?php
phpinfo();
<?php
    // Connect to the database
    $db = new mysqli('localhost', 'sa', 'abc123!@#', 'GelreAirport);

    // Get form data
    $vluchtnummer = $_POST['vluchtnummer'];
    $luchthavencode = $_POST['luchthavencode'];
    $max_aantal = $_POST['max_aantal'];
    $max_gewicht_pp = $_POST['max_gewicht_pp'];
    $max_totaalgewicht = $_POST['max_totaalgewicht'];
    $vertrektijd = $_POST['vertrektijd'];
    $maatschappijcode = $_POST['maatschappijcode'];

    // Insert new flight into the database
    $sql = "INSERT INTO Vlucht (vluchtnummer, luchthavencode, max_aantal, max_gewicht_pp, max_totaalgewicht, vertrektijd, maatschappijcode) VALUES ('$vluchtnummer', '$luchthavencode', '$max_aantal

?>
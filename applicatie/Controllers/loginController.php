<?php
require_once '../DB/data_user.php';
//require_once '../DB/sessionCheck.php';

session_start();

$error = ''; 
$html = ''; 

if (isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $login = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Haal user_data uit de rol van een gebruiker.
    $gebruikersnaam = getMedewerker($login) ?: getPassagier($login);

    if ($gebruikersnaam) {
        // Controlleer dat deze gebruiker bestaat, en het correcte wachtwoord invoert.
        if (isset($gebruikersnaam['wachtwoord']) && password_verify($wachtwoord, $gebruikersnaam['wachtwoord'])) {
            unset($wachtwoord); // Unset wachtwoord voor de veiligheid.

            // Wie is de user Rol en geeft instructie voor ieder soort rol.
            $rol = $gebruikersnaam['rol']; 
            if ($rol === 'passagier') {
                $_SESSION['gebruikersnaam'] = $gebruikersnaam['login'];
                $target_url = "passagier.php";
                $_SESSION['loggedIn'] = false;
            } else if ($rol === 'baliemedewerker') {
                $_SESSION['baliemedewerker'] = $gebruikersnaam['login'];
                $target_url = "medewerker.php";
                $_SESSION['loggedIn'] = true;
            } else {
                $error = "Onbekende gebruikersrol: " . $rol; // Wat er gebeurt als er een geen rol is gevonden.
            }

            if (!$error) { // If no errors occurred
                var_dump("Login: " . $gebruikersnaam['login']);
                header("Location: $target_url"); // Breng de gebruiker naar de correcte pagina
                exit();
            } else {
        $error = "Ongeldige gebruikersnaam of wachtwoord"; // Ongeldig inlog meuk
    }
}
    }

if (!empty($error)) {
    $html = "<p> Error: $error</p>"; // Display error message
}
}

echo $html; // Output HTML content



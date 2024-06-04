<?php
require_once '../DB/data_user.php';
//require_once '../DB/sessionCheck.php';

session_start();

$error = ' ';
$html = ' ';

if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $login = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    $gebruikersnaam = getPassagier($login) ?: getMedewerker($login);
    var_dump($gebruikersnaam);


 // Controlleer of gebruiker passagier is
 if ($gebruikersnaam && password_verify($wachtwoord, $gebruikersnaam['wachtwoord'])) {
    var_dump("Login for user: " . $gebruikersnaam['login']);
     unset($wachtwoord);

     $_SESSION['gebruikersnaam'] = $gebruikersnaam;
     $target_url = "passagier.php";
     header("Location: $target_url"); // Ga naar passagiers pagina
     $_SESSION['loggedIn'] = false; 
     exit();
 } else {
 // Controlleer of gebruiker medewerker is
 if ($gebruikersnaam && password_verify($wachtwoord, $gebruikersnaam['wachtwoord'])) {
    var_dump("Successful login for user: " . $gebruikersnaam['login']);
     unset($wachtwoord);
     $_SESSION['baliemedewerker'] = $gebruikersnaam['balienummer'];
     $target_url = "medewerker.php";
     header("Location: $target_url"); // Ga naar medewerkers pagina
     $_SESSION['loggedIn'] = true; 
     exit();
 }

// Als login niet lukt
if(!empty($serror)) {
    $html = "<p> Error: Ongeldige naam of wachtwoord</p>" ;
}
}
}


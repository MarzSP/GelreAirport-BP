<?php
require_once '../DB/data_user.php';
require_once '../DB/session.php';

session_start();

$error = ' ';
$html = ' ';

if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
    $login = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $gebruikersnaam = getPassagier($login) OR getMedewerker($login);


 // Controlleer of gebruiker passagier is
 if ($gebruikersnaam && password_verify($wachtwoord, $gebruikersnaam['wachtwoord'])) {
     unset($wachtwoord);
     $_SESSION['gebruikersnaam'] = $gebruikersnaam;
     $target_url = "passagier.php";
     header("Location: $target_url"); // Ga naar passagiers pagina
     $_SESSION['loggedIn'] = true; 
     exit();
 }

 // Controlleer of gebruiker medewerker is
 if ($gebruikersnaam && password_verify($wachtwoord, $gebruikersnaam['wachtwoord'])) {
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


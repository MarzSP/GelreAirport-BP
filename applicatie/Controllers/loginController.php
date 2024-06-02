<?php
require_once '../DB/data_user.php';
session_start();

$error = ' ';
$html = ' ';

if(isset($_POST['naam']) && isset($_POST['wachtwoord'])) {
    $gebruikersnaam = $_POST['naam'];
    $wachtwoord = $_POST['wachtwoord'];

    // Debugging
       error_log("Received gebruikersnaam: $gebruikersnaam");
       error_log("Received wachtwoord: $wachtwoord");


 // Controlleer of gebruiker medewerker is
 $user = getPassengier($gebruikersnaam);
 if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
     unset($wachtwoord);
     $_SESSION['user'] = $user['naam'];
     error_log("Redirecting to passagier.php");
     header('Location: /Views/passagier.php'); // Ga naar passagiers pagina
     exit();
 }

 // Controlleer of gebruiker passagier is
 $user = getMedewerker($gebruikersnaam);
 if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
     unset($wachtwoord);
     $_SESSION['user'] = $user['balienummer'];
     error_log("Redirecting to medewerker.php");
     header('Location: /Views/medewerker.php'); // Ga naar medewerkers pagina
     exit();
 }

// Als login niet lukt
$error = "Ongeldige naam of wachtwoord!";
error_log("Login failed: $error");
}

?>
  

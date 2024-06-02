<?php
    require_once '../DB/data_user.php';


    $error = ' ';
    $html = ' ';

    if(isset($_POST['naam']) && isset($_POST['wachtwoord'])) {
        $login = $_POST['naam'];
        $wachtwoord = $_POST['wachtwoord'];
        $user = getUser($gebruikersnaam);


 // Controlleer of gebruiker medewerker is
 $user = getPassengier($login);
 if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
     unset($wachtwoord);
     $_SESSION['user'] = $user['naam'];
     header('Location: /Pages/passagier.php'); // Ga naar passagiers pagina
     exit();
 }

 // Controlleer of gebruiker passagier is
 $user = getMedewerker($login);
 if ($user && password_verify($wachtwoord, $user['wachtwoord'])) {
     unset($wachtwoord);
     $_SESSION['user'] = $user['balienummer'];
     header('Location: /Pages/medewerker.php'); // Ga naar medewerkers pagina
     exit();
 }

// Als login niet lukt
$error = "Ongeldige naam of wachtwoord!";
}

?>
  

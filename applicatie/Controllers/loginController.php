<?php
    require_once '../DB/data_user.php';


    $error = ' ';
    $html = ' ';

    if(isset($_POST['naam']) && isset($_POST['wachtwoord'])) {
        $login = $_POST['naam'];
        $wachtwoord = $_POST['wachtwoord'];
        $user = getUser($gebruikersnaam);

        if($user && password_verify($wachtwoord, $user['wachtwoord'])){
            unset($wachtwoord);
            $_SESSION['user'] = $user['naam'];
            header('Location: /Pages/passagier.php');
        } else {
            $error = " Ongeldige naam of wachtwoord voor $gebruikersnaam!";
        }
    }

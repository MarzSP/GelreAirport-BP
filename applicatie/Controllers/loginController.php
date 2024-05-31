<?php
    require_once '../DB/db_connectie.php';

    $error = ' ';
    $html = ' ';

    if(isset($_POST['gebruikersnaam']) && isset($_POST['wachtwoord'])) {
        $login = $_POST['gebruikersnaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $user = getUser($login);

        if($user && password_verify($wachtwoord, $user['password'])){
            unset($wachtwoord);
            $_SESSION['user'] = $user;
            header('Location: /');
        } else {
            $error = " Ongeldige naam of wachtwoord voor $login!";
        }
    }

    if(!empty($error)) {
        $html ="<p class=\"error\">($error)<p>";
    }
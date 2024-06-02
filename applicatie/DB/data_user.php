<?php
declare(strict_types=1);

    function getUser($gebruikersnaam){ 
      global $verbinding;
      require_once '../../DB/db_connectie.php';
      $query = $verbinding->prepare('SELECT naam, wachtwoord FROM Passagier WHERE naam = :gebruikersnaam');
      $query->execute([':gebruikersnaam' => $gebruikersnaam]);
      return $query->fetch();
    }


function createUser(User $gebruikersnaam) {
    global $verbinding;
    require_once '../DB/db_connectie.php';
    $hash = password_hash($gebruikersnaam->password, PASSWORD_DEFAULT);
    unset($wachtwoord);

    try{
        $query = $verbinding ->prepare("INSERT INTO Passagier (naam, wachtwoord) VALUES (?, ?)");
        $result = $query->execute([$gebruikersnaam->naam, $hash]);
    }
    catch (PDOException $ex){
        throw new Exception($ex->getMessage());
}
return $result;
}
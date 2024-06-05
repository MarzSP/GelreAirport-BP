<?php
declare(strict_types=1);

include_once 'db_connectie.php';
function getPassagier($gebruikersnaam) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT passagiernummer, wachtwoord FROM Passagier WHERE passagiernummer = :gebruikersnaam');
        $query->execute([':gebruikersnaam' => $gebruikersnaam]);
        return $query->fetch();
    }
    
    function getMedewerker($balienummer) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT balienummer, wachtwoord FROM Balie WHERE balienummer = :gebruikersnaam');
        $query->execute([':gebruikersnaam' => $balienummer]);
        return $query->fetch();
    }


//function createUser(User $gebruikersnaam) {
  //  global $verbinding;
   // require_once '../DB/db_connectie.php';
    //$hash = password_hash($gebruikersnaam->password, PASSWORD_DEFAULT);
    //unset($wachtwoord);

   // try{
    //    $query = $verbinding ->prepare("INSERT INTO Passagier (naam, wachtwoord) VALUES (?, ?)");
    //   $result = $query->execute([$gebruikersnaam->naam, $hash]);
  //  }
  //  catch (PDOException $ex){
  //      throw new Exception($ex->getMessage());
//}
//return $result;
//}
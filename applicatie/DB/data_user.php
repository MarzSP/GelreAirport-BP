<?php
declare(strict_types=1);

function getPassagier($naam) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT naam, wachtwoord FROM Passagier WHERE naam = :naam');
        $query->execute([':naam' => $naam]);
        return $query->fetch();
    }
    
    function getMedewerker($balienummer) {
        global $verbinding;
        $query = $verbinding->prepare('SELECT balienummer, wachtwoord FROM Balie WHERE balienummer = :balienummer');
        $query->execute([':balienummer' => $balienummer]);
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
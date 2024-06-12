<!-- /includes/nav.php -->
<?php
$isLoggedin = isLoggedIn();
?>
    <nav> 
      <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../Views/passagier.php">Checkin</a></li>
          
          <?php if ($isLoggedin) { ?>
             <li><?= $_SESSION['rol'].':'.$_SESSION['gebruikersnaam'] ?>(<a href="../Views/logout.php">Logout</a>)</li>
          <?php } else { ?>
            <li><a href="../Views/login.php">Login</a></li>
          <?php } ?>
          <li><a href="../Views/Privacy.php">Privacy</a></li>
          <li><a href="../Views/medewerker.php">Medewerkertest</a></li>
          <li><a href="../Views/nieuwvlucht.php">nieuwvluchttest</a></li>
          <li><a href="../Views/nieuwpassagier.php">nieuwpassagiertest</a></li>
      </ul>
    </nav>
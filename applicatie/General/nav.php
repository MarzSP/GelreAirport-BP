<!-- /includes/nav.php -->
    <nav> 
      <ul>
          <li><a href="../index.php">Home</a></li>
          <li><a href="../Views/passagier.php">Checkin</a></li>
          <li><a href="../Views/contact.php">Contact</a></li>
          <li><a href="../Views/login.php"><button type="button" class="shift-right">Log in</button></a></li>
          <li><a href="../Views/medewerker.php">Medewerkertest</a></li>
          <li><a href="../Views/nieuwvlucht.php">nieuwvluchttest</a></li>
      </ul>
    </nav>


<?php 
/* session_start();
include("../Controllers/loginController.php") ?>

<nav>
  <ul>
    <li><a href="../index.php">Home</a></li>
    <li><a href="../Views/passagier.php">Checkin</a></li>
    <li><a href="../Views/contact.php">Contact</a></li>

    <?php if (isLoggedIn()) { ?>
      <li>
        <?php if (isset($_SESSION['gebruikersnaam'])) { ?>
          Ingelogd: Passagier (<?php echo $_SESSION['gebruikersnaam']; ?>)
        <?php } else if (isset($_SESSION['baliemedewerker'])) { ?>
          Ingelogd: Baliemedewerker (<?php echo $_SESSION['baliemedewerker']; ?>)
          <li><a href="../Views/medewerker.php">Medewerkertest</a></li>
         <li><a href="../Views/nieuwvlucht.php">nieuwvluchttest</a></li>
        <?php } ?>
      </li>

      <li><a href="../logout.php">Logout</a></li>
    <?php } else { ?>

      <li><a href="../Views/login.php"><button type="button" class="shift-right">Log in</button></a></li>
    <?php } ?>
    
   
  </ul>
</nav>*/
<?php require_once '../Controllers/loginController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="../Styles/main.css">
    <title>GelreAirport</title>
</head>

<body>
<!-- Navigatie balk -->
<?php include '../General/nav.php';?>

<main>
<!-- Pagina header(column1), en welkomst text(column2) -->

<?php include '../General/header.php';?>


  <!-- Inlog box -->
<section class="inlog-sectie">
<div class="inlog-formulier">
  <h2>Login</h2>
    <form method="post" action="">
      <label for="gebruikersnaam">Gebruikersnaam:</label>
      <input type="text" id="bgebruikersnaam" pattern="[a-zA-Z0-9]+" name="gebruikersnaam" required>
      <label for="wachtwoord">Wachtwoord:</label>
      <input type="wachtwoord" id="wachtwoord" name="wachtwoord" required>
      <button type="submit">Inloggen</button>
    </form>
  </div>
</section>

<!-- Footer onderaan pagina -->
<?php
include '../General/footer.php';
?>
</main>
</body>

</html>

<?php require_once "includes.php" ?>
<!DOCTYPE html>
<html lang="en">

<!-- To do
Login:
Rol baliemedewerker: Balienummers zijn gekoppeld aan luchthavenmaatschappijen waar ze die kunnen inchecken. Nav balk: niewvlucht, niewpassagier, home, logout
Rol passagier: Nav balk: Home, check-in, overzicht van boeking, logout



-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="../Styles/main.css">
    <title>GelreAirport</title>
</head>


<!-- Navigatie balk -->
<?php include 'Components/General/nav.php';?>


<!-- Pagina header(column1), en welkomst text(column2) -->
<?php include 'Components/General/header.php';?>
<body>
<main>

<!--Container2 linker box met vluchtinformatie-->
  <section class="container-wrapper">
    <div class="leftcontainer">
          <!-- Vluchtinfo hier -->
          <h1> Vertrekkende vluchten: </h1>

<!-- Zoekformulier -->
    <form method="GET" action="">
        <input type="text" name="zoekVluchtnummer" placeholder="Zoek vluchtnummer" value="<?php echo htmlspecialchars($_GET['zoekVluchtnummer'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit">Zoek op vluchtnummer</button>
    </form>
      <?php
      include 'Controllers/vluchtinfoController.php';
      include 'Components/General/vluchtinformatie.php';
      $data = getVluchtInformatie($_GET['zoekVluchtnummer'] ?? '');
      renderVluchtInformatieTabel($data, null);
      ?>
</div>

<!-- Container3 rechter box met Algemene informatie -->
    <div class="rightcontainer">
        <div class="Algemeneinfo">
          <h1>Algemene Informatie</h1>
<!-- De onderdelen van Algemene informatie in een lijst -->
<section class="inchecken">
  <h3>Inchecken</h3>
  <ul>
    <li>Online inchecken kan 24 uur - 2 uur voor vertrek </li>
    <li>Inchecken bij de luchthaven kan 2 uur voor vertrek</li>
  </ul>
</section>

<section class="vluchtinformatie">
  <h3>Vluchtinformatie</h3>
  <ul>
    <li>Bekijk op deze website: Aankomende & vertrekkende vluchten</li>
  </ul>
</section>

<section class="bagage">
  <h3>Bagage</h3>
  <p>Check online of bij de balie uw bagage in. Gewicht en aantal toegestane stuks bagage kan per maatschappij verschillen. Raadpleeg de website van de luchtvaartmaatschappij voor de exacte regels en voorschriften.</p>
</section>


<section class="tips">
  <h3>Tips</h3>
  <ul>
    <li>Kom op tijd naar luchthaven!</li>
    <li>Neem uw reisdocumenten mee</li>
  </ul>
</section>

<p class="afsluiting">Fijne reis!</p>
        </div>
    </div>
</section>

  
<!-- Footer onderaan pagina -->
<?php include 'Components/General/footer.php' ; ?>

</main> <!-- </main> moet onder Footer, zo strekt de achtergrond afbeedling totaan de onderkant van de pagina -->
</body>
</html>
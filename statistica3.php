<!DOCTYPE HTML>
<html>

<head>
	<?php include("connessione.php")?>
  <title>statistica3</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
  <?php include("navbar.php");

  include 'funzioni.php';
  ?>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-6">

        <?php
        lingue_piu_comuni();
        autore_scritto_piu_libri();
        editore_pubb_piu_libri();
        nati_NewY();
        ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-9">



        <?php
        utenti_ritardo();

        ?>
      </div>

    </div>

  </div>
  <div class="col" style="height: 300px;">

  </div>
  <?php include("footer.php") ?>
</body>

</html>

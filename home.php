<!DOCTYPE HTML>
<html>

<head>
<?php ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);?>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

  <?php include("navbar.php");
  require_once("funzioni.php");
  ?>


  <div class="container-fluid">
    <div class="row h-500">
      <div class="col-7" style="height: 100px; padding-top: 50px">
        <?php
        form_cerca(); ?>
      </div>

      <div class="col-4 " style="padding-top: 50px">
        Studenti in ritardo
        <?php recupera_ritardi(); ?>
        <p class="read-more"><a href="prestiti_attuali.php" type="button" button class="btn btn-secondary btn-sm">Mostra altro</a></p>

      </div>
      <div class="w-100"></div>
      <div class="col-7 align-self-end">

      </div>

      <div class="col-4 "><br>
        Statistiche
        <?php

        utenti_ritardo();
        nati_NewY();
        autore_scritto_piu_libri(); ?>
        <p class="read-more"><a href="statistica3.php" type="button" button class="btn btn-secondary btn-sm">Mostra altro</a></p>

      </div>
    </div>
  </div>
  <div class="col" style="height: 100px;">

  </div>
  <?php include("footer.php") ?>

</body>

</html>

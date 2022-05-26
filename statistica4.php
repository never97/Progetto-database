<!DOCTYPE HTML>
<html>

<head>

	<?php include("connessione.php")?>
  <title>statistica4</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

  <?php include("navbar.php"); ?>

  <?php include 'funzioni.php';
  stat4();
  ?>
  <div class="col" style="height: 300px;">

  </div>
  <?php include("footer.php") ?>

</body>

</html>

<!DOCTYPE HTML>
<html>

<head>

	<?php include("connessione.php")?>
  <title>Registra utente</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
  <?php include("navbar.php"); ?>

  <?php
  $status = "";
  if (isset($_POST['new']) && $_POST['new'] == 1) {
    $mat = $_REQUEST['Matricola'];
    $cognome = $_REQUEST['Cognome_utente'];
    $nome = $_REQUEST['Nome_utente'];
    $inizialisn = $_REQUEST['Iniziali_sn_utente'];
    $datanas = $_REQUEST['Data_n_utente'];

    $ins_query = "INSERT INTO UTENTE(Matricola, Cognome_utente, Nome_utente, Iniziali_sn_utente, Data_n_utente) VALUES('$mat', '$cognome', '$nome','$inizialisn','$datanas')";
    $result = mysqli_query($db, $ins_query);
    #or die(mysqli_error($db));


  }




  include("funzioni.php");
  registra_utente();



  if ($result) {
    $status = "Utente inserito correttamente nel sistema.";
  } else {
    echo "" . $ins_query . "<br>" . mysqli_error($db);
  }
  ?>


  <p class="text-danger text-center"><?php echo $status; ?></p>
  </div>
  </div>
  <div class="col" style="height: 300px;">

  </div>
  <?php include("footer.php") ?>

</body>

</html>

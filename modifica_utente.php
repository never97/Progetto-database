<!DOCTYPE HTML>
<html>

<head>
	
	<?php include("connessione.php")?>
    <title>Modifica utente</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <?php include("navbar.php");
    $Matricola = $_REQUEST['Matricola'];
    $query = "SELECT * FROM UTENTE where Matricola='" . $Matricola . "'";
    $result = mysqli_query($db, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
    ?>



    <?php
    $status = "";
    $stato = "";
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        #$trn_date = date("Y-m-d H:i:s");
        $mat = $_REQUEST['Matricola'];
        $cognome = $_REQUEST['Cognome_utente'];
        $nome = $_REQUEST['Nome_utente'];
        $inizialisn = $_REQUEST['Iniziali_sn_utente'];
        $datanas = $_REQUEST['Data_n_utente'];

        $update = "UPDATE UTENTE SET Matricola='" . $mat . "',Cognome_utente='" . $cognome . "', 
Nome_utente='" . $nome . "', Iniziali_sn_utente='" . $inizialisn . "',Data_n_utente='" . $datanas . "' WHERE Matricola='" . $mat . "'";
    ?><div class="container p-4"><?php
                                    mysqli_query($db, $update) or die(mysqli_error($db));
                                    $status = "Informazioni utente aggiornate.</br></br>
<a href='vista_utenti_princ.php'>Vedi record inseriti</a>";
                                    echo '<p class="text-danger text-center">' . $status . '</p>';
                                } else {
                                    ?>


            <div class="d-flex justify-content-center">
                <form name="form" method="POST" , action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="Matricola" type="hidden" value="<?php echo $row['Matricola']; ?>" />

                    <div class="form-group mr-2">
                        <div class="campoDisabilitato">
                            <input type="number" class="form-control" title="Matricola" name="Matricola" placeholder="Matricola" required value="<?php echo $row['Matricola']; ?>" disabled style="cursor: not-allowed;" />
                            <span class="campoDisabilitatoText">Campo non modificabile.</span>
                        </div>
                    </div>

                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">Cognome</label>
                        <input type="text" class="form-control" name="Cognome_utente" placeholder="Enter cognome" required value="<?php echo $row['Cognome_utente']; ?>" />
                    </div>

                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">Nome</label>
                        <input type="text" class="form-control" name="Nome_utente" placeholder="Enter nome" required value="<?php echo $row['Nome_utente']; ?>" />
                    </div>

                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">Iniziali secondo nome</label>
                        <input type="text" class="form-control" name="Iniziali_sn_utente" placeholder="Enter iniziali" value="<?php echo $row['Iniziali_sn_utente']; ?>" maxlength="1" />
                    </div>

                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">Matricola</label>
                        <input type="date" class="form-control" name="Data_n_utente" placeholder="Enter data nascita" required value="<?php echo $row['Data_n_utente']; ?>" min="1900-01-01" max=<?php echo date('Y-m-d', strtotime('-18 years')); ?> />
                    </div>


                    <button type="submit" value="Aggiorna" name="Aggiorna" class="btn btn-primary">Aggiorna</button>
                </form>
            <?php } ?>
            </div>
        </div>
        </div>
        <div class="col" style="height: 300px;">

        </div>
        <?php include("footer.php") ?>
</body>

</html>

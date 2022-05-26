<!DOCTYPE HTML>
<html>

<head>

	<?php include("connessione.php")?>
    <title>Modifica_prestito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <?php include("navbar.php");
    $id_L = $_REQUEST['ID_libro'];
    $query = "SELECT * FROM PRESTITO where PRESTITO.ID_libro='$id_L'";
    $result = mysqli_query($db, $query) or die(mysqli_error());
    $row = mysqli_fetch_assoc($result);
    ?>





    <?php
    $status = "";
    $stato = "";
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id_L = $_REQUEST['ID_libro'];
        $mat = $_REQUEST['Matricola'];
        $datap = $_REQUEST['Data_prestito'];
        $scadenzap = $_REQUEST['Scadenza_prestito'];


        $update = "UPDATE PRESTITO SET Matricola = '" . $mat . "',  
Scadenza_prestito = '" . $scadenzap . "' WHERE PRESTITO.ID_libro = '$id_L' 
AND PRESTITO.Matricola = '$mat'";




        mysqli_query($db, $update) or die(mysqli_error($db));


        $status = "Informazioni prenotazione aggiornate.</br></br>
<a href='prestiti_attuali.php'>Vedi record ins</a>";
        echo '<p class="text-danger text-center">' . $status . '</p>';
    } else {
    ?>
        <div class="container-fluid">

            <div class="d-flex justify-content-center">
                <form name="form" method="POST" action="">
                    <input type="hidden" name="new" value="1" />
                    <input name="Matricola" type="hidden" value="<?php echo $row['Matricola']; ?>" />


                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label"></label>
                        <div class="campoDisabilitato">
                            <input type="text" title="Matricola" class="form-control" id="userType" name="Matricola" placeholder="Matricola" title="Matricola" required value="<?php echo $row['Matricola']; ?>" disabled style="cursor: not-allowed;" />
                            <span class="campoDisabilitatoText">Campo non modificabile.</span>
                        </div>
                    </div>

                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label"></label>
                        <div class="campoDisabilitato">
                            <div class="campoDisabilitato">
                                <input type="date" title="Data prestito" class="form-control" name="Data_prestito" placeholder="Data_prestito" title="Data prestito" required value="<?php echo $row['Data_prestito']; ?>" disabled style="cursor: not-allowed;" />
                                <span class="campoDisabilitatoText">Campo non modificabile.</span>
                            </div>
                        </div>

                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Scadenza prestito</label>
                            <input type="date" class="form-control" name="Scadenza_prestito" min="<?php echo $row['Data_prestito']; ?>" placeholder="Scadenza_prestito" required value="<?php echo $row['Scadenza_prestito']; ?>" />
                        </div>

                        <button type="submit" value="Aggiorna" name="Aggiorna" class="btn btn-primary">Aggiorna</button>

                </form>
            <?php } ?>
            </div>
        </div>
        <div class="col" style="height: 300px;">

        </div>
        <?php include("footer.php") ?>
</body>

</html>

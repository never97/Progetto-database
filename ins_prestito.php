<!DOCTYPE HTML>
<html>

<head>
	
	<?php include("connessione.php")?>
    <title>Inserimento prestito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <?php include("navbar.php");
    $status = "";
    if (isset($_POST['new']) && $_POST['new'] == 1) {
        $id_L = $_REQUEST['ID_libro'];
        $mat = $_REQUEST['Matricola'];
        $datap = $_REQUEST['Data_prestito'];
        $scadenzap = $_REQUEST['Scadenza_prestito'];

        #verifico che il libro sia disponibile in database
        $controllo = "SELECT Presenza FROM COPIE_LIBRO WHERE ID=$id_L";
        $ris = mysqli_query($db, $controllo);
        $disponibile = mysqli_fetch_assoc($ris);



        #verifico che un dato libro preso in prestito sia stato riconsegnato o meno
        $libri_consegnati = "SELECT Consegnato FROM PRESTITO WHERE PRESTITO.ID_libro=$id_L AND PRESTITO.Matricola=$mat AND PRESTITO.Data_prestito=curdate()";
        $consegnati_res = mysqli_query($db, $libri_consegnati);
        $ritornato = mysqli_fetch_assoc($consegnati_res);

        #verifico se la soglia di prestiti giornalieri è stata raggiunta
        $libri_presi_oggi = "SELECT COUNT(Data_prestito) as limite FROM PRESTITO 
    WHERE PRESTITO.Matricola=$mat 
    AND PRESTITO.Data_prestito=curdate()";
        $libpres = mysqli_query($db, $libri_presi_oggi);
        $limite_ritiri = mysqli_fetch_assoc($libpres);


        #esistenza matricola
        $matricola_presente = "SELECT Matricola from UTENTE WHERE Matricola like $mat";
        $mat_pres = mysqli_query($db, $matricola_presente);
        $m_esiste = mysqli_fetch_assoc($mat_pres);

        #esistenza libro
        $libro_presente = "SELECT ID from COPIE_LIBRO WHERE ID=$id_L";
        $id_L_pres = mysqli_query($db, $libro_presente);
        $libro_esiste = mysqli_fetch_assoc($id_L_pres);

        if ($disponibile['Presenza'] == 1 && ($ritornato['Consegnato'] == 0 || is_null($ritornato['Consegnato'])) && ($limite_ritiri['limite'] < 5)) {
            #calcolo la data di consegna
            $aggiuntamese = strtotime("+1 Months");

            $scadenza = date("Y-m-d", $aggiuntamese);
            #inserisco nella tabella PRESTITO i dati relativi al prestito
            $ins_query = "INSERT INTO PRESTITO(ID_libro, Matricola, Data_prestito, Scadenza_prestito,Consegnato) 
    VALUES('$id_L', '$mat', curdate(), '$scadenza',0)";
            $result = mysqli_query($db, $ins_query);
            #aggiorno il campo Presenza indicando che il libro non è più presente in database
            $controllo = "UPDATE COPIE_LIBRO SET Presenza = '0' 
    WHERE COPIE_LIBRO.ID = $id_L";
            $ris = mysqli_query($db, $controllo);
        }
    }




    ?>


    <div class="container p-4">

        <div class="d-flex justify-content-center">
            <form name="form" method="POST" , action="">
                <input type="hidden" name="new" value="1" />

                <div class="form-group mr-2">
                    <label class="col-auto col-form-label">ID libro</label>
                    <input type="number" class="form-control" name="ID_libro" placeholder="idlibro" required>

                </div>
                <div class="form-group mr-2">
                    <label class="col-auto col-form-label">Matricola</label>
                    <input type="number" class="form-control" name="Matricola" placeholder="matricola" required>

                </div>

                <button type="submit" value="Invia" name="Invia" class="btn btn-primary">Invia</button>
            </form>
        </div>

    </div>




    <?php

    if ($result && ($ritornato['Consegnato'] == 0 || is_null($ritornato['Consegnato'])) && ($limite_ritiri['limite'] < 5)) {
        $status = "Prestito inserito correttamente nel sistema.";
    } else if ($ritornato['Consegnato'] == 1) {
        $status = "Non è possibile ritirare lo stesso libro più volte nello stesso giorno.";
    } else if ($limite_ritiri['limite'] == 5) {
        $status = "Soglia prestiti superata, torna domani.";
    } else if (is_null($m_esiste['Matricola']) && $ris) {
        $status = "Non vi è corrispondenza con il numero di matricola inserito.";
    } else if (is_null($libro_esiste['ID']) && $ris) {
        $status = "Non vi è corrispondenza con l'ID del libro inserito.";
    } else if ($ris) {
        $status = "Libro non disponibile.";
    } else {
        echo $ins_query . "<br>" . mysqli_error($db);
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

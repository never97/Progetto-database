<!DOCTYPE HTML>
<html>

<head>

	<?php include("connessione.php")?>
    <title>Vedi utenti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <?php



    $utente = $_REQUEST['utente'];

    $sel_query = "SELECT PRESTITO.ID_libro,PRESTITO.Matricola, Data_prestito, Scadenza_prestito, Data_restituzione, BIBLIOTECA.Cod_biblioteca
FROM COPIE_LIBRO INNER JOIN PRESTITO on COPIE_LIBRO.ID=PRESTITO.ID_libro INNER JOIN UTENTE 
on PRESTITO.Matricola=UTENTE.Matricola INNER JOIN BIBLIOTECA 
on COPIE_LIBRO.Cod_biblioteca=BIBLIOTECA.Cod_biblioteca WHERE PRESTITO.Consegnato='1' ";
    if (!empty($utente)) {
        $sel_query = $sel_query . " AND PRESTITO.Matricola like '$utente'";
    }

    $result = mysqli_query($db, $sel_query);

    if (!empty($utente) && mysqli_num_rows($result) > 0) {
    ?><p class="text-center"><?php echo "Risultati per '$utente' :"; ?></p><?php
    }
    if (mysqli_num_rows($result) > 0) {

        ?>

        <table class="table table-striped">
            <thead>
                <tr>

                    <th>Libro</th>
                    <th>Succursale</th>
                    <th>Utente</th>
                    <th>Data</th>
                    <th>scadenza</th>
                    <th>giorno consegna</th>

                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row["ID_libro"]; ?></td>
                        <td><?php echo $row["Cod_biblioteca"]; ?></td>
                        <td><?php echo $row["Matricola"]; ?></td>
                        <td><?php echo $row["Data_prestito"]; ?></td>
                        <td><?php echo $row["Scadenza_prestito"]; ?></td>
                        <td><?php echo $row["Data_restituzione"]; ?></td>


                        <?php

                        ?>


                    </tr>
            <?php 
                    }
                } else
                    echo "<center>Non è stato trovato nessun Matricola '$utente' </center>";
            ?>

            </tbody>
        </table>
        </div>
</body>

</html>

<?php

?>

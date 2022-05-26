<!DOCTYPE HTML>
<html>

<head>
    
	<?php include("connessione.php")?>
    <title>Vedi prestiti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>
    <?php

    $utente = $_REQUEST['utente'];
    ?>
    <?php
    $sel_query = "SELECT PRESTITO.ID_libro,UTENTE.Matricola, Data_prestito, Scadenza_prestito, BIBLIOTECA.Cod_biblioteca
    FROM COPIE_LIBRO INNER JOIN PRESTITO on COPIE_LIBRO.ID=PRESTITO.ID_libro INNER JOIN UTENTE 
    on PRESTITO.Matricola=UTENTE.Matricola INNER JOIN BIBLIOTECA 
    on COPIE_LIBRO.Cod_biblioteca=BIBLIOTECA.Cod_biblioteca WHERE PRESTITO.Consegnato='0'";

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
                    <th scope="col">Libro</th>
                    <th scope="col">Succursale</th>
                    <th scope="col">Matricola</th>
                    <th scope="col">Data</th>
                    <th scope="col">scadenza</th>
                    <th scope="col">stato</th>
                    <th colspan=3 scope="col">opzioni</th>

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

                        <?php

                        $date1 = $row["Data_prestito"];
                        $date2 = $row["Scadenza_prestito"];



                        $date3 = (date("Y-m-d"));
                        #$date3=date("2020-08-23");


                        $format = "%R%a";
                        $ritardo = dateDiff($date2, $date3, $format);

                        $format1 = "%a";
                        $ritardo1 = dateDiff($date2, $date3, $format1);





                        if ($ritardo > 0) {
                        ?>
                            <td>
                                <div class="ritardo"><span class="cerchioRosso"></span>
                                    <span class="ritardo_tx"><?php echo "Utente in ritardo di " . $ritardo1 . " giorni."; ?>
                                    </span>

                                </div>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td>
                                <div class="entroScadenza"><span class="cerchioVerde"></span>
                                    <span class="entroScadenza_tx"><?php echo "Consegna entro " . $ritardo1 . " giorni."; ?></span>

                                </div>
                            </td>
                        <?php
                            }

                        ?>

                        <td>
                            <a href="modifica_prestito.php?ID_libro=<?php echo $row["ID_libro"]; ?>" title="modifica"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></a>
                        </td>
                        <td>
                            <a href="archivia_prestito.php?ID_libro=<?php echo $row["ID_libro"]; ?>" title="archivia" onclick="return confirm('Confermare archiviazione prestito?');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M2 5v7.5c0 .864.642 1.5 1.357 1.5h9.286c.715 0 1.357-.636 1.357-1.5V5h1v7.5c0 1.345-1.021 2.5-2.357 2.5H3.357C2.021 15 1 13.845 1 12.5V5h1z" />
                                    <path fill-rule="evenodd" d="M5.5 7.5A.5.5 0 0 1 6 7h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zM15 2H1v2h14V2zM1 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z" />
                                </svg></a>
                        </td>
                        <td>
                            <a href="elimina_prestito.php?ID_libro=<?php echo $row["ID_libro"]; ?>" title="elimina" onclick="return confirm('ATTENZIONE, eliminazione del prestito definitiva');"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg> </a>
                        </td>

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

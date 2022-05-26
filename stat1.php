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

    $Cerca = $_REQUEST["Cerca"];

    $query = "SELECT COUNT(Titolo_libro) as conta, Titolo_libro, ID_libro, UTENTE.Matricola 
FROM UTENTE inner join PRESTITO on UTENTE.Matricola=PRESTITO.Matricola INNER JOIN 
COPIE_LIBRO on ID_libro=ID INNER JOIN LIBRO on LIBRO.ISBN=COPIE_LIBRO.ISBN group by Matricola, ID_libro having Matricola='$Cerca' ";

    $result = mysqli_query($db, $query);


    if (mysqli_num_rows($result) > 0) {
    ?>
        <p class="text-center"><?php echo "Risultati per '$Cerca' :"; ?></p>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-8 ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> Matricola </th>
                                <th scope="col"> ID_libro </th>
                                <th scope="col"> Titolo_libro </th>
                                <th scope="col"> #Prestiti </th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["Matricola"]; ?> </td>
                                    <td><?php echo $row["ID_libro"]; ?> </td>
                                    <td><?php echo $row["Titolo_libro"]; ?> </td>
                                    <?php
                                    if ($row["conta"] == 1) {
                                    ?>
                                        <td><?php echo "Preso in prestito " . $row["conta"] . " volta"; ?> </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td><?php echo "Preso in prestito " . $row["conta"] . " volte"; ?> </td>

                                    <?php

                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                        } else { ?><p class="text-center"><?php echo "Non è stato trovato nessun Matricola '$Cerca' "; ?></p><?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


</body>

</html>

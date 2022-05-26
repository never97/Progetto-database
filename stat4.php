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

    $query = "SELECT EDITORE.Nome_editore, COUNT(*) as Numero FROM AUTORE 
INNER JOIN SCRITTO_DA ON AUTORE.Cognome_autore = SCRITTO_DA.Cog_autore 
AND AUTORE.Cognome_autore like '$Cerca' INNER JOIN LIBRO ON SCRITTO_DA.ISBN = LIBRO.ISBN 
INNER JOIN EDITORE ON LIBRO.Codice_editore = EDITORE.Cod_editore GROUP BY EDITORE.Nome_editore 
ORDER BY Numero DESC LIMIT 1 ";

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
                                <th scope="col"> Nome editore </th>
                                <th scope="col"> conta </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row["Nome_editore"]; ?> </td>
                                    <td><?php echo $row["Numero"]; ?> </td>

                                </tr>
                        </tbody>
                    <?php } ?>



                <?php
            } else { ?><p class="text-center"><?php echo "Non è stato trovato nessun Autore '$Cerca' "; ?></p><?php } ?>


                </tbody>
                    </table>

                </div>
            </div>
        </div>


</body>

</html>

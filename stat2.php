<?php
	 include("connessione.php");
$Cerca = $_REQUEST["Cerca"];

$query = "SELECT ID, LIBRO.Titolo_libro, PRESTITO.Matricola, Nome_utente, Cognome_utente
FROM COPIE_LIBRO INNER JOIN PRESTITO on COPIE_LIBRO.ID=PRESTITO.ID_libro INNER JOIN LIBRO on LIBRO.ISBN=COPIE_LIBRO.ISBN INNER JOIN UTENTE 
on PRESTITO.Matricola=UTENTE.Matricola WHERE LIBRO.Titolo_libro LIKE '%$Cerca%' AND PRESTITO.Consegnato=0";



$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
?>
    <p class="text-center"><?php echo "Risultati per '$Cerca' :"; ?></p>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-8 " h-700>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> ID libro </th>
                            <th scope="col"> Titolo </th>
                            <th scope="col"> Matricola </th>
                            <th scope="col"> Cognome_utente </th>
                            <th scope="col"> Nome_utente </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?> </td>
                                <td><?php echo $row["Titolo_libro"]; ?> </td>
                                <td><?php echo $row["Matricola"]; ?> </td>
                                <td><?php echo $row["Cognome_utente"]; ?> </td>
                                <td><?php echo $row["Nome_utente"]; ?> </td>

                            </tr>
                    <?php
                        }
                    } else
                        echo "<center>Non è stato trovato nessun libro con titolo: '$Cerca' </center>";
                    ?>
                    </tbody>
                </table>

            </div>
        </div>

        </body>

        </html>

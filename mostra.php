<!DOCTYPE HTML>
<html>

<body>


	<?php include("connessione.php");

    $Cerca = $_REQUEST["libro"];
    $fromdate = $_REQUEST["data1"];
    $todate = $_REQUEST["data2"];
    $editore = $_REQUEST['edit'];
    $biblioteca = $_REQUEST['bibl'];



    $query = "SELECT ID, LIBRO.ISBN, GROUP_CONCAT(CONCAT(AUTORE.Nome_autore, ' ', AUTORE.Cognome_autore)) as Autori, Lingua, Anno_produzione, 
Titolo_libro, Presenza, Indirizzo_bibl, Nome_bibl 
FROM COPIE_LIBRO INNER JOIN LIBRO on COPIE_LIBRO.ISBN=LIBRO.ISBN INNER JOIN BIBLIOTECA 
on COPIE_LIBRO.Cod_biblioteca=BIBLIOTECA.Cod_biblioteca INNER JOIN SCRITTO_DA 
on SCRITTO_DA.ISBN=LIBRO.ISBN INNER JOIN AUTORE on SCRITTO_DA.Cog_autore=AUTORE.Cognome_autore
INNER JOIN EDITORE on EDITORE.Cod_editore=LIBRO.Codice_editore
Where (Titolo_libro like '%$Cerca%' OR  CONCAT(AUTORE.Nome_autore,' ',AUTORE.Cognome_autore) like '%$Cerca%')";

    if (!empty($fromdate) && !empty($todate)  && empty($biblioteca) && empty($editore)) { #100
        $query = $query . " AND (Anno_produzione between '$fromdate' and '$todate')";
    } elseif ((empty($fromdate) && empty($todate) && empty($biblioteca) && !empty($editore))) { #001
        $query = $query . " AND (EDITORE.Nome_editore like '%$editore%')";
    } elseif ((empty($fromdate) && empty($todate)  && !empty($biblioteca) && empty($editore))) { #010
        $query = $query . "AND (BIBLIOTECA.Nome_bibl like '%$biblioteca%')";
    } elseif ((empty($fromdate) && empty($todate)  && !empty($biblioteca) && !empty($editore))) { #011
        $query = $query . "AND (EDITORE.Nome_editore like '%$editore%') AND (BIBLIOTECA.Nome_bibl like '%$biblioteca%')";
    } elseif ((!empty($fromdate) && !empty($todate)  && empty($biblioteca) && !empty($editore))) { #101

        $query = $query . " AND (Anno_produzione between '$fromdate' and '$todate') AND (EDITORE.Nome_editore like '%$editore%')";
    } elseif ((!empty($fromdate) && !empty($todate)  && !empty($biblioteca) && empty($editore))) { #110
        $query = $query . " AND (Anno_produzione between '$fromdate' and '$todate') AND (BIBLIOTECA.Nome_bibl like '%$biblioteca%')";
    } elseif ((!empty($fromdate) && !empty($todate)  && !empty($biblioteca) && !empty($editore))) { #111

        $query = $query . " AND (Anno_produzione between '$fromdate' and '$todate') AND (EDITORE.Nome_editore like '%$editore%') 
    AND (BIBLIOTECA.Nome_bibl like '%$biblioteca%')";
    }
    $query .= "GROUP BY ID ORDER BY BIBLIOTECA.Nome_bibl";



    $result = mysqli_query($db, $query);
    #echo $query;
    if (mysqli_num_rows($result) > 0) {

    ?>
        <p class="text-center"><?php echo "Risultati per '$Cerca' :"; ?></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> ISBN </th>
                    <th scope="col"> Titolo_libro </th>
                    <th scope="col"> Anno_produzione </th>
                    <th scope="col">Lingua</th>
                    <th scope="col">Disponibile presso</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo $row["ID"]; ?> </td>
                        <td><?php echo $row["ISBN"]; ?> </td>
                        <td><?php echo $row["Titolo_libro"]; ?> </td>
                        <td><?php echo $row["Anno_produzione"]; ?> </td>
                        <td><?php echo $row["Lingua"]; ?> </td>
                        <?php
                        if ($row["Presenza"] == 1) {
                        ?>
                            <td><?php echo $row["Nome_bibl"] . ", " . $row["Indirizzo_bibl"]; ?> </td>
                        <?php
                        } else {
                        ?>
                            <td><?php echo "Non disponibile" ?> </td>
                        <?php
                        }
                        ?>



                    <?php
                }
                    ?>
                    </tr><?php

                        } else { ?><p class="text-center" style="padding: 30px;"><?php echo "Nessuna voce in archivio corrisponde a '$Cerca' "; ?></p><?php } ?>



            </tbody>
        </table>
        <p class="text-center"><a href="cerca.php"> Continua la ricerca </a></p>




</body>

</html>

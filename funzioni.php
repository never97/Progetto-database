<?php
function stat1()
{
?>

    <br>




    <div class="container p-4">

        <div class="d-flex justify-content-center">
            <form action="statistica1.php" method="GET">
                <input type="hidden" name="new" value="1" />

                <div class="form-group mr-2">
                    <label class="col-auto col-form-label">Matricola da cercare</label>
                    <input type="number" class="form-control" name="Cerca" placeholder="Matricola" required>

                </div>

                <button type="submit" value="Cerca" class="btn btn-primary">Cerca</button>
            </form>
        </div>
    </div>

<?php

    if (isset($_GET['Cerca'])) {
        include("stat1.php");
    }
}
?>

<?php
function stat2()
{
?>
    <br>

    <div class="container p-4">

        <div class="d-flex justify-content-center">
            <form action="statistica2.php" method="GET">
                <input type="hidden" name="new" value="1" />

                <div class="form-group mr-2">
                    <label class="col-auto col-form-label">Titolo del libro</label>
                    <input type="text" class="form-control" name="Cerca" placeholder="Titolo libro" required>

                </div>

                <button type="submit" value="Cerca" class="btn btn-primary">Cerca</button>
            </form>
        </div>
    </div>


<?php

    if (isset($_GET['Cerca'])) {
        include("stat2.php");
    }
}
?>
<?php
function stat4()
{
?>
    <br>

    <div class="container p-4">

        <div class="d-flex justify-content-center">
            <form action="statistica4.php" method="GET">
                <input type="hidden" name="new" value="1" />

                <div class="form-group mr-2">
                    <label class="col-auto col-form-label">Autore</label>
                    <input type="text" class="form-control" name="Cerca" placeholder="Cognome autore" required>

                </div>

                <button type="submit" value="Cerca" class="btn btn-primary">Cerca</button>
            </form>
        </div>
    </div>


<?php

    if (isset($_GET['Cerca'])) {
        include("stat4.php");
    }
}
?>

<?php
function form_cerca()
{ ?>

    <!--form-->


    <div class="d-flex justify-content-center">
        <form action="cerca.php" method="GET">
            <div class="form-group mr-2">
                <label class="col-auto col-form-label">Cerca libro </label>
                <input type="text" required class="form-control" name="libro" id="inputText" placeholder="Titolo/Autore">

            </div>

            <!--pezzo -->
            <p>

                <button class="btn btn-light" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Ricerca avanzata
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <!-- pezzo -->
                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">Intervallo date </label>
                        <input type="number" class="form-control" name="data1" id="inputDate1" placeholder="Data1">
                        <input type="number" class="form-control" name="data2" id="inputDate2" placeholder="Data2">

                    </div>
                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">editore </label>
                        <input type="trxt" class="form-control" name="edit" placeholder="editore">

                    </div>
                    <div class="form-group mr-2">
                        <label class="col-auto col-form-label">biblioteca </label>
                        <input type="text" class="form-control" name="bibl" placeholder="biblioteca">

                    </div>
                </div>
                <!--form-->

            </div>
            <!--form -->

            <button type="submit" value="Cerca" name="Cerca" class="btn btn-primary">Cerca</button>
        </form>
    </div>


    <!--form-->





<?php

    if (isset($_GET['Cerca'])) {


        include("mostra.php");
    }
} #function

?>
<?php
function lingue_piu_comuni()
{
	include("connessione.php");

    $query = "SELECT Lingua, COUNT(Lingua) AS 'conta' FROM LIBRO WHERE Lingua 
IN ('Albanian','Arabic','Aymara','Belarusian','Bengali','Catalan','Chinese','Czech','Danish','Dari','Dhivehi','Dutch','Dzongkha','English','Estonian','Finnish','French','Georgian','German','Guaraní','Gujarati','Haitian Creole','Hebrew','Hindi','Hiri Motu', 'Hungarian','Icelandic','Indonesian','Irish Gaelic','Italian','Japanese','Kashmiri','Kazakh','Khmer','Korean','Lao','Northern Sotho','Norwegian','Polish','Portuguese','Punjabi','Quechua', 'Romanian','Spanish','Swedish') 
GROUP BY Lingua order by conta DESC,Lingua ASC limit 5 ";
    $result = mysqli_query($db, $query);




    if (mysqli_num_rows($result) > 0) {

?>

        <br><br>
        <p class="text-center">5 lingue più comuni</p>
        <table class="table table-bordered">

            <?php
            $td2 = '';
            $td3 = '';
            while ($row = mysqli_fetch_assoc($result)) {
                $td2 .= "<td>" . $row['Lingua'] . "</td>";
                $td3 .= "<td>" . $row['conta'] . "</td>";
            }
            ?>
            <thead class="thead-light">
                <tr>
                    <th>Lingua</th>
                    <?php echo $td2; ?>
                </tr>
                <tr>
                    <th>numero</th>
                    <?php echo $td3; ?>
                </tr>
            <?php } ?>
            </thead>
            <tbody>
            </tbody>
        </table>
    <?php



}
    ?>
    <?php function autore_scritto_piu_libri()
    {

	include("connessione.php");

        $query1 = "SELECT AUTORE.Nome_autore, COUNT(*) as libri_scritti FROM AUTORE INNER JOIN 
SCRITTO_DA ON AUTORE.Cognome_autore = SCRITTO_DA.Cog_autore GROUP BY AUTORE.Nome_autore order by libri_scritti DESC limit 1";

        $result1 = mysqli_query($db, $query1);
        if (mysqli_num_rows($result1) > 0) {
    ?>
            <br><br>
            <p class="text-center">autore che ha scritto più libri.</p>
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col"> nome </th>
                        <th scope="col"> libri </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result1)) {
                    ?>
                        <tr>
                            <td><?php echo $row["Nome_autore"]; ?> </td>
                            <td><?php echo $row["libri_scritti"]; ?> </td>
                        </tr>
                <?php
                    }
                }

                ?>
                </tbody>
            </table>
        <?php


    } ?>
        <?php function editore_pubb_piu_libri()
        {

            
	include("connessione.php");

            $query2 = "SELECT EDITORE.Nome_editore, COUNT(*) as libri_pubblicati FROM EDITORE JOIN LIBRO ON EDITORE.Cod_editore = LIBRO.Codice_editore GROUP BY EDITORE.Nome_editore order by libri_pubblicati DESC limit 1";

            $result2 = mysqli_query($db, $query2);
            if (mysqli_num_rows($result2) > 0) {
        ?>
                <br><br>
                <p class="text-center">editore che ha pubblicato più libri.</p>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"> editore </th>
                            <th scope="col"> # </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <td><?php echo $row["Nome_editore"]; ?> </td>
                                <td><?php echo $row["libri_pubblicati"]; ?> </td>
                            </tr>
                    <tbody>
                    <?php } ?>
                </table>
        <?php



            }
        } ?>




        <?php function utenti_ritardo()
        {

	include("connessione.php");

            $query = "SELECT LIBRO.Titolo_libro,UTENTE.Cognome_utente,UTENTE.Nome_utente,UTENTE.Matricola
FROM 
PRESTITO INNER JOIN UTENTE
ON PRESTITO.Matricola = UTENTE.Matricola
AND PRESTITO.Consegnato = 1 AND DATEDIFF(PRESTITO.Scadenza_prestito,PRESTITO.Data_restituzione) < 0
INNER JOIN COPIE_LIBRO ON PRESTITO.ID_libro = COPIE_LIBRO.ID
INNER JOIN LIBRO ON COPIE_LIBRO.ISBN = LIBRO.ISBN";

            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
        ?>
                <br><br>
                <p class="text-center">Utenti che hanno consegnato un prestito in ritardo</p>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"> Titolo libro </th>
                            <th scope="col"> Cognome utente </th>
                            <th scope="col"> Nome utente </th>
                            <th scope="col"> Matricola </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["Titolo_libro"]; ?> </td>
                                <td><?php echo $row["Cognome_utente"]; ?> </td>
                                <td><?php echo $row["Nome_utente"]; ?> </td>
                                <td><?php echo $row["Matricola"]; ?> </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
        <?php



            }
        } ?>


        <?php function nati_NewY()
        {

	include("connessione.php");

            $query = "SELECT DISTINCT group_concat(COPIE_LIBRO.ID) as ID_libri, UTENTE.Cognome_utente,UTENTE.Nome_utente,UTENTE.Matricola 
FROM PRESTITO INNER JOIN UTENTE ON PRESTITO.Matricola = UTENTE.Matricola 
INNER JOIN COPIE_LIBRO ON PRESTITO.ID_libro = COPIE_LIBRO.ID INNER JOIN SCRITTO_DA 
ON COPIE_LIBRO.ISBN = SCRITTO_DA.ISBN INNER JOIN AUTORE ON SCRITTO_DA.Cog_autore = AUTORE.Cognome_autore 
AND AUTORE.Luogo_n_autore = 'New York' GROUP BY UTENTE.Matricola ";

            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) > 0) {
        ?>
                <br><br>
                <p class="text-center">Utenti che hanno preso libri di autori nati a New York</p>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col"> ID libri </th>
                            <th scope="col"> Cognome utente </th>
                            <th scope="col"> Nome utente </th>
                            <th scope="col"> Matricola </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["ID_libri"]; ?> </td>
                                <td><?php echo $row["Cognome_utente"]; ?> </td>
                                <td><?php echo $row["Nome_utente"]; ?> </td>
                                <td><?php echo $row["Matricola"]; ?> </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
        <?php



            }
        } ?>


        <?php function registra_utente()
        { ?>

            <div class="container p-4">

                <div class="d-flex justify-content-center">
                    <form name="form" action="" method="POST">
                        <input type="hidden" name="new" value="1" />

                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Matricola </label>
                            <input type="number" class="form-control" name="Matricola" placeholder="matricola" required />
                        </div>
                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Data nascita </label>
                            <input type="date" class="form-control" name="Data_n_utente" placeholder="data" min="1900-01-01" max=<?php echo date('Y-m-d', strtotime('-18 years')); ?> required />

                        </div>
                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Cognome </label>
                            <input type="text" class="form-control" name="Cognome_utente" placeholder="cognome" required />

                        </div>
                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Nome </label>
                            <input type="text" class="form-control" name="Nome_utente" placeholder="nome" required />

                        </div>
                        <div class="form-group mr-2">
                            <label class="col-auto col-form-label">Iniziali secondo nome </label>
                            <input type="text" class="form-control" name="Iniziali_sn_utente" placeholder="inizialisn" maxlength="1" />

                        </div>


                        <button type="submit" value="Invia" class="btn btn-primary">Invia</button>
                    </form>
                </div>

            </div>



        <?php
        }
        ?>
        <?php function recupera_ritardi()
        {
        include("connessione.php");
            $count = 1;

            $sel_query = "SELECT PRESTITO.ID_libro,UTENTE.Matricola, Nome_utente, Cognome_utente, Data_prestito, Scadenza_prestito, BIBLIOTECA.Cod_biblioteca
FROM COPIE_LIBRO INNER JOIN PRESTITO on COPIE_LIBRO.ID=PRESTITO.ID_libro INNER JOIN UTENTE 
on PRESTITO.Matricola=UTENTE.Matricola INNER JOIN BIBLIOTECA 
on COPIE_LIBRO.Cod_biblioteca=BIBLIOTECA.Cod_biblioteca WHERE PRESTITO.Consegnato='0' ";

            $result = mysqli_query($db, $sel_query);

            while ($row = mysqli_fetch_assoc($result)) : ?>


                <?php
                $date1 = $row["Data_prestito"];
                $date2 = $row["Scadenza_prestito"];



                $date3 = (date("Y-m-d"));
                #$date3=date("2020-08-23");


                $format = "%R%a";
                $ritardo = dateDiff($date2, $date3, $format);
                $format1 = "%a";
                $ritardo1 = dateDiff($date2, $date3, $format1);


		$limite_visual_ritardi=0;

                if ($ritardo > 0 && $limite_visual_ritardi < 5) :
                    $limite_visual_ritardi++;
                ?>
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <?php echo $row["Nome_utente"]; ?>
                                    <?php echo $row["Cognome_utente"];
                                    echo " (" . $row["Matricola"] . ") ";
                                    echo "in ritardo di " . $ritardo1 . " giorni." ?>
                                </th>
                            </tr>
                        </thead>
                    </table>

                <?php
                endif;

                ?>
                <tr>
            <?php
                $count++;
            endwhile;
        }
            ?>
            <?php
            /*echo "vedi stato prestiti"; */
            function dateDiff($date1, $date2, $format)
            {
                $datetime1 = new DateTime($date1);
                $datetime2 = new DateTime($date2);
                $interval = $datetime1->diff($datetime2);
                return $interval->format($format);
            }
            ?>


            <?php
            function cerca_in_archivio()
            {
            ?>
                <br>




                <div class="container p-4">

                    <div class="d-flex justify-content-center">
                        <form action="storicotmp.php" method="GET">
                            <input type="hidden" name="new" value="1" />

                            <div class="form-group mr-2">
                                <label class="col-auto col-form-label">Filtra per matricola</label>
                                <input type="number" class="form-control" name="utente" placeholder="Matricola">

                            </div>

                            <button type="submit" value="utente" class="btn btn-primary">Cerca</button>
                        </form>
                    </div>
                </div>

            <?php

                include("storico_prestiti.php");
            }
            ?>


            <?php
            function cerca_in_utenti()
            {
            ?>
                <br>




                <div class="container p-4">

                    <div class="d-flex justify-content-center">
                        <form action="vista_utenti_princ.php" method="GET">
                            <input type="hidden" name="new" value="1" />

                            <div class="form-group mr-2">
                                <label class="col-auto col-form-label">Filtra per matricola</label>
                                <input type="number" class="form-control" name="utente" placeholder="Matricola">

                            </div>

                            <button type="submit" value="utente" class="btn btn-primary">Cerca</button>
                        </form>
                    </div>
                </div>

            <?php

                include("vista_utenti.php");
            }
            ?>


            <?php
            function cerca_in_prestiti_attivi()
            {
            ?>
                <br>




                <div class="container p-4">

                    <div class="d-flex justify-content-center">
                        <form action="prestiti_attuali.php" method="GET">
                            <input type="hidden" name="new" value="1" />

                            <div class="form-group mr-2">
                                <label class="col-auto col-form-label">Filtra per matricola</label>
                                <input type="number" class="form-control" name="utente" placeholder="Matricola">

                            </div>

                            <button type="submit" value="utente" class="btn btn-primary">Cerca</button>
                        </form>
                    </div>
                </div>

            <?php

                include("vista_prestiti_inseriti.php");
            }
            ?>

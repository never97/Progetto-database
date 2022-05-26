
	<?php include("connessione.php");
$id_l = $_REQUEST['ID_libro'];
$mat = $_REQUEST['Matricola'];

$controllo = "UPDATE COPIE_LIBRO SET Presenza = '1'
WHERE COPIE_LIBRO.ID = $id_l";

$ris = mysqli_query($db, $controllo);

$query = "DELETE FROM PRESTITO WHERE PRESTITO.ID_libro=$id_l";
$result = mysqli_query($db, $query);

header("Location: prestiti_attuali.php");

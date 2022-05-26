
	<?php include("connessione.php");
$id_l = $_REQUEST['ID_libro'];
$mat = $_REQUEST['Matricola'];
#$query = "DELETE FROM PRESTITO WHERE PRESTITO.ID_libro=$id_L"; 
#$result = mysqli_query($db,$query) or die( mysqli_error($db));
$controllo = "UPDATE COPIE_LIBRO SET Presenza = '1' 
WHERE COPIE_LIBRO.ID = $id_l";
$ris = mysqli_query($db, $controllo);

$evaso = "UPDATE PRESTITO SET Consegnato='1' WHERE ID_libro = $id_l";
$ris1 = mysqli_query($db, $evaso);

$data_reso = "UPDATE PRESTITO SET Data_restituzione = curdate() 
WHERE PRESTITO.ID_libro = $id_l";
$ris2 = mysqli_query($db, $data_reso);


header("Location: prestiti_attuali.php");


	<?php include("connessione.php");
$mat = $_REQUEST['Matricola'];
$query = "DELETE FROM UTENTE WHERE Matricola=$mat";
$result = mysqli_query($db, $query) or die(mysqli_error($db));
header("Location: vista_utenti_princ.php");

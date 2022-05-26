<?php
$db = mysqli_connect("localhost", "root", "password", "Gestione_biblioteca");
if(!$db){
    echo "Si è verificato un errore: Non riesco a collegarmi al database" . PHP_EOL;
    echo "Codice errore: " . mysqli_connect_errno(). PHP_EOL;
    echo "Messaggio errore: " . mysqli_connect_error(). PHP_EOL;
    exit(-1);

}

?>
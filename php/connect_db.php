<?php
$utilizadorBD='root';
$passBD='';
$nomeBD='recursosHumanos';

$bd = new mysqli('localhost', $utilizadorBD, $passBD, $nomeBD);
if ($bd->connect_error) {
    header ('location: ../paginaErro.html');
} 
?>
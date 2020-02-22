<?php
$idEmpregado = $_GET["id"];

//ligação à BD
include 'connect_db.php';

$sql="DELETE FROM empregados WHERE id_empregado = ".$idEmpregado;

if ($bd->query($sql)===true)
    header('location: ../sistema/empregados.php');
else
    header('location: ../paginaErro.html')
?>
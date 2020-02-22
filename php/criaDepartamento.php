<?php
$departamento=$_POST["departamento"];

include 'connect_db.php';

$sql="INSERT INTO departamento VALUES (NULL, '".$departamento."', NULL)";

$resultado = $bd->query($sql);

if($resultado===true)
    header('location: ../sistema/departamentos.php');
else
    header('location: ../paginaErro.html'); 
?>
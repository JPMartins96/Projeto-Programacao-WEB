<?php
$titulo=$_POST["titulo"];
$nome=$_POST["nome"];
$apelido=$_POST["apelido"];
$email=$_POST["email"];
$password=$_POST["password"];
$genero='M';
$acesso=1;

switch ($titulo){
    case "Sr.":
        $genero='M';
    break;
    case "Sra.":
        $genero='F';
    break;
    case "Dr.":
        $genero='M';
    break;
    case "Dra.":
        $genero='F';
    break;
    case "Prof. Dr.":
        $genero='M';
    break;
    case "Profa. Dra.":
        $genero='F';
    break;
    case "Eng.":
        $genero='M';
    break;
    case "Enga.":
        $genero='F';
    break;
    default:
        $genero='M';
}

include 'connect_db.php';

$sql="INSERT INTO utilizadores (email, pass, titulo, nome, apelido, nivel_acesso, genero) VALUES ('$email', '$password', '$titulo', '$nome', '$apelido', '$acesso', '$genero')";

if($bd->query($sql) === TRUE)
    header("Location: ../index.php");
else
    echo "Error: " . $sql . "<br>" . $bd->error;
    //header("Location: ../paginaErro.html");
?>
<?php
$id = $_GET["id"];
$titulo = $_POST["titulo"];
$nome = $_POST["nome"];
$apelido = $_POST["apelido"];
$formacao = $_POST["formacao"];
$dataNascimento = $_POST["dataNascimento"];
$dataContratacao = $_POST["dataContratacao"];
if (isset($_POST["departamento"]))
    $iDdepartamento=$_POST["departamento"];

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

//conexão à base de dados
include 'connect_db.php';

//verifica se o acesso à página é para editar ou criar utilizador
if ($id=='criar') {
    $sql="INSERT INTO empregados VALUES (NULL, '".$dataNascimento."', '".$nome."', '".$apelido."', '".$genero."', '".$dataContratacao."', '".$titulo."', '".$formacao."')";
    if ($bd->query($sql)===true) 
    header('location: ../sistema/empregados.php');
    else
    header('location: ../paginaErro.html');
}else{
    $sql="UPDATE empregados
    SET data_nascimento='".$dataNascimento."', nome='".$nome."', apelido='".$apelido."', genero='".$genero."', data_contratacao='".$dataContratacao."', titulo='".$titulo."', formacao='".$formacao."'
    WHERE id_empregado = ".$id;
    if ($bd->query($sql)===true){
        $sql="UPDATE departamento_empregado SET id_departamento = '".$iDdepartamento."' WHERE id_empregado = ".$id;
        if ($bd->query($sql)===true) {
            header('location: ../sistema/empregados.php');
        }else
            header('location: ../paginaErro.html');
    }else
    header('location: ../paginaErro.html');
}
//verifica se não houve erros ou rideciona para a página de erro

?>
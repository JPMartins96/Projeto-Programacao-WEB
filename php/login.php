<?php
//Declaração de variaveis
$email=$_POST['email'];
$password=$_POST['password'];

//Conecção à Base de dados
include 'connect_db.php';

$sql="SELECT id_utilizador, email, pass, nivel_acesso FROM utilizadores WHERE email LIKE '$email'";

//Guarda variaveis num array $result
$resultado = $bd->query($sql);

if($resultado->num_rows==1){
    $linha=$resultado->fetch_assoc();
    if($linha["email"]==$email && $linha["pass"]==$password){
        session_start();
        $_SESSION["idSessao"]=$linha["id_utilizador"];
        $_SESSION["acesso"]=$linha["nivel_acesso"];
        header ('location: ../sistema/home.php');
    }else{
        header ('location: ../index.php?palavraPasseErrada=true');
    }
}else{
    header ('location: ../index.php?naoExiste=true');
}

?>
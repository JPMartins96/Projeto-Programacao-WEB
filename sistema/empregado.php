<?php
//inicia as variaveis de sessão
session_start();
//verifica se a sessão está iniciada e, caso não esteja, direciona para a página de login
if(!isset($_SESSION["idSessao"])||$_SESSION["acesso"]==0){
    header('location: ../index.php');
}
//adiciona o header da página
include 'header.php';

//Guarda em variavel o id do utilizador a editar
$idEmpregado=$_GET["id"];

//ligação à base de dados
include '../php/connect_db.php';

$sql="SELECT * FROM empregados WHERE id_empregado = ".$idEmpregado;

//Executa sql e guarda no array resultado
$resultado=$bd->query($sql);

//Escreve o resultado no array linha
$linha=$resultado->fetch_assoc();

//Variavel para titulo
$titulo=$linha["titulo"];
?>

<div class="inner">
    <div class="row">
        <div class="col-12">
            <h1>Editar Empregado</h1>
        </div>
    </div>
    <form action="../php/editarEmpregado.php?id=<?php echo$idEmpregado ?>" method="POST">
        <div class="row">
            <div class="col-2">
                <p>Título</p>
            </div>
            <div class="col-10">
                <select name="titulo">
                    <option <?php if($titulo=="Sr.") echo'selected' ?> value="Sr.">Sr.</option>
                    <option <?php if($titulo=="Sra.") echo'selected' ?> value="Sra.">Sra.</option>
                    <option <?php if($titulo=="Dr.") echo'selected' ?> value="Dr.">Dr.</option>
                    <option <?php if($titulo=="Dra.") echo'selected' ?> value="Dra.">Dra.</option>
                    <option <?php if($titulo==">Prof. Dr.") echo'selected' ?> value="Prof. Dr.">Prof. Dr.</option>
                    <option <?php if($titulo=="Profa. Dra.") echo'selected' ?> value="Profa. Dra.">Profa. Dra.</option>
                    <option <?php if($titulo=="Eng.") echo'selected' ?> value="Eng.">Eng.</option>
                    <option <?php if($titulo=="Enga.") echo'selected' ?> value="Enga.">Enga.</option>
                </select>
            </div>
            <div class="col-2">
                <p>Nome:</p>
            </div>
            <div class="col-10">
                <input type="text" name="nome" alt="nome" value="<?php echo$linha["nome"] ?>">
            </div>
            <div class="col-2">
                <p>Apelido:</p>
            </div>
            <div class="col-10">
                <input type="text" name="apelido" alt="apelido" value="<?php echo$linha["apelido"] ?>">
            </div>
            <div class="col-2">
                <p>Formação</p>
            </div>
            <div class="col-10">
                <input type="text" name="formacao" alt="formação" value="<?php echo$linha["formacao"] ?>">
            </div>
            <div class="col-2">
                <p>Data de Nascimento</p>
            </div>
            <div class="col-10">
                <input type="date" name="dataNascimento" alt="Data Nascimento" value="<?php echo$linha["data_nascimento"] ?>">
            </div>
            <div class="col-2">
                <p>Data de Contratação</p>
            </div>
            <div class="col-10">
                <input type="date" name="dataContratacao" alt="Data Contratação" value="<?php echo$linha["data_contratacao"] ?>">
            </div>
            <div class="col-2">
                <p>Departamento</p>
            </div>
            <div class="col-10">
                <select name="departamento">
                    <?php
                    include '../php/connect_db.php';
                    $sql="SELECT * FROM departamentos";

                    //executa SQL
                    $resultado=$bd->query($sql);

                    //guarda resultado no array $linha e insere resultados em HTML
                    while($linha=$resultado->fetch_assoc()){
                        echo'<option value="'.$linha["id_departamento"].'">'.$linha["departamento"].'</option>';
                    }
                    $bd->close();
                    ?>
                </select>
            </div>
            <div class="col-3">
                <input type="submit" value="Editar" name="submit" alt="editar">
                <input type="button" value="Eliminar" name="eliminar" alt="eliminar" onclick="location.href='../php/eliminarEmpregado.php?id=<?php echo$idEmpregado ?>'">
            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>
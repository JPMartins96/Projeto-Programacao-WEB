<?php
//inicia as variaveis de sessão
session_start();

//verifica se a sessão foi iniciada e tem permissão, caso contrário direciona para a página de login
if(!isset($_SESSION["idSessao"])&&$_SESSION["acesso"]==1){
    header('location: ../index.php');
}

//carrega o header da página
include 'header.php';
?>
<div class="inner">
    <div class="row">
        <div class="col-12">
            <h1>Criar Departamento</h1>
        </div>
        <form name="adicionaDepartamento" action="../php/criaDepartamento.php" method="POST">
            <div class="col-12">
                <input type="text" name="departamento" maxlength="40" placeholder="Nome do Departamento">
            </div>
            <div class="col-2">
                <input type="submit" name="submitDepartamento" value="Adicionar">
            </div>
        </form>
        <div class="col-12">
            <h1>Criar Empregado</h1>
        </div>
        <form action="../php/editarEmpregado.php?id=criar" method="POST">
            <div class="col-2">
                <p>Título</p>
            </div>
            <div class="col-10">
                <select name="titulo">
                    <option value="Sr.">Sr.</option>
                    <option value="Sra.">Sra.</option>
                    <option value="Dr.">Dr.</option>
                    <option value="Dra.">Dra.</option>
                    <option value="Prof. Dr.">Prof. Dr.</option>
                    <option value="Profa. Dra.">Profa. Dra.</option>
                    <option value="Eng.">Eng.</option>
                    <option value="Enga.">Enga.</option>
                </select>
            </div>
            <div class="col-2">
                <p>Nome:</p>
            </div>
            <div class="col-10">
                <input type="text" name="nome" alt="nome" placeholder="Nome">
            </div>
            <div class="col-2">
                <p>Apelido:</p>
            </div>
            <div class="col-10">
                <input type="text" name="apelido" alt="apelido" placeholder="Apelido">
            </div>
            <div class="col-2">
                <p>Formação</p>
            </div>
            <div class="col-10">
                <input type="text" name="formacao" alt="formação" placeholder="Formação">
            </div>
            <div class="col-2">
                <p>Data de Nascimento</p>
            </div>
            <div class="col-10">
                <input type="date" name="dataNascimento" alt="Data Nascimento">
            </div>
            <div class="col-2">
                <p>Data de Contratação</p>
            </div>
            <div class="col-10">
                <input type="date" name="dataContratacao" alt="Data Contratação">
            </div>
            <div class="col-12">
                <input type="submit" value="Adicionar" name="submitCriarEmpregado" alt="Criar Empregado">
                <input type="reset" value="Limpar" name="limpar" alt="Limpar">
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>
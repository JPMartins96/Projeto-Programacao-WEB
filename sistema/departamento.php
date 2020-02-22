<?php
//inicia as variaveis de sessão
session_start();

//verifica se a sessão foi iniciada caso contrário direciona para a página de login
if(!isset($_SESSION["idSessao"])){
    header('location: ../index.php');
}

//carrega o header da página
include 'header.php';

//variável que define o departamento que o utilizador selecionou
$idDepartamento=$_GET["id"];

//caminho para a pasta que tem as imagens (a base de dados apenas contem o nome do ficheiro)
$caminhoImagem="imagens/departamentos/";

?>
<div class="inner">
<div class="row">
    <div class="col-3 menu">
        <ul>
        <?php
        //conecção à base de dados
        include '../php/connect_db.php';

        $sql='SELECT id_departamento, departamento, imagem FROM departamentos';

        //executa o SQL na base de dados e guarda no array $resultado
        $resultado = $bd->query($sql);

        //escreve o link em html enquanto houver resultados na base de dados
        while($linha = $resultado->fetch_assoc()) {
            echo '<li><a href="departamento.php?id='.$linha["id_departamento"].'">'.$linha["departamento"].'</a></li>';
        };

        //fecha a conexão com a base de dados
        $bd->close();
        ?>
            
        </ul>
    </div>
    <div class="col-9">
        <?php
        //conecção à base de dados
        include '../php/connect_db.php';

        $sql="SELECT * FROM departamentos WHERE id_departamento LIKE '".$idDepartamento."';";
        
        //executa o SQL na base de dados e guarda no array $resultado
        $resultado=$bd->query($sql);

        //transfere o resultado do array $resultado para uma variável simples $linha
        $linha = $resultado->fetch_assoc();

        //encerra a conexão com a base de dados
        $bd->close();
        ?>
        <h1 style="padding-left: 15px"><?php echo $linha["departamento"] ?></h1>
        
        <table>
            <tr>
                <th>Nome</th>
                <th>Apelido</th>
                <th>Contratação</th>
                <?php
                //verifica se o utilizador que iniciou sessão tem permissão para alterar os registos da base de dados e coloca a opção se tiver
                if($_SESSION["acesso"]==1)
                    echo'<th>Editar</th>';
                ?>
            </tr>
            <?php
            ///conexão à base de dados
            include '../php/connect_db.php';

            $sql="SELECT empregados.id_empregado, empregados.nome as nome, empregados.apelido as apelido, empregados.titulo as titulo, data_contratacao as contratacao
            FROM departamento_empregado
            INNER JOIN empregados ON departamento_empregado.id_empregado = empregados.id_empregado
            INNER JOIN departamentos ON departamento_empregado.id_departamento = departamentos.id_departamento
            WHERE departamento_empregado.id_departamento = ".$idDepartamento;

            //executa o SQL na base de dados e guarda no array $resultado
            $resultado=$bd->query($sql);

            //escreve o conteúdo da tabela em html enquanto houver resultados na base de dados
            while($linha = $resultado->fetch_assoc()){
                echo '
                    <tr>
                        <td>'.$linha["titulo"].' '.$linha["nome"].'</td>
                        <td>'.$linha["apelido"].'</td>
                        <td>'.$linha["contratacao"].'</td>';
                //verifica se o utilizador que iniciou sessão tem permissão para alterar os registos da base de dados e coloca a opção se tiver
                if($_SESSION['acesso']==1)
                echo '<td><a href="empregado.php?id='.$linha["id_empregado"].'" style="color: black">Editar</a>';

                echo '</tr>';
            }
            //encerra a conexão com a a base de dados
            $bd->close();
            ?>
        </table>
    </div>
</div>
        </div>
<?php
//coloca o footer na página
include 'footer.php';
?>
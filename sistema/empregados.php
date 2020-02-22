<?php
//inicia as variaveis de sessão
session_start();
//verifica se a sessão está iniciada e, caso não esteja, direciona para a página de login
if(!isset($_SESSION["idSessao"])){
    header('location: ../index.php');
}
//adiciona o header da página
include 'header.php';
?>
<div class="inner">
    <div class="row">
        <div class="col-12">
            <form action="empregados.php" method="get" style="margin-left: 35%;">
                <input type="search" name="pesquisa" alt="pesquisa" id="pesquisaEmpregado" placeholder="Pesquisar">
            </form>
        </div>
        <div class="col-12">
            <?php            
            //verifica se foi feita uma pesquisa
            if(isset($_GET["pesquisa"])){
                $pesquisa=$_GET["pesquisa"];
                //SQL que pesquisa segundo o que o utilizador pesquisou, quer seja por nome, apelido ou ambos
                $sql="SELECT empregados.id_empregado, empregados.nome, empregados.apelido, empregados.data_contratacao 
                FROM empregados
                WHERE concat(empregados.nome , ' ' , empregados.apelido) LIKE '".$pesquisa."%'
                OR  empregados.nome LIKE '".$pesquisa."%' OR  empregados.nome LIKE '%".$pesquisa."'
                OR  empregados.apelido LIKE '".$pesquisa."%'  OR empregados.apelido LIKE '%".$pesquisa."'";
            }else{
                $sql="SELECT empregados.id_empregado, empregados.nome, empregados.apelido, empregados.data_contratacao FROM empregados";
            }
            //conexão à base de dados
            include '../php/connect_db.php';

            //executa o sql ma base de dados e guarda o array $resultado
            $resultado = $bd->query($sql);

            //verifica se a base de dados devolve algum valor
            if($resultado->num_rows!=0){
               //escreve o conteúdo da tabela em HTML enqanto houbver resultados na base de dados
               echo '<table>
                        <tr>
                            <th>Nome</th>
                            <th>Apelido</th>
                            <th>Contratação</th>
                        </tr>';
                while($linha = $resultado->fetch_assoc()){
                    echo '
                        <tr>
                            <td>'.$linha["nome"].'</td>
                            <td>'.$linha["apelido"].'</td>
                            <td>'.$linha["data_contratacao"].'</td>
                        ';
                    //verifica se o utilizador que iniciou sessão tem permissão para alterar os registos da base de dados e coloca a opção se tiver
                    if($_SESSION['acesso']==1)
                        echo '<td><a href="empregado.php?id='.$linha["id_empregado"].'" style="color: black">Editar</a>';
                    echo '</tr>';
                }
                echo'</tr></table>';
                $bd->close(); 
            }else{
                echo '<p>Não existem registos na base de dados</p>';
            }    
            ?>
            </table>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
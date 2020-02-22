<?php
//inicia as variaveis de sessão
session_start();
//verifica se a sessão está iniciada e, caso não esteja, direciona para a página de login
if(!isset($_SESSION["idSessao"])){
    header('location: ../index.php');
}
//adiciona o header da página
include 'header.php';

//caminho para a pasta que tem as imagens (a base de dados apenas contem o nome do ficheiro)
$caminhoImagem="imagens/departamentos/";
?>

        <section>
            <div class="row">
                <div class="col-12">
                    <h1 style="padding-left: 15px">Departamentos</h1>
                </div>
                <?php
                //ligação à base de dados
                include '../php/connect_db.php';
                $sql='SELECT id_departamento, departamento, imagem FROM departamentos';

                //gaurda a pesquisa à base de dados no array $resultado
                $resultado = $bd->query($sql);

                //escreve os resultados da pesquisa caso os haja e enquanto os houver
                if ($resultado->num_rows > 0) {
                    while($linha = $resultado->fetch_assoc()) {
                        echo '
                            <a href="departamento.php?id='.$linha["id_departamento"].'" id="button">
                                <div class="col-4">
                                    <img src="'.$caminhoImagem.$linha["imagem"].'">
                                    <h2 style="width: 100%; text-align: center;">'.$linha["departamento"].'</h2>
                                </div>
                            </a>
                        ';
                    }
                } else {
                    echo '
                        <div class="col-3">
                            <p>Não Existem departamentos na base de dados</p>
                        </div>';
                }
                //fecha a conexão com a base de dados
                $bd->close();
                ?>
            </div>

        </section>
          
<?php
//carrega o footer da página
include 'footer.php';
?>
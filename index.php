<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="styleSheet.css">
        <link rel="icon" href="images/logo.png">
    </head>
    <body>
        <?php
            session_start();
            //Destroi qualquer sessao ativa
            if(isset($_SESSION["idSessao"])){
                session_unset();
                session_destroy();
            }
            
            //Verifica se a variavel que diz que o e-mail não existe na bd esta definida e envia um alerta para o ecrã a informar o utilizador
            if(isset($_GET["naoExiste"])){
                echo 
                "<script>
                    alert(\"O utilizador e-mail não existe!\");
                </script>";
            }

            //Verifica se a variavel que diz que a palavra passe esta errada esta definida e envia um alerta para informar o utilizador
            if(isset($_GET["palavraPasseErrada"])){
                echo 
                "<script>
                    alert(\"A palavra-passe está errada.\");
                </script>";
            }
        ?>
        <div class="row" style="margin-top: 5%">
            <div class="col-4"></div>
            <div class="col-4 box">
                <img width="50%" src="images/logo.png" alt="logo">
                <form action="php/login.php" method="POST">
                    <input type="email" placeholder="e-mail" name="email" alt="email" required>
                    <input type="password" placeholder="Password" name="password" alt="password" required>
                    <input type="submit" name="submit" value="Login" alt="login">
                    <input type="button" value="Registar" onclick="location.href='registar.html';" alt="registar">
                </form>
            </div>
        </div>
    </body>
</html>
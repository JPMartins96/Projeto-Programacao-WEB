<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="icon" href="../images/logo.png">
        <link rel="stylesheet" href="styleSheet.css">
        <link rel="stylesheet" href="slideShowSheet.css">
    </head>
    <body>
        <header>
            <div class="row" style="text-align: justify">
                <div class="col-1">
                    <a href="home.php"><img src="../images/logo.png" width="70%"></a>
                </div>
                <div class="col-10" style="margin-top:15px;">
                    <a href="home.php">Home</a>
                    <a href="departamentos.php">Departamentos</a>
                    <a href="empregados.php">Empregados</a>
                    <?php 
                    //verifica se o utilizador que tem sessão iniciada tem permissão para aceder à area de administração
                    if ($_SESSION["acesso"]==1) echo'<a href="administracao.php">Administração</a>'; ?>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </header>
<?php
// Remove todas as variaveis de sessão
session_unset(); 

// destroi a sessão
session_destroy();

//reencaminha para  página de login
header('location: ../index.php')
?>
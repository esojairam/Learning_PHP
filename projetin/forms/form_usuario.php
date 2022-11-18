<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <?php
    if(!isset($_SESSION['id'])==true){
        session_unset();
        echo '<script>window.alert("Não está logado!");window.location.href="../index.php";</script>';
    }
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././css/style.css">
    <title>Usuário</title>
</head>
<body>
    <div class="center">
        <h1>Alterar Usuário</h1>
        <?php
        include ".././php/user.php";
        ?>
        <h1></h1>
    </div>
    
</body>
</html>
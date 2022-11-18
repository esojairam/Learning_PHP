<?php
session_start();

include_once "./php/conn.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                session_unset();
                session_destroy();
            }
        ?>
        <form action="./php/login.php" method="post">
            <div class="txt_input">
                <input type="text" name="user" required style="color:silver;">
                <span></span>
                <label>Usuário</label>
            </div>
            <div class="txt_input">
                <input type="password" name="pass" required style="color:silver;">
                <span></span>
                <label>Senha</label>
            </div>
            <input type="submit" value="Login" id="submit">
            <div class="link">
                Não tem uma conta? <a href="./forms/form_cadastro.php">Cadastre-se</a>
            </div>
        </form>
    </div>
</body>
</html>
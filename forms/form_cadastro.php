<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././css/style.css">
    <title>Cadastrar</title>
</head>
<body>
    <div class="center">
        <h1>Cadastro</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form action=".././php/cadastro.php" method="post">
            <div class="txt_input">
                <input type="text" name="nome" required minlength="2" maxlength="40" style="color:silver;">
                <span></span>
                <label>Nome</label>
            </div>
            <div class="txt_input">
                <input type="text" name="sobrenome" required minlength="2" maxlength="40" style="color:silver;">
                <span></span>
                <label>Sobrenome</label>
            </div>
            <div class="txt_input">
                <input type="text" name="user" required required minlength="2" maxlength="30" style="color:silver;">
                <span></span>
                <label>Usuário</label>
            </div>
            <div class="txt_input">
                <input type="email" name="email" required required maxlength="70" style="color:silver;">
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_input">
                <input type="password" name="pass" required minlength="5" maxlength="40" style="color:silver;">
                <span></span>
                <label>Senha</label>
            </div>
            <div class="txt_input">
                <input type="password" name="repass" required minlength="5" maxlength="40" style="color:silver;">
                <span></span>
                <label>Repetir Senha</label>
            </div>
            <input type="submit" value="Cadastrar">
            <div class="link">
                Já tem cadastro? <a href="index.php">Logar</a>
            </div>
        </form>
    </div>
</body>
</html>
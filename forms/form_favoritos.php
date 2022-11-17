<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <?php
    session_start();
    if(!isset($_SESSION['id'])==true){
        session_unset();
        echo '<script>window.alert("Não está logado!");window.location.href="index.php";</script>';
    }
    ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././css/fav_style.css">
    <title>Favoritos</title>
</head>
<body>
    <header class="header">
        <a href="form_usuario.php" id="add" name="add"><img src=".././imgs/user.png" alt="adicionar"></a>
        <h1>Favoritos</h1>
        <a href=".././php/logout.php" id="logout" name="logout"><img src=".././imgs/logout.png" alt="logout"></a>

    </header>
    <div class="container">
        <div class="fav">
            <?php
            include ".././php/fav_filme.php";
            ?>
            <h1></h1>
            <form action=".././php/cad_filme_serie.php" method="post">
                <input type="submit" value="Cadastrar" name="cad_filme">
                <br>
            </form>
        </div>
        <div class="fav">
            <?php
            include ".././php/fav_serie.php";
            ?>
            <h1></h1>
            <form action=".././php/cad_filme_serie.php" method="post">
                <input type="submit" value="Cadastrar" name="cad_serie">
                <br>
            </form>
        </div>
    </div>
</body>
</html>
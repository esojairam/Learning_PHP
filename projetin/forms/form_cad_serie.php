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
    <title>Cadastro Série</title>
</head>
<body>
    <div class="center">
        <h1>Cadastrar Série</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form action=".././php/cad_serie.php" method="post">
            <div class="txt_input">
                <input type="text" name="nome_serie" required maxlength="30" style="color:silver;">
                <span></span>
                <label>Nome da Série</label>
            </div>
            <div class="txt_input">
                <input type="text" name="genero_serie" placeholder="                   Ex: Ação/Aventura" required maxlength="30" style="color:silver;">
                <span></span>
                <label>Gênero</label>
            </div>
            <div class="txt_input">
                <input type="number" name="qtd_temp" required max="50" style="color:silver;">
                <span></span>
                <label>Quantidade de temporadas</label>
            </div>
            <div class="txt_input">
                <input type="number" name="tot_ep" required style="color:silver;">
                <span></span>
                <label>Total de episódios</label>
            </div>
            <div class="txt_input">
                <input type="number" name="avaliacao_serie" placeholder="                   De 1 até 10" required max="10" min="1" style="color:silver;">
                <span></span>
                <label>Avaliação</label>
            </div>
            <input type="submit" value="Cadastrar" name="cadserie">
            <div class="link"></div>
        </form>
    </div>
</body>
</html>
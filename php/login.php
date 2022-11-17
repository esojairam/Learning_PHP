<?php

session_start();
ob_start();

include_once "conn.php";

$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);


$query_login="SELECT id_user,usuario,senha FROM tb_user
            WHERE usuario=:user AND senha=:pass";
$login=$conn->prepare($query_login);
$login->bindParam(':user',$dados['user']);
$login->bindParam(':pass',$dados['pass']);
$login->execute();

while($row_login=$login->fetch(PDO::FETCH_ASSOC)){
    extract($row_login);
};

if($usuario == $dados['user'] && $senha == $dados['pass']) {
    header('Location: .././forms/form_favoritos.php');
    $_SESSION['id']=$id_user;
}else if($usuario != $dados['user'] || $senha != $dados['pass']){
    $_SESSION['msg']='<script>window.alert("Usuário ou Senha Incorretos!");</script>';
    header("Location: .././forms/index.php");
    die();
    session_unset();
    session_destroy();
}


?>
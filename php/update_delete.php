<?php
session_start();
include_once "conn.php";

$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);


if(isset($dados['voltar_x'])){

    header('Location: .././forms/form_favoritos.php');

}else if(isset($dados['salvar_x'])){

    $query_update="UPDATE tb_user 
                    SET nome=?, sobrenome=?, usuario=?, email=?, senha=? 
                    WHERE id_user=?";
    $update=$conn->prepare($query_update);
    $update->execute([$dados['nome'],$dados['sobrenome'],$dados['user'],$dados['email'],$dados['pass'],$_SESSION['id']]);

    header('Location: .././forms/form_favoritos.php');

}else if(isset($dados['deletar_x'])){

    $query_del_serie="DELETE s FROM tb_serie s
                        JOIN tb_user_serie rus ON s.id_serie=rus.fk_serie
                        WHERE fk_user=?";
    $dell_serie=$conn->prepare($query_del_serie);
    $dell_serie->execute([$_SESSION['id']]);

    $query_del_filme="DELETE f FROM tb_filme f	
                        JOIN tb_user_filme ruf ON f.id_filme=ruf.fk_filme
                        WHERE fk_user=?";
    $dell_filme=$conn->prepare($query_del_filme);
    $dell_filme->execute([$_SESSION['id']]);

    $query_del_user="DELETE u FROM tb_user u
                        WHERE id_user=?";
    $dell_user=$conn->prepare($query_del_user);
    $dell_user->execute([$_SESSION['id']]);

    $_SESSION['msg']='<script>window.alert("Usuário deletado com sucesso!");</script>';
    header("Location: ../index.php");

}





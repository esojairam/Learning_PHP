<?php

session_start();

include_once "conn.php";

$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);

$query_filme="INSERT INTO tb_filme (nome_filme,genero_filme,avaliacao_filme) 
                VALUES (:nome_filme,:genero_filme,:avaliacao_filme)";
$cad_filme=$conn->prepare($query_filme);
$cad_filme->bindParam(':nome_filme',$dados['nome_filme']);
$cad_filme->bindParam(':genero_filme',$dados['genero_filme']);
$cad_filme->bindParam(':avaliacao_filme',$dados['avaliacao_filme']);
$cad_filme->execute();
$id_filme=$conn->lastInsertId();

$query_u_f="INSERT INTO tb_user_filme (fk_user,fk_filme)
                VALUES (:fk_user,:fk_filme)";
$cad_u_f=$conn->prepare($query_u_f);
$cad_u_f->bindParam(':fk_user',$_SESSION['id']);
$cad_u_f->bindParam(':fk_filme',$id_filme);
$cad_u_f->execute();

header('Location: .././forms/form_favoritos.php');


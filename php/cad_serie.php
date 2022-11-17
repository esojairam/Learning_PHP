<?php

session_start();

include_once "conn.php";

$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);

$query_serie="INSERT INTO tb_serie (nome_serie,genero_serie,qtd_temp,tot_ep,avaliacao_serie)
                VALUES (:nome_serie,:genero_serie,:qtd_temp,:tot_ep,:avaliacao_serie)";
$cad_serie=$conn->prepare($query_serie);
$cad_serie->bindParam(':nome_serie',$dados['nome_serie']);
$cad_serie->bindParam(':genero_serie',$dados['genero_serie']);
$cad_serie->bindParam(':qtd_temp',$dados['qtd_temp']);
$cad_serie->bindParam(':tot_ep',$dados['tot_ep']);
$cad_serie->bindParam(':avaliacao_serie',$dados['avaliacao_serie']);
$cad_serie->execute();
$id_serie=$conn->lastInsertId();

$query_u_s="INSERT INTO tb_user_serie (fk_user,fk_serie)
                VALUES (:fk_user,:fk_serie)";
$cad_u_s=$conn->prepare($query_u_s);
$cad_u_s->bindParam(':fk_user',$_SESSION['id']);
$cad_u_s->bindParam(':fk_serie',$id_serie);
$cad_u_s->execute();

header('Location: .././forms/form_favoritos.php');
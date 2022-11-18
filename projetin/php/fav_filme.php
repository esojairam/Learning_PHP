<?php


include "conn.php";

$query_filmes="SELECT id_filme,nome_filme,genero_filme,avaliacao_filme FROM tb_filme f
                JOIN tb_user_filme ruf ON f.id_filme=ruf.fk_filme
                WHERE fk_user=:fk_user
                ORDER BY avaliacao_filme DESC";
$show_filmes=$conn->prepare($query_filmes);
$show_filmes->bindParam(':fk_user',$_SESSION['id']);
$show_filmes->execute();


echo"<h1>Filmes</h1>";

while($row_filmes=$show_filmes->fetch(PDO::FETCH_ASSOC)){
    extract($row_filmes);
    echo"
            <h1></h1>
            <br>
            <h2>Nome do Filme: $nome_filme </h2>
            <h2>Gênero Filme: $genero_filme</h2>
            <h2>Avaliação: $avaliacao_filme</h2>

        ";
}





<?php


include "conn.php";

$query_series="SELECT id_serie,nome_serie,genero_serie,qtd_temp,tot_ep,avaliacao_serie FROM tb_serie s
                JOIN tb_user_serie rus ON s.id_serie=rus.fk_serie
                WHERE fk_user=:fk_user
                ORDER BY avaliacao_serie DESC";
$show_series=$conn->prepare($query_series);
$show_series->bindParam(':fk_user',$_SESSION['id']);
$show_series->execute();



echo"<h1>Séries</h1>";

while($row_series=$show_series->fetch(PDO::FETCH_ASSOC)){
    extract($row_series);
    echo"
            <h1></h1>
            <br>
            <h2>Nome da Série: $nome_serie</h2>
            <h2>Gênero Série: $genero_serie</h2>
            <h2>Quantidade de Temporadas: $qtd_temp</h2>
            <h2>Total de Episódios: $tot_ep</h2>
            <h2>Avaliação: $avaliacao_serie</h2>

            ";
}

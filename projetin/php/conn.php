<?php

$host="localhost";
$user="root";
$pass="";
$dbname="db_trabalho";

try{
    $conn=new PDO("mysql:host=$host;dbname=".$dbname,$user,$pass);
    //echo"Conexão realizada com sucesso!";
}
catch(PDOException $er){
    echo "Erro!!".$er->getMessage();
}

?>
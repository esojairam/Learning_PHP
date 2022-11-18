<?php

include_once "conn.php";

$cad_filme=$_POST['cad_filme'];
$cad_serie=$_POST['cad_serie'];

if(isset($cad_filme)){
    header('Location: .././forms/form_cad_filme.php');
}else if(isset($cad_serie)){
    header('Location: .././forms/form_cad_serie.php');
}


?>
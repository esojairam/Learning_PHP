<?php

session_start();//Iniciar sessao deve ser a 1º linha 

//Limpar buffer de saída
ob_start();

//Incluir conexao com o BANCO DE DADOS
include_once "conn.php";

//Receber dados do formulario
$dados=filter_input_array(INPUT_POST,FILTER_DEFAULT);

//Verificar se o usuario ja existe na base de dados
$query_user="SELECT usuario FROM tb_user
                WHERE usuario=:user";
$check_user=$conn->prepare($query_user);
$check_user->bindParam(':user',$dados['user']);
$check_user->execute();
$row_user=$check_user->fetch(PDO::FETCH_ASSOC);//Pegar os dados do banco

if($row_user['usuario']==$dados['user']){
    $_SESSION['msg']='<script>window.alert("Usuário já cadastrado!");</script>';
    header("Location: .././forms/form_cadastro.php");
    die();
}

//Verificar se o email ja existe na base de dados
$query_email="SELECT email FROM tb_user
                WHERE email=:email";
$check_email=$conn->prepare($query_email);
$check_email->bindParam(':email',$dados['email']);
$check_email->execute();
$row_email=$check_email->fetch(PDO::FETCH_ASSOC);//Pegar os dados do banco

if($row_email['email']==$dados['email']){
    $_SESSION['msg']='<script>window.alert("Email já cadastrado!");</script>';
    header("Location: .././forms/form_cadastro.php");
    die();
}

//Verificar se as senhas estao iguais 
if($dados['pass']==$dados['repass']){
    $query="INSERT INTO tb_user (nome,sobrenome,usuario,email,senha)
                VALUES (:nome,:sobrenome,:usuario,:email,:senha)";
    $cad_user=$conn->prepare($query);
    $cad_user->bindParam(':nome',$dados['nome']);
    $cad_user->bindParam(':sobrenome',$dados['sobrenome']);
    $cad_user->bindParam(':usuario',$dados['user']);
    $cad_user->bindParam(':email',$dados['email']);
    $cad_user->bindParam(':senha',$dados['pass']);
    $cad_user->execute();
    var_dump($conn->lastInsertId());

    $_SESSION['msg']='<script>window.alert("Cadastrado com sucesso!");</script>';
    header("Location: .././forms/index.php");
}else{
    $_SESSION['msg']='<script>window.alert("Senhas não conferem");</script>';
    header("Location: .././forms/form_cadastro.php");
    die();
}


?>
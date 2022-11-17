<?php

include_once "conn.php";

$query_user="SELECT * FROM tb_user
                WHERE id_user=:id_user";
$user=$conn->prepare($query_user);
$user->bindParam(':id_user',$_SESSION['id']);
$user->execute();

while($row_user=$user->fetch(PDO::FETCH_ASSOC)){
    extract($row_user);
    echo"
    <form action='.././php/update_delete.php' method='post'>
    <div class='txt_input'>
        <input type='text' name='nome' required minlength='2' maxlength='40' value='$nome' style='color:silver;'>
        <span></span>
        <label>Nome</label>
    </div>
    <div class='txt_input'>
        <input type='text' name='sobrenome' required minlength='2' maxlength='40' value='$sobrenome' style='color:silver;'>
        <span></span>
        <label>Sobrenome</label>
    </div>
    <div class='txt_input'>
        <input type='text' name='user' required required minlength='2' maxlength='30' value='$usuario' style='color:silver;'>
        <span></span>
        <label>Usuário</label>
    </div>
    <div class='txt_input'>
        <input type='email' name='email' required required maxlength='70' value='$email' style='color:silver;'>
        <span></span>
        <label>Email</label>
    </div>
    <div class='txt_input'>
        <input type='password' name='pass' required minlength='5' maxlength='40' value='$senha' style='color:silver;'>
        <span></span>
        <label>Senha</label>
    </div>
    <input type='image' src='.././imgs/voltar.png' name='voltar' >
    <input type='image' src='.././imgs/salvar.png' name='salvar' style='margin-left: 110px;'>
    <input type='image' src='.././imgs/deletar.png' name='deletar' style='margin-left: 110px;'>
    <h4>Voltar-------------------Salvar------------------Deletar</h4>
    </form> 
    

    ";
}
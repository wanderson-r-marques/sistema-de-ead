<?php 
require_once 'valida.php';
if (isset($_POST['descricao']) && $_POST['descricao'] != null){
    $ensino = addslashes($_POST['descricao']);
    $query = "INSERT INTO ensinos (descricao) VALUES (:descricao)";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':descricao',$ensino,PDO::PARAM_STR);   
    if($smtp->execute()){
        session_start();
        $_SESSION['msg'] = "Ensino cadastrada com sucesso!#success";
        header('Location: ensinos.php');
    }else{
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao cadastrar so Ensino !#danger";
        header('Location: ensinos.php');
    }
}
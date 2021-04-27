<?php 
require_once 'valida.php';
if (isset($_POST['descricaov']) && $_POST['descricao'] != null){
    $disciplina = addslashes($_POST['descricao']);
    $query = "INSERT INTO ensinos (descricao) VALUES (:descricao)";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':disciplina',$disciplina,PDO::PARAM_STR);
    if($smtp->execute()){
        session_start();
        $_SESSION['msg'] = "Ensino cadastrada com sucesso!#success";
        header('Location: ensino.php');
    }else{
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao cadastrar so Ensino !#danger";
        header('Location: ensino.php');
    }
}
<?php 
require_once 'valida.php';
if (isset($_POST['disciplina']) && $_POST['disciplina'] != null){
    $disciplina = addslashes($_POST['disciplina']);
    $query = "INSERT INTO disciplinas (descricao) VALUES (:disciplina)";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':disciplina',$disciplina,PDO::PARAM_STR);
    if($smtp->execute()){
        session_start();
        $_SESSION['msg'] = "Disciplina cadastrada com sucesso!#success";
        header('Location: disciplinas.php');
    }else{
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a disciplina!#danger";
        header('Location: disciplinas.php');
    }
}
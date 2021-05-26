<?php
require_once 'valida.php';
// Função para cadastrar 
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['descricao']) && $_POST['descricao'] != null) {
        $ensino = addslashes($_POST['descricao']);
        $query = "INSERT INTO ensinos (descricao) VALUES (:descricao)";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':descricao', $ensino, PDO::PARAM_STR);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Ensino cadastrado com sucesso!#success";
            header('Location: ensinos.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar o Ensino !#danger";
            header('Location: ensinos.php');
        }
    }
}
// Fim da função cadastrar

// Função para editar 
if ($_GET['funcao'] == 'editar') {
    if (isset($_POST['descricao']) && $_POST['descricao'] != null) {
        $ensino = addslashes($_POST['descricao']);
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE ensinos SET DESCRICAO = :descricao WHERE PK_ENSINOS = :pk";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':descricao', $ensino, PDO::PARAM_STR);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Ensino editado com sucesso!#success";
            header('Location: ensinos.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar o Ensino !#danger";
            header('Location: ensinos.php');
        }
    }
}
// Fim da função editar

// Função para deletar
if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM ensinos WHERE PK_ENSINOS = :pk";
    $smtp = $con->prepare($query);    
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Ensino deletado com sucesso!#success";
        header('Location: ensinos.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar o ensino!#danger";
        header('Location: ensinos.php');
    }
}
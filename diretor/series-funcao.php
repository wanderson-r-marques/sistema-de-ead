<?php
require_once 'valida.php';
// Função para cadastrar 
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['descricao']) && $_POST['descricao'] != null) {
        $serie = addslashes($_POST['descricao']);
        $query = "INSERT INTO series (descricao) VALUES (:descricao)";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':descricao', $serie, PDO::PARAM_STR);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Série cadastrado com sucesso!#success";
            header('Location: series.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar o Série !#danger";
            header('Location: series.php');
        }
    }
}
// Fim da função cadastrar

// Função para editar 
if ($_GET['funcao'] == 'editar') {
    if (isset($_POST['descricao']) && $_POST['descricao'] != null) {
        $serie = addslashes($_POST['descricao']);
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE series SET DESCRICAO = :descricao WHERE PK_SERIES = :pk";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':descricao', $serie, PDO::PARAM_STR);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Série editado com sucesso!#success";
            header('Location: series.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar o Série !#danger";
            header('Location: series.php');
        }
    }
}
// Fim da função editar

// Função para deletar
if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM series WHERE PK_SERIES = :pk";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Série deletado com sucesso!#success";
        header('Location: series.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar o série!#danger";
        header('Location: series.php');
    }
}

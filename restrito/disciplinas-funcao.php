<?php
require_once 'valida.php';
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['disciplina']) && $_POST['disciplina'] != null) {
        $disciplina = addslashes($_POST['disciplina']);
        $query = "INSERT INTO disciplinas (descricao) VALUES (:disciplina)";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Disciplina cadastrada com sucesso!#success";
            header('Location: disciplinas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a disciplina!#danger";
            header('Location: disciplinas.php');
        }
    }
}

if ($_GET['funcao'] == 'editar' && is_numeric($_GET['pk'])) {
    if (isset($_POST['disciplina']) && $_POST['disciplina'] != null) {
        $disciplina = addslashes($_POST['disciplina']);
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE disciplinas SET DESCRICAO = :disciplina WHERE PK_DISCIPLINAS = :pk";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':disciplina', $disciplina, PDO::PARAM_STR);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Disciplina editada com sucesso!#success";
            header('Location: disciplinas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar a disciplina!#danger";
            header('Location: disciplinas.php');
        }
    }
}

if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM disciplinas WHERE PK_DISCIPLINAS = :pk";
    $smtp = $con->prepare($query);    
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Disciplina deletada com sucesso!#success";
        header('Location: disciplinas.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar a disciplina!#danger";
        header('Location: disciplinas.php');
    }
}

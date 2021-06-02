<?php
require_once 'valida.php';
// Função para cadastrar
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['escola']) && $_POST['escola'] != null) {
        $escola = addslashes($_POST['escola']);
        $turma = addslashes($_POST['turma']);
        $serie = addslashes($_POST['serie']);
        $turno = addslashes($_POST['turno']);        
        
        $query = "INSERT INTO `turmas` (
            `DESCRICAO`,
            `PK_SERIE`,
            `PK_ESCOLA`,
            `PK_TURNO`            
          )
          VALUES
            (
              :DESCRICAO,
              :PK_SERIE,
              :PK_ESCOLA,
              :PK_TURNO
            )";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':DESCRICAO', $turma, PDO::PARAM_STR);
        $smtp->bindParam(':PK_SERIE', $serie, PDO::PARAM_INT);
        $smtp->bindParam(':PK_ESCOLA', $escola, PDO::PARAM_INT);
        $smtp->bindParam(':PK_TURNO', $turno, PDO::PARAM_INT);        

        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Turma cadastrada com sucesso!#success";
            header('Location: turmas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a Turma!#danger";
            header('Location: turmas.php');
        }
    }
}
// Função para editar
if ($_GET['funcao'] == 'editar' && is_numeric($_GET['pk'])) {
    if (isset($_POST['escola']) && $_POST['escola'] != null) {
        $escola = addslashes($_POST['escola']);
        $turma = addslashes($_POST['turma']);
        $serie = addslashes($_POST['serie']);
        $turno = addslashes($_POST['turno']);  
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE
        `turmas`
        SET
            `DESCRICAO` = '$turma',
            `PK_SERIE` = '$serie',
            `PK_ESCOLA` = '$escola',
            `PK_TURNO` = '$turno'           
        WHERE `PK_TURMA` = $pk;

      ";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Turma editada com sucesso!#success";
            header('Location: turmas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar a Turma!#danger";
            header('Location: turmas.php');
        }
    }
}
// Função para deletar
if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM turmas WHERE PK_TURMA = :pk";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Turma deletada com sucesso!#success";
        header('Location: turmas.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar a Turma!#danger";
        header('Location: turmas.php');
    }
}

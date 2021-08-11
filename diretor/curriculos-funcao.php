<?php
require_once 'valida.php';
// Função para cadastrar
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['disciplinas']) && $_POST['disciplinas'] != null) {
        $ensino = addslashes($_POST['ensino']);
        $curriculo = addslashes($_POST['curriculo']);
        $serie = addslashes($_POST['serie']);
        $disciplinas = $_POST['disciplinas'];
        // $ordem = $_POST['ordem'];
        foreach ($disciplinas as $disciplina) {

            $query = "INSERT INTO `curriculo` (
                `descricao`,
                `serie`,
                `disciplina`,
                `ensino`          
              )
              VALUES
                (
                  :DESCRICAO,
                  :PK_SERIE,
                  :PK_ENSINO,
                  :PK_DISCIPLINA
                )";
            $smtp = $con->prepare($query);
            $smtp->bindParam(':DESCRICAO', $curriculo, PDO::PARAM_STR);
            $smtp->bindParam(':PK_SERIE', $serie, PDO::PARAM_INT);
            $smtp->bindParam(':PK_ENSINO', $ensino, PDO::PARAM_INT);
            $smtp->bindParam(':PK_DISCIPLINA', $disciplina, PDO::PARAM_INT);

            $bool = $smtp->execute();
        }

        if ($bool) {
            session_start();
            $_SESSION['msg'] = "Currículo cadastrado com sucesso!#success";
            header('Location: curriculos.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar o Currículo!#danger";
            header('Location: curriculos.php');
        }
    }
}
// Função para editar
if ($_GET['funcao'] == 'editar' && is_numeric($_GET['pk'])) {
    if (isset($_POST['disciplina']) && $_POST['disciplina'] != null) {


        $ensino = addslashes($_POST['ensino']);
        $curriculo = addslashes($_POST['curriculo']);
        $serie = addslashes($_POST['serie']);
        $disciplina = $_POST['disciplina'];
        $pk = addslashes($_GET['pk']);

        $query = "UPDATE
            `curriculo`
            SET
                `descricao` = '$curriculo',
                `serie` = '$serie',
                `disciplina` = '$disciplina',
                `ensino` = '$ensino'           
            WHERE `curriculo` = :pk;
            ";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);

        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Currículo editado com sucesso!#success";
            header('Location: curriculos.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar o Currículo!#danger";
            header('Location: curriculos.php');
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
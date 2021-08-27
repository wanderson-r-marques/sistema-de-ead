<?php
require_once 'valida.php';
// Função para cadastrar
if ($_GET['funcao'] == 'cadastrar') {
    if (isset($_POST['escola']) && $_POST['escola'] != null) {
        $escola = addslashes($_POST['escola']);
        $cod = addslashes($_POST['cod']);
        $cep = addslashes($_POST['cep']);
        $logradouro = addslashes($_POST['logradouro']);
        $numero = addslashes($_POST['numero']);
        $complemento = addslashes($_POST['complemento']);
        $bairro = addslashes($_POST['bairro']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);

        $query = "INSERT INTO `infor407_eap`.`escolas` (
            `DESCRICAO`,
            `COD_INEP`,
            `LOGRADOURO`,
            `NUMERO`,
            `COMPLEMENTO`,
            `BAIRRO`,
            `CIDADE`,
            `ESTADO`,
            `CEP`
          )
          VALUES
            (
              :DESCRICAO,
              :COD_INEP,
              :LOGRADOURO,
              :NUMERO,
              :COMPLEMENTO,
              :BAIRRO,
              :CIDADE,
              :ESTADO,
              :CEP
            )";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':DESCRICAO', $escola, PDO::PARAM_STR);
        $smtp->bindParam(':COD_INEP', $cod, PDO::PARAM_INT);
        $smtp->bindParam(':LOGRADOURO', $logradouro, PDO::PARAM_STR);
        $smtp->bindParam(':NUMERO', $numero, PDO::PARAM_STR);
        $smtp->bindParam(':COMPLEMENTO', $complemento, PDO::PARAM_STR);
        $smtp->bindParam(':BAIRRO', $bairro, PDO::PARAM_STR);
        $smtp->bindParam(':CIDADE', $cidade, PDO::PARAM_STR);
        $smtp->bindParam(':ESTADO', $estado, PDO::PARAM_STR);
        $smtp->bindParam(':CEP', $cep, PDO::PARAM_STR);

        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Escola cadastrada com sucesso!#success";
            header('Location: escolas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar a Escola!#danger";
            header('Location: escolas.php');
        }
    }
}
// Função para editar
if ($_GET['funcao'] == 'editar' && is_numeric($_GET['pk'])) {
    if (isset($_POST['escola']) && $_POST['escola'] != null) {
        $escola = addslashes($_POST['escola']);
        $cod = addslashes($_POST['cod']);
        $logradouro = addslashes($_POST['logradouro']);
        $numero = addslashes($_POST['numero']);
        $complemento = addslashes($_POST['complemento']);
        $bairro = addslashes($_POST['bairro']);
        $cidade = addslashes($_POST['cidade']);
        $estado = addslashes($_POST['estado']);
        $cep = addslashes($_POST['cep']);
        $pk = addslashes($_GET['pk']);
        $query = "UPDATE
        `escolas`
        SET
            `DESCRICAO` = '$escola',
            `COD_INEP` = '$cod',
            `LOGRADOURO` = '$logradouro',
            `NUMERO` = '$numero',
            `COMPLEMENTO` = '$complemento',
            `BAIRRO` = '$bairro',
            `CIDADE` = '$cidade',
            `ESTADO` = '$estado',
            `CEP` = '$cep'
        WHERE `PK_ESCOLA` = $pk;

      ";
        $smtp = $con->prepare($query);
        $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
        if ($smtp->execute()) {
            session_start();
            $_SESSION['msg'] = "Escola editada com sucesso!#success";
            header('Location: escolas.php');
        } else {
            session_start();
            $_SESSION['msg'] = "Ocorreu um erro ao editar a Escola!#danger";
            header('Location: escolas.php');
        }
    }
}
// Função para deletar
if ($_GET['funcao'] == 'deletar' && is_numeric($_GET['pk'])) {
    $pk = addslashes($_GET['pk']);
    $query = "DELETE FROM escolas WHERE PK_ESCOLA = :pk";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':pk', $pk, PDO::PARAM_INT);
    if ($smtp->execute()) {
        session_start();
        $_SESSION['msg'] = "Escola deletada com sucesso!#success";
        header('Location: escolas.php');
    } else {
        session_start();
        $_SESSION['msg'] = "Ocorreu um erro ao deletar a Escola!#danger";
        header('Location: escolas.php');
    }
}

// Função para cadastrar o professor na turma
if ($_GET['funcao'] == 'professorTurma') {
    if (isset($_POST['escola']) && $_POST['escola'] != null) {
        $escola = addslashes($_POST['escola']);
        $professor = addslashes($_POST['professor']);
        $turmas = $_POST['turmas'];

        $disciplina = addslashes($_POST['disciplina']);
        $anoLetivo = addslashes($_POST['anoLetivo']);
        foreach ($turmas as $turma) {

            try {
                $query = "INSERT INTO `professor_turmas_disciplinas` (
            `pk_turma`,
            `pk_disciplinas`,
            `pk_escola`,
            `pk_entidade`,
            `ano_letivo`
          )
          VALUES
            (  
              :pk_turma,
              :pk_disciplinas,
              :pk_escola,
              :pk_entidade,
              :ano_letivo
            )";
                $smtp = $con->prepare($query);
                $smtp->bindParam(':pk_turma', $turma, PDO::PARAM_INT);
                $smtp->bindParam(':pk_disciplinas', $disciplina, PDO::PARAM_INT);
                $smtp->bindParam(':pk_escola', $escola, PDO::PARAM_INT);
                $smtp->bindParam(':pk_entidade', $professor, PDO::PARAM_INT);
                $smtp->bindParam(':ano_letivo', $anoLetivo, PDO::PARAM_INT);
                $smtp->execute();
            } catch (PDOException $e) {
                session_start();
                $_SESSION['msg'] = "Houve algum erro no registro: " . $turma . ": !#danger";
                header('Location: escolas-adicionar-professor-turma.php?escola=' . $escola . '&professor=' . $professor);
            }
        }

        session_start();
        $_SESSION['msg'] = "Professor associado a turma com sucesso!#success";
        header('Location: escolas-adicionar-professor-turma.php?escola=' . $escola . '&professor=' . $professor);
    }
}
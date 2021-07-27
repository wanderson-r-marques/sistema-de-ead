<?php
require_once 'valida.php';
$alunos = $_POST['alunos'];
$pk = $_POST['turma'];
$atualizado = false;
if (count($alunos) > 0) {
    // Deletar o aluno caso ele tenha saido da turma
    $query = "SELECT a.PK_ALUNOS_ESCOLAS_TURMAS, a.`PK_ENTIDADE` FROM `alunos_escolas_turmas` a
    WHERE a.`PK_TURMA` = ?";
    $smtp = $con->prepare($query);
    $smtp->execute([$pk]);
    $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
    foreach ($linhas as $linha) {
        $alunoExiste = false;
        foreach ($alunos as $aluno) {
            if ($aluno == $linha->PK_ENTIDADE) {
                $alunoExiste = true;
            }
        }
        if ($alunoExiste == false) {
            try {
                $query = "DELETE FROM `alunos_escolas_turmas`
                WHERE `PK_ALUNOS_ESCOLAS_TURMAS` = ?";
                $smtp = $con->prepare($query);
                $smtp->execute([$linha->PK_ALUNOS_ESCOLAS_TURMAS]);
                $atualizado = true;
            } catch (PDOException $e) {
                echo $e->getCode() . ': ' . $e->getMessage();
            }
        }
    }
    //  Final da função de deletar

    // Insere os novos alunos
    $query = "SELECT a.PK_ALUNOS_ESCOLAS_TURMAS, a.`PK_ENTIDADE` FROM `alunos_escolas_turmas` a
    WHERE a.`PK_TURMA` = ?";
    $smtp = $con->prepare($query);
    $smtp->execute([$pk]);
    $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
    foreach ($alunos as $aluno) {
        $alunoExiste = false;
        foreach ($linhas as $linha) {
            if ($aluno == $linha->PK_ENTIDADE) {
                $alunoExiste = true;
            }
        }
        if ($alunoExiste == false) {
            try {
                $query = "INSERT INTO `alunos_escolas_turmas` (PK_ENTIDADE,PK_TURMA) VALUES (?, ?)";
                $smtp = $con->prepare($query);
                $smtp->execute([$aluno, $pk]);
                $atualizado = true;                
            } catch (PDOException $e) {
                echo $e->getCode() . ': ' . $e->getMessage();
            }

        }
    }
    //  Final da função de inserir
    if($atualizado == true)
        echo '1';
}

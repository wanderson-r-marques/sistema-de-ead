<?php
require_once 'valida.php';
$professores = $_POST['professores'];
$pk = $_POST['escola'];
$atualizado = false;
if (count($professores) > 0) {
    // Deletar o aluno caso ele tenha saido da turma
    $query = "SELECT a.escola, a.entidade FROM professor_escola a WHERE a.escola = ?";
    $smtp = $con->prepare($query);
    $smtp->execute([$pk]);
    $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
    foreach ($linhas as $linha) {
        $existe = false;
        foreach ($professores as $professor) {
            if ($professor == $linha->entidade) {
                $existe = true;
            }
        }
        if ($existe == false) {
            try {
                $query = "DELETE FROM `professor_escola`
                WHERE `entidade` = ?";
                $smtp = $con->prepare($query);
                $smtp->execute([$linha->entidade]);
                $atualizado = true;
            } catch (PDOException $e) {
                echo $e->getCode() . ': ' . $e->getMessage();
            }
        }
    }
    //  Final da função de deletar

    // Insere os novos alunos
    $query = "SELECT a.escola, a.`entidade` FROM `professor_escola` a
    WHERE a.`escola` = ?";
    $smtp = $con->prepare($query);
    $smtp->execute([$pk]);
    $linhas = $smtp->fetchAll(PDO::FETCH_OBJ);
    foreach ($professores as $professor) {
        $existe = false;
        foreach ($linhas as $linha) {
            if ($professor == $linha->entidade) {
                $existe = true;
            }
        }
        if ($existe == false) {
            try {
                $query = "INSERT INTO `professor_escola` (entidade,escola) VALUES (?, ?)";
                $smtp = $con->prepare($query);
                $smtp->execute([$professor, $pk]);
                $atualizado = true;
            } catch (PDOException $e) {
                echo $e->getCode() . ': ' . $e->getMessage();
            }
        }
    }
    //  Final da função de inserir
    if ($atualizado == true)
        echo '1';
}
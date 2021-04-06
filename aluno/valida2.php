<?php
session_start();

if (isset($_SESSION['senha']) && isset($_SESSION['cpf'])) {
    require_once("../restrito/conexao.php");
    $con = conectar();

    $cpf = $_SESSION['cpf'];
    $senha = $_SESSION['senha'];    
    $query = "SELECT A.ENTIDADE,
       A.NOME,
       A.SENHA,
       A.INSCRICAO_FEDERAL,
       C.DESCRICAO AS CURSO,
       D.ANO_LETIVO,
       D.AC_CADASTRO_TURMA,
       E.DESCRICAO AS TURMA_DESC,
       D.AC_MATRICULA
FROM AC_CADASTRO_ALUNOS    A
     JOIN AC_CADASTRO_ALUNO_PSS B ON A.ENTIDADE           = B.ENTIDADE
     JOIN AC_CADASTRO_CURSOS    C ON B.AC_CADASTRO_CURSO  = C.AC_CADASTRO_CURSO
LEFT JOIN AC_MATRICULAS         D ON A.ENTIDADE           = D.ENTIDADE 
LEFT JOIN AC_CADASTRO_TURMAS    E ON D.AC_CADASTRO_TURMA  = E.AC_CADASTRO_TURMA

 WHERE A.INSCRICAO_FEDERAL = '$cpf' 
        
    ";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);

    if ($smtp->execute()) {
        if ($smtp->rowCount() <= 0) {
            unset($_SESSION['senha']);
            unset($_SESSION['cpf']);
            header('Location: index.php');
        }else{
            $atributo = $smtp->fetch(PDO::FETCH_OBJ);
        }
    } else {
        unset($_SESSION['senha']);
        unset($_SESSION['cpf']);
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

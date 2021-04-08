<?php
session_start();

if (isset($_SESSION['cpf'])) {
    require_once("../restrito/conexao.php");
    $con = conectar();

    $cpf = $_SESSION['cpf'];
      
    $query = "SELECT
    `NOME`,
    `NOME_FANTASIA`,
    `CPF`,
    `RG`,
    `DATA_NASCIMENTO`,
    `TELEFONE1`,
    `TELEFONE2`,
    `EMAIL`,
    `PK_TIPO_CADASTRO`,
    `MATRICULA`,
    `SENHA`,
    `COD_INEP`
  FROM
    `entidades`
  WHERE
     `PK_TIPO_CADASTRO` = 1 AND CPF = :cpf";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);   

    if ($smtp->execute()) {
        if ($smtp->rowCount() <= 0) {            
            unset($_SESSION['cpf']);
            header('Location: index.php');
        }else{
            $atributo = $smtp->fetch(PDO::FETCH_OBJ);
        }
    } else {       
        unset($_SESSION['cpf']);
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

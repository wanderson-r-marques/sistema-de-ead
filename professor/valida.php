<?php
session_start();
require_once '../config.php';
if (isset($_SESSION['cpf']) && $_SESSION['cpf'] != '') {
    $cpf = $_SESSION['cpf'];
    $con = conectar();
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
                        CPF = :cpf AND PK_TIPO_CADASTRO = 2";

    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf);

    if ($smtp->execute()) {  
        $entidade = $smtp->fetch(PDO::FETCH_OBJ);    
        if ($smtp->rowCount() <= 0) {
            $_SESSION['msg'] = "Sua sessão expirou!#danger";
            header('Location: ' . $url);
        } 
    } else {
        $_SESSION['msg'] = "Sua sessão expirou!#danger";
        header('Location: ' . $url);
    }
} else {
    $_SESSION['msg'] = "Sua sessão expirou!#danger";
    header('Location: ' . $url);
}

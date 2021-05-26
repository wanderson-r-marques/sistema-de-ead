<?php
session_start();
require_once '../config.php';
if (isset($_SESSION['cpf']) && $_SESSION['cpf'] != '') {
    $cpf = $_SESSION['cpf'];
    $con = conectar();
    $query = "SELECT * FROM `entidades` e 
    JOIN tipo_cadastro tc ON e.PK_TIPO_CADASTRO = tc.PK_TIPO_CADASTRO
    WHERE e.CPF = :cpf AND e.PK_TIPO_CADASTRO = 2";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf);

    if ($smtp->execute()) {  
        $entidade = $smtp->fetch(PDO::FETCH_OBJ);    
        $foto = $entidade->FOTO;
        if($foto == '')
            $foto = 'semFoto.jpg';            
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

<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
    require_once("conexao.php");
    $con = conectar();

    $login = $_SESSION['login'];
    $senha = $_SESSION['senha'];
    $query = "SELECT * FROM `usuarios` WHERE login = :login AND senha = :senha";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':login', $login, PDO::PARAM_STR);
    $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);

    if ($smtp->execute()) {
        if ($smtp->rowCount() <= 0) {
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            header('Location: index.php');
        } else {
            $atributo = $smtp->fetch(PDO::FETCH_OBJ);
        }
    } else {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        header('Location: index.php');
    }
} else {
    header('Location: index.php');
}

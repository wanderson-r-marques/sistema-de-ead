<?php 
    unset($_SESSION['cpf']);
    unset($_SESSION['senha']);
    header('Location: index.php');
?>
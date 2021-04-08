<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
//Definir formato de arquivo
header('Content-Type:' . "text/plain");
require_once('valida.php');

if (isset($_GET['pk']) && is_numeric($_GET['pk']) && isset($_GET['funcao'])) {
    $pk = $_GET['pk'];
    $funcao = $_GET['funcao'];

    if ($funcao == 'deletar') {
        $query = "DELETE FROM AC_MATERIAL_PARA_ALUNOS WHERE AC_MATERIAL_PARA_ALUNOS = ?";
        $smtp = $con->prepare($query);
        if ($smtp->execute([$pk])) {
            $_SESSION['msg'] = '<div class="alert alert-success"><b>SUCESSO:</b> O MATERIAL FOI DELETADO!</div>';
            header('Location: dados.php#tab-material');
        } else {
            $_SESSION['msg'] = '<div class="alert alert-danger"><b>ERROR:</b> O MATERIAL NÃO FOI DELETADO!</div>';
            header('Location: dados.php#tab-material');
        }
    }
}

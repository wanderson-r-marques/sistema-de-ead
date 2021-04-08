<?php
require_once('valida.php');
if (isset($_GET['pk']) && is_numeric($_GET['pk'])) {
    $pk = $_GET['pk'];
    $nota = $_GET['nota'];
    $feedback = $_GET['feedback'];
    $query = "  UPDATE AC_REALIZADO_ALUNOS_ARQUIVOS SET NOTA='$nota',OBSERVACAO='$feedback'                       
                WHERE AC_REALIZADO_ALUNOS_ARQUIVOS=? ";

    $smtp = $con->prepare($query);
    if ($smtp->execute([$pk])) {
        echo '1';
    }
}

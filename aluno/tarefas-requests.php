<?php
require_once 'valida.php';
$pk = $_POST['pk'];

if (is_numeric($pk) && $_GET['funcao'] == 'visto') {
    // Update para marcar como material visto
    $query = "UPDATE
    `materiais_tarefa`
  SET  
    `VISTO` = 1
  WHERE `MATERIAL_TAREFA` = ?";

    $smtp = $con->prepare($query);

    if ($smtp->execute([$pk])) {
        echo true;
    }
}

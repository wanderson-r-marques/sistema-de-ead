<?php
require_once 'valida.php';
$pkTarefa = $_POST['pk'];
$cpfEntidade = $_POST['cpfEntidade'];

if (is_numeric($pkTarefa) && $_GET['funcao'] == 'visto') {
  // Update para marcar como material visto
  $query = "INSERT INTO `materiais_tarefas_resposta` (      
      `CPF_ENTIDADE`,
      `PK_MATERIAIS_TAREFA`,
      `DATA_HORA_VISTO`    
    )
    VALUES
      (        
        ?,
        ?,
        NOW()
      );
    ";

  $smtp = $con->prepare($query);

  if ($smtp->execute([$cpfEntidade, $pkTarefa])) {
    echo $con->lastInsertId();
  } else {
    echo 0;
  }
}

<?php
require_once 'valida.php';
$pk = $_POST['pk'];
$cpfEntidade = $_POST['cpfEntidade'] ?? null;

if (is_numeric($pk) && $_GET['funcao'] == 'visto') {
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

  if ($smtp->execute([$cpfEntidade, $pk])) {
    echo $con->lastInsertId();
  } else {
    echo 0;
  }
}


if (is_numeric($pk) && $_GET['funcao'] == 'resposta') {
  // Deletar o aluno caso ele tenha saido da turma
  $query = "SELECT  NOTA, COMENTARIO FROM materiais_tarefas_resposta WHERE PK_MATERIAIS_TAREFAS_RESPOSTAS = $pk";

  $smtp = $con->prepare($query);
  $smtp->execute();
  if ($smtp->rowCount()) {
    $linha = $smtp->fetch(PDO::FETCH_OBJ);

    $dados['nota'] = $linha->NOTA;
    $dados['comentario'] = $linha->COMENTARIO;
    echo json_encode($dados);
  }
}

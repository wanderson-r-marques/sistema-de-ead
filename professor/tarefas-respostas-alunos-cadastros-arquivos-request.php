<?php
require_once 'valida.php';
$pk = $_POST['pk'];

if (is_numeric($pk)) {
    // Deletar o aluno caso ele tenha saido da turma
    $query = "SELECT NOTA, COMENTARIO FROM materiais_tarefas_resposta WHERE PK_MATERIAIS_TAREFAS_RESPOSTAS = $pk";

    $smtp = $con->prepare($query);
    $smtp->execute();
    if ($smtp->rowCount()) {
        $linha = $smtp->fetch(PDO::FETCH_OBJ);

        $dados['nota'] = $linha->NOTA;
        $dados['comentario'] = $linha->COMENTARIO;
        echo json_encode($dados);
    }
}

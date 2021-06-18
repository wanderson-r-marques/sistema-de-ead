<?php
require_once 'valida.php';
require_once 'tarefas-funcao-arquivo.php';
require_once '../helpers/ano-letivo.php';
// Função para colocar os alunos na sessão
if ($_GET['funcao'] == 'resposta' && is_numeric($_GET['pkTarefa'])) {

  $pkTarefa = $_GET['pkTarefa'];
  $pkResposta = $_GET['pkResposta'];
  $texto = $_POST['texto'];
  $data_hora = date('Y-m-d H:i:s');

  try {

    $query =      "UPDATE `materiais_tarefas_resposta` SET `TEXTO` = :TEXTO, `DATA_HORA_RESPOSTA` = :DATA_HORA_RESPOSTA WHERE PK_MATERIAIS_TAREFAS_RESPOSTAS = :pkResposta";
    $smtp = $con->prepare($query);
    $smtp->bindParam(':TEXTO', $texto, PDO::PARAM_STR);
    $smtp->bindParam(':DATA_HORA_RESPOSTA', $data_hora, PDO::PARAM_STR);
    $smtp->bindParam(':pkResposta', $pkResposta, PDO::PARAM_INT);
    $smtp->execute();
  } catch (PDOException $th) {
    echo $th->getMessage();
    die;
  }

  tarefas_cadastrar($cpf, $pkTarefa, $pkResposta, $_FILES['arquivo'] ?? '', $_POST['descricao'], $con);

  session_start();
  $_SESSION['msg'] = "A resposta foi computada com sucesso!!#success";
  header('Location: tarefas.php');
}

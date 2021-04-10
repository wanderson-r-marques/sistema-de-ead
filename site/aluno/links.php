<!--
  * Wanderson Rodrigues Marques
  * Web Developer
  * https://github.com/wanderson-r-marques
-->

<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);

require_once('valida.php');
require_once('../helpers/enviar_arquivo.php');

// Inicializando variavel de alerta
$alerta = '';
$cod_matricula = $_SESSION['cod_matricula_aca'];
if ($_POST['enviar'] == 'Enviar documentos' && $_POST['token'] == '8dft7gdf6g&¨8FDFD') {

  require_once("../restrito/conexao.php");
  $con = conectar();




  // Cria a pasta de documentos do usuario
  $local = '../documentos/' . $atributo->candidado . '/';

  mkdir($local, 0775, true);



  // Enviando RG
  if ($_FILES['doc_rg']['name'] != NULL) {
    $arquivo = $_FILES['doc_rg'];
    $nome_arquivo = $local . 'doc_rg';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_rg = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">O <b>RG</b> foi enviado com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">O <b>RG</b> não foi enviado, verifique o formato do arquivo.';
    }
  }

  // Enviando CPF
  if ($_FILES['doc_cpf']['name'] != NULL) {
    $arquivo = $_FILES['doc_cpf'];
    $nome_arquivo = $local . 'doc_cpf';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_cpf = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">O <b>CPF</b> foi enviado com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">O <b>CPF</b> não foi enviado, verifique o formato do arquivo.';
    }
  }

  // Enviando COMPROVANTE DE RESIDÊNCIA
  if ($_FILES['doc_residencia']['name'] != NULL) {
    $arquivo = $_FILES['doc_residencia'];
    $nome_arquivo = $local . 'doc_residencia';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_residencia = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">O <b>COMPROVANTE DE RESIDÊNCIA</b> foi enviado com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">O <b>COMPROVANTE DE RESIDÊNCIA</b> não foi enviado, verifique o formato do arquivo.';
    }
  }


  // Enviando COMPROVANTE DE DEPÓSITO
  if ($_FILES['doc_deposito']['name'] != NULL) {
    $arquivo = $_FILES['doc_deposito'];
    $nome_arquivo = $local . 'doc_deposito';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_deposito = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">O <b>COMPROVANTE DE DEPÓSITO</b> foi enviado com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">O <b>COMPROVANTE DE DEPÓSITO</b> não foi enviado, verifique o formato do arquivo.</div>';
    }
  }

  // Enviando DIPLOMA
  if ($_FILES['doc_diploma']['name'] != NULL) {
    $arquivo = $_FILES['doc_diploma'];
    $nome_arquivo = $local . 'doc_diploma';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_diploma = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">O <b>DIPLOMA</b> foi enviado com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">O <b>DIPLOMA</b> não foi enviado, verifique o formato do arquivo.</div>';
    }
  }

  // Enviando CARTEIRA
  if ($_FILES['doc_carteira']['name'] != NULL) {
    $arquivo = $_FILES['doc_carteira'];
    $nome_arquivo = $local . 'doc_carteira';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_carteira = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">A <b>CARTEIRA</b> foi enviada com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">A <b>CARTEIRA</b> não foi enviada, verifique o formato do arquivo.</div>';
    }
  }

  // Enviando CERTIDÃO
  if ($_FILES['doc_certidao']['name'] != NULL) {
    $arquivo = $_FILES['doc_certidao'];
    $nome_arquivo = $local . 'doc_certidao';
    $enviado = enviar_arquivo($arquivo, $nome_arquivo);
    if ($enviado) {
      $query = "UPDATE Candidatos SET doc_certidao = :doc WHERE candidado = :candidado";
      $db = $con->prepare($query);
      $db->bindParam(':doc', $enviado, PDO::PARAM_STR);
      $db->bindParam(':candidado', $atributo->candidado, PDO::PARAM_INT);
      $db->execute();
      $alerta .= '<div class="alert alert-success">A <b>CERTIDÃO</b> foi enviada com sucesso!</div>';
    } else {
      $alerta .= '<div class="alert alert-danger">A <b>CERTIDÃO</b> não foi enviada, verifique o formato do arquivo.</div>';
    }
  }
  header('Refresh:0');
}



?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.css">
  <link href="../css/select2.min.css" rel="stylesheet" />
  <link href="../css/style.css" type="text/css" />
  <title>Dados dos Alunos e Disciplinas </title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('../images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.png">
          <p class="mb-3 lead teste"><br>Dados do Aluno</p>
          <div class="row">
            <div class="col-md-12">
              <?= $alerta; ?>
              <div class="card text-left">
                <div class="card-header text-uppercase bg-success text-white"> <b> SEJA BEM VINDO ! </b></div>
                <div class="card-body">

                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="card-title">Matrícula: <b><?= $atributo->ENTIDADE; ?></b></h5>
                      <h5 class="card-title">Nome Aluno: <b><?= $atributo->NOME; ?></b></h5>
                      <p class="card-text">CPF: <b><?= $atributo->INSCRICAO_FEDERAL; ?></b></p>
                      <p class="card-text">Curso: <b><?= $atributo->CURSO; ?></b></p>

                      <!--<p class="card-text">- RECURSO DO RESULTADO PRELIMINAR PRÁTICA - <b></p>
                      <p class="card-text">Objeto do Recurso (Síntese): <b></p> <?= $atributo->objeto; ?></b></p> 
                      <p class="card-text">Resposta ao Recurso: <b></p><?= $atributo->recurso; ?></b></p> 
                      <p class="card-text">Resultado do Recurso: <b></p><?= $atributo->resposta; ?></b></p> </p>
                      <p class="card-text">- RECURSO DO RESULTADO PRELIMINAR - <b></p>
                      <p class="card-text">Objeto do Recurso (Síntese): <b></p> <?= $atributo->objeto1; ?></b></p> 
                      <p class="card-text">Resposta ao Recurso: <b></p><?= $atributo->recurso1; ?></b></p> 
                      <p class="card-text">Resultado do Recurso: <b></p><?= $atributo->resposta1; ?></b></p> -->

                    </div>
                    <div class="col-md-6 ">
                      <hr class="d-block d-sm-none">

                      <p class="card-text">Ano Letivo / Semestre: <b><?= $atributo->ANO_LETIVO; ?></b></p>
                      <p class="card-text">Código Turma: <b><?= $atributo->AC_CADASTRO_TURMA; ?></b></p>
                      <p class="card-text">Descrição da Turma: <b><?= $atributo->TURMA_DESC; ?></b></p>
                    </div>
                  </div>

                  <hr>

                  <form method="post" action="dados.php" enctype="multipart/form-data">
                    <input type="hidden" name="token" value="8dft7gdf6g&¨8FDFD---">
                    <div class="list-group">
                      <a class="list-group-item list-group-item-action active bg-warning text-dark">
                        <h2><b>Disciplnas a ser cursada em <b><?= $atributo->ANO_LETIVO; ?></b></h2></b>
                      </a>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="panel">
                            <div class="panel-heading">
                              <cente>
                                <h2 class="text-center"> Matérial Disponivel </h2>
                              </cente>
                            </div>
                            


                              <?php

                              $query = "
                                         SELECT 
                                                  A.AC_MATRICULA,
                                                  A.AC_CADASTRO_DISCIPLINA,
                                                  A.AC_CADASTRO_DISCIPLINA_2 AS COD_DISCPLINA,
                                                  B.DESCRICAO AS NOME_DISCIPLINA,
                                                  C.AC_PROFESSOR,
                                                  D.NOME AS NOME_PROFESSOR,
                                                  NULL AS LINK
                                            FROM AC_MATRICULA_DISCIPLINAS       A 
                                            JOIN AC_CADASTRO_DISCIPLINAS        B ON A.AC_CADASTRO_DISCIPLINA_2 = B.AC_CADASTRO_DISCIPLINA
                                            JOIN AC_CADASTRO_TURMAS_DISCIPLINAS C ON A.AC_CADASTRO_TURMA = C.AC_CADASTRO_TURMA 
                                                                                AND A.AC_CADASTRO_DISCIPLINA_2 = C.AC_CADASTRO_DISCIPLINA
                                            LEFT JOIN PESSOAS_FISICAS           D ON C.AC_PROFESSOR = D.ENTIDADE
                                            LEFT JOIN AC_MATERIAL_PARA_ALUNOS   E ON A.AC_CADASTRO_TURMA = E.AC_CADASTRO_TURMA 
                                                                                AND A.AC_CADASTRO_DISCIPLINA_2 = E.AC_CADASTRO_DISCIPLINA_2
                                                                                AND C.AC_PROFESSOR = E.AC_PROFESSOR
                                            WHERE A.AC_MATRICULA=$cod_matricula
                                         ";
                              $db = $con->prepare($query);
                              $db->execute();

                              ?>

                              <div class="table-responsive">
                              <table class="table table-bordered table-hover table-sm table-striped" style="font-size: 18px;" >
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Código Disciplina</th>
                                      <th>Descrição Disciplina</th>
                                      <th>Professor</th>
                                      <th>Link Material</th>

                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php

                                    $dados = $db->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($dados as $linha) {


                                      if ($linha['LINK'] <> null) {
                                        $cor = "red";
                                      }
                                    ?>

                                      <tr>
                                        <td><?= $linha['COD_DISCPLINA'] ?></td>
                                        <td><?= $linha['NOME_DISCIPLINA'] ?></td>
                                        <td><?= $linha['NOME_PROFESSOR'] ?></td>


                                        <td style="padding-left: 50px;">
                                          <?php if ($linha['LINK'] != '') : ?>
                                            <a class="text-black" style="color: #000000; text-decoration: none;" target="_blank" href="<?= $linha['LINK']; ?>" title="">
                                              <?= 'Visualizar Arquivo'; ?>
                                            </a>
                                          <?php endif ?>
                                        </td>

                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>


                        </div>
                        <br>
                        <div class="text-right">
                          <input disabled type="submit" name="enviar" value="Enviar documentos" class="btn btn-warning btn-lg" />
                        </div>
                  </form>
                </div>
                <div class="card-footer text-muted"> <?= date('d/m/Y'); ?> </div>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>
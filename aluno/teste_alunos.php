<?php
if(session_status()!=PHP_SESSION_ACTIVE) session_start();
if ($_POST['acessar'] == 's' && $_POST['token'] == '8s0dfg7s6grogpsfgsgs-*sgsfg') {
  require_once("../restrito/conexao.php");
  $con = conectar();

  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $ipPc = $_SERVER["REMOTE_ADDR"];
  
   $query = "SELECT A.ENTIDADE,
       A.NOME,
       A.SENHA,
       A.INSCRICAO_FEDERAL,
       C.DESCRICAO AS CURSO,
       D.ANO_LETIVO,
       D.AC_CADASTRO_TURMA,
       E.DESCRICAO AS TURMA_DESC,
       D.AC_MATRICULA
FROM AC_CADASTRO_ALUNOS    A
     JOIN AC_CADASTRO_ALUNO_PSS B ON A.ENTIDADE           = B.ENTIDADE
     JOIN AC_CADASTRO_CURSOS    C ON B.AC_CADASTRO_CURSO  = C.AC_CADASTRO_CURSO
LEFT JOIN AC_MATRICULAS         D ON A.ENTIDADE           = D.ENTIDADE 
LEFT JOIN AC_CADASTRO_TURMAS    E ON D.AC_CADASTRO_TURMA  = E.AC_CADASTRO_TURMA

 WHERE A.INSCRICAO_FEDERAL = '$cpf' ";
  $smtp = $con->prepare($query);
  $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
  $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);

  if ($smtp->execute()) {
    if ($smtp->rowCount() > 0) {

      $atributo = $smtp->fetch(PDO::FETCH_OBJ);

      
      $_SESSION['Matricula'] = $atributo->ENTIDADE;
      $_SESSION['cpf'] = $cpf;
      $_SESSION['senha'] = $senha;
      $_SESSION['nome'] = $atributo->NOME;
      $_SESSION['curso'] = $atributo->CURSO;
      $_SESSION['turma'] = $atributo->TURMA_DESC;
      $_SESSION['cod_turma'] = $atributo->AC_CADASTRO_TURMA;
      $_SESSION['cod_matricula_aca'] = $atributo->AC_MATRICULA;
      
      
      header('Location: dados2.php');
      exit;
    } else {
      $msg = '<div class="alert alert-danger" role="alert" >
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 class="alert-heading">Aluno não encontrado !</h4>
              <p class="mb-0" contenteditable="true">Verifique se seu CPF e sua senha foram digitados corretamente.</p>
              </div>';
    }
  }
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
  <title>Sistema de Atividades Curriculares Não Presenciais </title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('../images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.jpeg">
          <p class="mb-3 lead teste"><br>Área de teste e Validação para Secretaria
          </p>

          <div class="row">
            <div class="col-md-12">
              <div class="card text-center">
                <div class="card-header text-uppercase bg-primary text-white"> <b> ÁREA DO ALUNO </b></div>
                <div class="card-body">
                  <?php echo ($msg != '') ? $msg : ''; ?>
                  <form method="post">
                    <input type="hidden" value="8s0dfg7s6grogpsfgsgs-*sgsfg" name="token">
                    <div class="form-group text-left">
                      <label>CPF</label>
                      <input type="text" id="cpf" name="cpf" class="form-control">
                    </div>
                    <div class="form-group text-left">
                      <label>Senha - Dica 3 primeiros dígitos do seu CPF</label>
                      <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <button type="submit" name="acessar" value="s" class="btn btn-primary">Acessar</button>
                  </form>
                </div>
              <!--  <div class="card-footer text-muted"> <?= date('d/m/Y'); ?> </div>-->
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <script src="../js/jquery-3.3.1.slim.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.mask.min.js"></script>
  <script>
    $('#cpf').mask('999.999.999-99');
   // $('#senha').mask('***');
  </script>
</body>

</html>
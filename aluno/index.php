<?php
error_reporting(0);
ini_set("display_errors", 0 );
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_POST['acessar'] == 's' && $_POST['token'] == '8s0dfg7s6grogpsfgsgs-*sgsfg') {
    require_once "../restrito/conexao.php";
    $con = conectar();

    $cpf = $_POST['cpf'];
    $cpf = str_replace('.','',$cpf);
    $cpf = str_replace('-','',$cpf);
    $senha = $_POST['senha'];
    $ipPc = $_SERVER["REMOTE_ADDR"];

    $query = "SELECT
    `NOME`,
    `NOME_FANTASIA`,
    `CPF`,
    `RG`,
    `DATA_NASCIMENTO`,
    `TELEFONE1`,
    `TELEFONE2`,
    `EMAIL`,
    `PK_TIPO_CADASTRO`,
    `MATRICULA`,
    `SENHA`,
    `COD_INEP`
  FROM
    `entidades`
  WHERE
     `PK_TIPO_CADASTRO` = 1 AND CPF = :cpf AND SENHA = :senha";

    $smtp = $con->prepare($query);
    $smtp->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $smtp->bindParam(':senha', $senha, PDO::PARAM_STR);

    if ($smtp->execute()) {
        if ($smtp->rowCount() > 0) {                      
            $_SESSION['cpf'] = $cpf; 
            
            header('Location: dados.php');
            exit;
        } else {
            $msg = '<div class="alert alert-danger" role="alert" >
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 class="alert-heading">Aluno não encontrado !</h4>
              <p class="mb-0" contenteditable="true">Verifique sua Matrícula e sua senha foram digitados corretamente.</p>
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
  <title>Educação Água Preta - Sistema de Atividades Curriculares Não Presenciais</title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('../images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/site_educao.png">
          <p class="mb-3 lead teste"><br>Área On-Line da Educação de Água Preta
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
                      <label>Senha</label>
                      <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <button type="submit" name="acessar" value="s" class="btn btn-primary">Acessar</button>
                  </form>
                </div>
              <!--  <div class="card-footer text-muted"> <?=date('d/m/Y');?> </div>-->
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
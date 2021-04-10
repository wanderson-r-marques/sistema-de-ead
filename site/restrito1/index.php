<!--
  * Wanderson Rodrigues Marques
  * Web Developer
  * https://github.com/wanderson-r-marques
-->

<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);


if ($_POST['acessar'] == 's' && $_POST['token'] == 'hdf684hd8h*-989hgdfgh876') {
  require_once("../restrito/conexao.php");
  $con = conectar();

  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $senhaCrip = sha1($senha);

  
  $query = "SELECT * FROM `usuarios` WHERE login = :login AND senha = :senha";
  $smtp = $con->prepare($query);
  $smtp->bindParam(':login', $login, PDO::PARAM_STR);
  $smtp->bindParam(':senha', $senhaCrip, PDO::PARAM_STR);

  if ($smtp->execute()) {
    if ($smtp->rowCount() > 0) {

      $atributo = $smtp->fetch(PDO::FETCH_OBJ);

      session_start();
      $_SESSION['login'] = $atributo->login;
      $_SESSION['senha'] = $senhaCrip;
      $_SESSION['nome'] = $atributo->nome;
      $_SESSION['email'] = $atributo->email;
      header('Location: dados.php');
      exit;
    } else {
      $msg = '<div class="alert alert-danger" role="alert" >
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 class="alert-heading">Usuário não encontrado !</h4>
              <p class="mb-0" contenteditable="true">Verifique se seu LOGIN e SENHA foram digitados corretamente.</p>
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
  <title>Área Restrita </title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('../images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="../images/famasul.png">
          <p class="mb-3 lead teste"><br>Área Restrita do Professor da Aemasul
          </p>

          <div class="row">
            <div class="col-md-12">
              <div class="card text-center">
                <div class="card-header text-uppercase bg-danger text-white"> <b> ÁREA RESTRITA ! </b></div>
                <div class="card-body">
                  <?php echo ($msg != '') ? $msg : ''; ?>
                  <form method="post">
                    <input type="hidden" value="hdf684hd8h*-989hgdfgh876" name="token">
                    <div class="form-group text-left">
                      <label>Usuário</label>
                      <input type="text" id="login" name="login" class="form-control">
                    </div>
                    <div class="form-group text-left">
                      <label>Senha</label>
                      <input type="password" id="senha" name="senha" class="form-control">
                    </div>
                    <button type="submit" name="acessar" value="s" class="btn btn-primary">Acessar</button>
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
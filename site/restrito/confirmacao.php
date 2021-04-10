<!--
  * Wanderson Rodrigues Marques
  * Web Developer
  * https://github.com/wanderson-r-marques
-->

<?php
/*
   * Wanderson Rodrigues Marques
   * Web Developer
   * https://github.com/wanderson-r-marques
*/
session_start();

if($_SESSION['confirmado'] === true){

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/bootstrap-4.3.1.css">
  <link href="css/select2.min.css" rel="stylesheet" />
  <link href="css/style.css" type="text/css" />
  <title>PROCESSO SELETIVO SIMPLIFICADO E UNIFICADO </title>

</head>

<body>
  <div class="py-5 text-center" style="background-image: url('images/cover-bubble-dark.svg');background-size:cover;">
    <div class="container">
      <div class="row">
        <div class="bg-white p-5 mx-auto col-md-12 col-12">
          <img class="img-fluid d-block mx-auto" src="images/logo.png">
          <p class="mb-3 lead teste"><br>PROCESSO SELETIVO SIMPLIFICADO E UNIFICADO DA SECRETARIA MUNICIPAL DE
            EDUCAÇÃO E SECRETARIA MUNICIPAL DE SAÚDE DO MUNICÍPIO DE PALMARES Nº 001/2019
          </p>
          <p class="mb-4">(Portarias nº 287 e nº 288, do Governo Municipal, de 17 de dezembro de 2019)</p>
          <div class="row">
        <div class="col-md-12" >
          <div class="card text-center">
            <div class="card-header text-uppercase bg-success text-white"> INSCRIÇÃO REALIZADA COM SUCESSO !</div>
            <div class="card-body">
              <h5 class="card-title">Processo de cadastro foi concluido, favor acompanhe sua inscrição na Área do Candidato.</h5>
              <p class="card-text">Verifique seu e-mail ou acesse a Área do Candidato para enviar os docummentos necessários.</p>
              <a href="candidato/" class="btn btn-primary">Acessar Área do Candidadto</a>
            </div>
            <div class="card-footer text-muted"> <?= date('d/m/Y'); ?> </div>
          </div>
        </div>
      </div>
        </div>
        
      </div>
      
    </div>
  </div>
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
</body>

</html>

<?php 
unset($_SESSION['confirmado']);
}else{
  header('Location: index.php');
}
?>
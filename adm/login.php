<?php  include"includes/config.php"; 


if(isset($_GET)) {$er = $_GET['er'];} else {$er="";}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>
<meta charset="utf-8">
<title>Administração do seu site</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Rodrigo TI">
</head>
<!-- include boostrip -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">
<style>
body {
padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
}
#rodape{
	position:absolute; 
	top:86%;
	left:0%;
	width:100%;	
}

</style>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?php echo sitei('siteurl'); ?>" target="_blank"><?php echo sitei('cliente'); ?></a>
      <div class="nav-collapse">
        <ul class="nav">
        </ul>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<div class="container" align="center">
  <div class="row-fluid" style="width:350px;" align="left" >
    <?php if($er==1){echo"<div class=\"alert alert-error\">Combinação errada</div>";}   
				else if($er==2){echo"<div class=\"alert alert-info\">A sessão expirou</div>";} 
					else if($er==10){echo"<div class=\"alert alert-info\">Sessão terminada</div>";} 
						else{ echo"<div style=\" height:58px;\" ></div>"; }
			
			 ?>
    <form class="well form-horizontal " action="logar.php" method="post" >
      <fieldset>
      <legend>Login</legend>
      </fieldset>
      <div class="" style="padding-left:20px;">
        <div class="control-group">
          <div class="input-prepend"> <span class="add-on"><i class="icon-user"></i></span>
            <input type="text"  name="username" class="input-large" placeholder="Login">
          </div>
        </div>
        <div class="control-group">
          <div class="input-prepend"> <span class="add-on"><i class="icon-lock"></i></span>
            <input type="password" name="senha"  class="input-large" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <button type="submit" class="btn pull-left ">Logar</button>
          <label class="checkbox pull-left" style="margin:4px 0 0 20px; width:160px;">
          <input name="lembrar" type="checkbox">
          Continuar conectado</label>
        </div>
      </div>
    </form>
  </div>
 <div id="rodape">
 <hr>
  <!-- Início do rodapé -->
  <footer>
    <p>Copyright &copy; <?php echo date('Y'); ?> CMS <a href="http://rodrigoti.com.br" target="_blank">Rodrigo TI </a></p>
  </footer>
  </div>
  <!-- Fim do rodapé -->
</div>
</body>

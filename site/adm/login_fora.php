<?php  include"includes/config.php"; 


if(isset($_GET)) {$er = $_GET['er'];} else {$er="";}


?>
<!DOCTYPE html>
<html lang="en">
  <!-- Início do cabeçalho -->	
  <head>
    <meta charset="utf-8">
    <title><?php echo sitei("cliente");  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descreva do que se trata">
    <meta name="author" content="<?php echo sitei("autor");  ?>">

    <!-- Estilos CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
  

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Ícones -->

  </head>
  <!-- Fim do cabeçalho -->

  <body>

   <!-- Início menu de navegação -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><?php echo sitei("cliente");  ?></a>
          <div class="nav-collapse">
            <ul class="nav">
             </ul>
          </div>
        </div>
      </div>
    </div>
	<!-- Fim do menu de navegação -->	
	<!-- Início do conteúdo -->

    <div class="container">

          <div class="row-fluid">
		  
		  

           <form class="well form-inline" action="logar.php" method="post">    
		                  
            <?php if($er==1){echo"<div class=\"alert alert-error\">Combinação errada</div>";}    ?>
			
				<div class="input-prepend">
				<span class="add-on">@</span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Nome do usuário">
				</div>
				
				<div class="input-prepend">
				<span class="add-on">@</span><input class="span2" id="prependedInput" size="16" type="text" placeholder="Nome do usuário">
				</div>
			
			
            <div class="input-prepend">          
               <span class="add-on"><i class="icon-user">f</i></span><input type="text"  name="username" class="input-large" placeholder="Login">
            </div>
            <div class="input-prepend"> 
                <span class="add-on"><i class="icon-lock">f</i></span><input type="password" name="senha"  class="input-large" placeholder="Password">
            </div>
            <button type="submit" class="btn">Logar</button>
  
          </form>
          </div>

      <hr>

	  
	  <!-- Início do rodapé -->
      <footer>
        <p>&copy; Nome do projeto 2012 - <a href="http://cursodephprecife.com" target="_blank">Curso de PHP</a></p>
      </footer>
	  <!-- Fim do rodapé -->

    </div> 
	<!-- fim do conteúdo -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  </body>
</html>

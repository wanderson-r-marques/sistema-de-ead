<?php 	require_once("includes/config.php");
		   require_once("includes/verifica.php");
        //require_once("includes/verifica.php");
        include('includes/funcoes.php');        


?><!DOCTYPE html>
<html lang="pt" >
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
<script type="text/javascript" src="html/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="html/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript" src="js/tinymce.js"></script>
<script type="text/javascript" src="js/funcoes.js"></script>
<script type="text/javascript" src="js/validacao.js"></script>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<style>
#rodape{
	margin:40px 30px;
}
</style>
<body>



<div id="topo" align="center" >
  <div id="centro" align="left" >
    <div id="cont1"><img src="images/top.png" alt="Painel de Controle" border="0" /> </div>
    <div id="cont2">Bem vindo, <font color="#CC0000" size="3">
      <?= $str = ucwords($usuario_atual); ?>
      </font> </div>
    <div id="cont3"><a href="logout.php"><img src="images/power.png" alt="Logout" title="sair" border="0" /></a> </div>
    <div class="both"></div>
    <div id="menu">
      <div id="logo"> <a href="?" > <img src="images/home.png" width="120" alt="Home" width="140"border="0" title="Home" vspace="7" /></a>  <br> <span>INÍCIO</span></div>
	  
      <div id="opcoes">
        <div id="nav" align="center"><a href="?pag=usuarios"> <img src="images/users.png" title="usuários" width="50" border="0" /><br />
          Usuários</a> </div>  
      <!--<div id="nav" align="center"><a href="?pag=splash"> <img src="images/ktip.png" title="Splash" width="50" border="0" /><br />
        Splash</a> </div>      
        <div id="nav" align="center"><a href="?pag=equipe"> <img src="images/equipe.png" title="Equipe" width="50" border="0" /><br />
          Equipe</a> </div>
      <div id="nav" align="center"><a href="?pag=programacao"> <img src="images/programacao.png" title="Programação" width="50" border="0" /><br />
          Programação</a> </div> -->  <div id="nav" align="center"><a href="?pag=destaques"> <img src="images/slide.png" title="Slide" width="50" border="0" /><br />
      Slide</a> </div>
     <div id="nav" align="center"><a href="?pag=sobre"> <img src="images/diretoria.png" title="Quem somos" width="50" border="0" /><br />
      Quem somos</a> </div> 
      <div id="nav" align="center"><a href="?pag=graduacao"> <img src="images/graduacao.png" title="Graduação" width="50" border="0" /><br />
      Graduação</a> </div> 
      <div id="nav" align="center"><a href="?pag=pos-graduacao"> <img src="images/graduacao.png" title="Pós Graduação" width="50" border="0" /><br />
      Pós Graduação</a> </div> 
      <div id="nav" align="center"><a href="?pag=servicos"> <img src="images/informacao.png" title="Serviços" width="50" border="0" /><br />
      Serviços</a> </div> 
    <div id="nav" align="center"><a href="?pag=noticias"> <img src="images/news.png" title="Notícias" width="50" border="0" /><br />
          Notícias</a> </div>           
     <div id="nav" align="center"><a href="?pag=fotos"> <img src="images/camera.png" title="Fotos" width="50" border="0" /><br />
          Fotos</a> </div> 
      <div id="nav" align="center"><a href="?pag=videos"> <img src="images/videos.png" title="Vídeos" width="50" border="0" /><br />
          Vídeos</a> </div> 
          <div id="nav" align="center"><a href="?pag=agenda"> <img src="images/Text Document.png" title="Agenda" width="50" border="0" /><br />
          Agenda</a> </div>
          <div id="nav" align="center"><a href="?pag=downloads"> <img src="images/download.png" title="Downloads" width="50" border="0" /><br />
          Downloads</a> </div>
      <!-- <div id="nav" align="center"><a href="?pag=clipes"> <img src="images/clipes.png" title="Clipes" width="50" border="0" /><br />
          Clipes</a> </div>  
              
     <div id="nav" align="center"><a href="?pag=promocoes"> <img src="images/promocoes.png" title="Promoções" width="50" border="0" /><br />
          Promoções</a> </div>              
     <div id="nav" align="center"><a href="?pag=ganhadores"> <img src="images/ganhador.png" title="Ganhadores" width="50" border="0" /><br />
          Ganhadores</a> </div>
          <div id="nav" align="center"><a href="?pag=top7"> <img src="images/top7.png" title="Top 7" width="50" border="0" /><br />
          Top 7</a> </div>       
      <div id="nav" align="center"><a href="?pag=colunistas"> <img src="images/colunistas.png" title="Colunistas" width="50" border="0" /><br />
          Colunistas</a> </div>  
      <div id="nav" align="center"><a href="?pag=post"> <img src="images/colunas.png" title="Colunas" width="50" border="0" /><br />
          Colunas</a> </div>  
      <div id="nav" align="center"><a href="?pag=anuncie"> <img src="images/anuncie.png" title="Anuncie" width="50" border="0" /><br />
          Anuncie</a> </div>  --> <div id="nav" align="center"><?php echo notifica('inscricao'); ?><a href="?pag=inscricao"> <img src="images/colunas.png" title="Inscição" width="50" border="0" /><br />
          Incrição</a> </div>
        <div id="nav" align="center"><a href="?pag=publicidade"> <img src="images/flag.png" title="Publicidade" width="50" border="0" /><br />
          Publicidade</a> </div>         
        <div id="nav" align="center"><a href="?pag=acessos"> <img src="images/Volume Manager.png" title="Acessos" width="50" border="0" /><br />
          Acessos</a> </div>
        <!-- <div id="nav" align="center"><a href="?pag=espaco"> <img src="images/harddrive.png" title="Espaço" width="50" border="0" /><br />
          Uso em Disco</a> </div> -->
      </div>
    </div>
  </div>
  <div class="both"></div>
</div>
<div id="corpo" align="center">
  <div id="conteudo" >
    <? 
        include('includes/crop.php');   
        include "date/date.php";  
		
		$op = $_GET['op'];  $pag = $_GET['pag'];  $id = $_GET['id']; $msg = $_GET['msg']; $txt = $_GET['txt']; $file = $_GET['file']; $status = $_GET['status']; 
		
		$img = $_GET['img']; $nav = $_GET['nav']; $menu = $_GET['menu'];
		
		if ($pag == ''){$pag = 'welcome';}
		
		include $pag.".php" ;
		
		?>
  </div>
</div>
<div id="rodape" align="center"> </div>
</body>
</html>

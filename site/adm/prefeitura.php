<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "prefeitura";
		$id = 1;

?>

<? if($msg == "sucesso"){ ?><div class="alert alert-success fade in ">
<a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div><? }?>

<? if($msg == "aviso"){ ?><div class="alert alert fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div><? }?>

<? if($msg == "erro"){ ?><div class="alert alert-error fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div><? }?>

<? if($msg == "exc"){ ?>
<div class="alert alert-block alert-error fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
<?= $txt;?>
</div>  
<? }?>

	<?php 	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);
	
	$data = date('d/m/Y');
	$hora = date('H:i:s');		
	
	?>


	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=prefeitura">Prefeitura</a> <span class="divider">/</span></li>
      <li>Editar Prefeitura</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=prefeitura&op=edit_now&id=<?= $id; ?>" >

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data da Edição</label>
		<div class="controls controls-row">		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?php echo $data; ?>" placeholder="00/00/0000"> 		
		</div>				
	</div>
	
<div class="textarea">
	<span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira um texto</span>
    <div id="tiny"><textarea name="texto"  id="textarea"><?php echo stripslashes($reg['texto']); ?></textarea></div>
</div>

<div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaEditprefeitura()"><i class="icon-ok icon-white"></i> Salvar</button>
      <div id="reset" class="btn btn-primary" ><i class="icon-ok icon-white"></i> Restaurar Padrão</div>
    </div>
  </div>
<script type="text/javascript">
		$("#reset").click(function(){		

		$("#tiny").html('<textarea name="texto"  id="textarea"><div id="interna"><h1 class="verde">Sobre a prefeitura de Palmares</h1><div class="espace6 clear">&nbsp;</div><img class="left" style="margin:5px 15px 5px 0;" src="http://www.caetes.pe.gov.br/images/armando.jpg" alt="" /><h3 class="strong verde">PREFEITO: ARMANDO DUARTE DE ALMEIDA</h3><div class="espace2">Nascido e domiciliado em Caet&eacute;s. Possui forma&ccedil;&atilde;o T&eacute;cnica em Contabilidade e 3&ordm; grau incompleto. Experi&ecirc;ncias profissionais: Ag&ecirc;ncia dos Correios em Caet&eacute;s, de 1981 a 1983. Ingressou no Banco do Brasil e permaneceu at&eacute; o ano de 1996. Trabalhou inicialmente na ag&ecirc;ncia de Caet&eacute;s, posteriormente na cidade de Capoeiras, Casa Amarela (Recife) e Piedade (Jaboat&atilde;o dos Guararapes), por fim, retornou &agrave; ag&ecirc;ncia de Caet&eacute;s. A ger&ecirc;ncia do Banco do Brasil ofereceu sua perman&ecirc;ncia no Banco, indicando como local de trabalho as Ag&ecirc;ncias estabelecidas em Salvador (Bahia), Bras&iacute;lia (DF), e ainda Rio de Janeiro ou S&atilde;o Paulo. O mesmo recusou todas as propostas, pois, optou em n&atilde;o sair de seu munic&iacute;pio. Iniciou a sua carreira pol&iacute;tica em 1996, eleito vereador pela 1&ordf; vez, permanecendo no cargo por mais tr&ecirc;s mandatos, contabilizando quatro mandatos consecutivos, at&eacute; o ano de 2012, eleito desta vez para o mandato de prefeito de Caet&eacute;s gest&atilde;o de 2013 a 2016.</div><div class="espace7 clear">&nbsp;</div><img class="left" style="margin:5px 15px 5px 0;" src="http://www.caetes.pe.gov.br/images/armando.jpg" alt="" /><h3 class="strong verde">VICE: ARMANDO DUARTE DE ALMEIDA</h3><div class="espace2">Nascido e domiciliado em Caet&eacute;s. Possui forma&ccedil;&atilde;o T&eacute;cnica em Contabilidade e 3&ordm; grau incompleto. Experi&ecirc;ncias profissionais: Ag&ecirc;ncia dos Correios em Caet&eacute;s, de 1981 a 1983. Ingressou no Banco do Brasil e permaneceu at&eacute; o ano de 1996. Trabalhou inicialmente nddddda ag&ecirc;ncia de Caet&eacute;s, posteriormente na cidade de Capoeiras, Casa Amarela (Recife) e Piedade (Jaboat&atilde;o dos Guararapes), por fim, retornou &agrave; ag&ecirc;ncia de Caet&eacute;s. A ger&ecirc;ncia do Banco do Brasil ofereceu sua perman&ecirc;ncia no Banco, indicando como local de trabalho as Ag&ecirc;ncias estabelecidas em Salvador (Bahia), Bras&iacute;lia (DF), e ainda Rio de Janeiro ou S&atilde;o Paulo. O mesmo recusou todas as propostas, pois, optou em n&atilde;o sair de seu munic&iacute;pio. Iniciou a sua carreira pol&iacute;tica em 1996, eleito vereador pela 1&ordf; vez, permanecendo no cargo por mais tr&ecirc;s mandatos, contabilizando quatro mandatos consecutivos, at&eacute; o ano de 2012, eleito desta vez para o mandato de prefeito de Caet&eacute;s gest&atilde;o de 2013 a 2016.</div></div></textarea>');		

	tinyMCE.init({
		// General options
    language : "pt",
		mode : "textareas",
		editor_deselector : "mceNoEditor",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,youtube,audio",
		
		 relative_urls: false,
		 convert_urls: false,
		 
		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,media,youtube,audio,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,preview,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_buttons4 : "",


		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
	 content_css : "../css/1140.css,../css/estilo.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "html/examples/lists/template_list.js",
		external_link_list_url : "html/examples/lists/link_list.js",
		external_image_list_url : "html/examples/lists/image_list.js",
		media_external_list_url : "html/examples/lists/media_list.js",
		extended_valid_elements: "iframe[src|width|height|name|align]",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});		


		});
</script>
</form>


<? if($op == "edit_now"){ 


	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];			 	
		
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
	
	//testando campos do prato  /*
	 if($texto == "" || $data == "" ){ echo "<meta http-equiv='refresh'  content='0;URL=?pag=prefeitura&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }				 
			
						
	$sql= mysql_query("UPDATE $pagina SET texto='$texto',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=prefeitura&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar '>"; }
	
	else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=prefeitura&msg=sucesso&txt=Prefeitura editado com sucesso'>"; }
	
	} ?>



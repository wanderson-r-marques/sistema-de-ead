<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "historia";
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
	  <li><a href="?pag=historia">História</a> <span class="divider">/</span></li>
      <li>Editar História</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=historia&op=edit_now&id=<?= $id; ?>" >

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
      <button type="submit" class="btn btn-primary" onclick="return validaEdithistoria()"><i class="icon-ok icon-white"></i> Salvar</button>
      <div id="reset" class="btn btn-primary" ><i class="icon-ok icon-white"></i> Restaurar Padrão</div>
    </div>
  </div>
<script type="text/javascript">
		$("#reset").click(function(){		

		$("#tiny").html('<textarea name="texto"  id="textarea"><div id="interna">	<h1 class="verde">Sobre a cidade de Palmares</h1>    	<div class="espace6 clear">&nbsp;</div>	<div class="recuo">		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.	</div>						</div></textarea>');		

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
	 if($texto == "" || $data == "" ){ echo "<meta http-equiv='refresh'  content='0;URL=?pag=historia&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }				 
			
						
	$sql= mysql_query("UPDATE $pagina SET texto='$texto',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=historia&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar '>"; }
	
	else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=historia&msg=sucesso&txt=História editado com sucesso'>"; }
	
	} ?>



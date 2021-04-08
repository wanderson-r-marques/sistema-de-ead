<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "anuncie";
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
	  <li><a href="?pag=anuncie">Anuncie</a> <span class="divider">/</span></li>
      <li>Editar Anuncie</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=anuncie&op=edit_now&id=<?= $id; ?>" >

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data da Edição</label>
		<div class="controls controls-row">		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?php echo $data; ?>" placeholder="00/00/0000"> 		
		</div>				
	</div>
	
<div class="control-group ">
    <label class="control-label" for="fileInput">Texto</label>
    <div class="controls" >
	<span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira um texto</span>
      <textarea name="texto" style="width: 600px; height: 450px;" id="textarea"><?php echo stripslashes($reg['texto']); ?></textarea>
    </div>
</div>

<div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaEditAnuncie()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>


<? if($op == "edit_now"){ 


	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];			 	
		
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
	
	//testando campos do prato  /*
	 if($texto == "" || $data == "" ){ echo "<meta http-equiv='refresh'  content='0;URL=?pag=anuncie&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }				 
			
						
	$sql= mysql_query("UPDATE $pagina SET texto='$texto',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=anuncie&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar '>"; }
	
	else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=anuncie&msg=sucesso&txt=Anuncie editado com sucesso'>"; }
	
	} ?>



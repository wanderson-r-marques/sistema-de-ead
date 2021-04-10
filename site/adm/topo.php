<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "topo";

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


<script>  
			$(document).on('mouseenter','[rel=tooltip]', function(){
			$(this).tooltip('show');
				});
				
							
   </script>
<style>
	#pencil {
		position:absolute; 
		margin:8px 8px;
		width:90px;
		z-index:10;
		}
	</style>
<? if($op == ""){ 



?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Topo</li>
      </ul>

<!--<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar nova foto  </a><br /><br /> -->

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
<tr>
<?php $i=0; $sql = mysql_query("SELECT * FROM $pagina order by id"); while($reg = mysql_fetch_array($sql)){   ?>		
	<?php if ( $i== 3){ echo "</tr><tr><td >"; $i=0;} else { echo "<td>"; }?>
	<div id="pencil" > <a href="?pag=topo&op=edit&id=<?php echo $reg['id']; ?>" rel="tooltip"  class="btn" title="Trocar imagem" ><i class="icon-pencil"></i></a> </div>
	<img src="../uploads/min_<?php echo $reg['imagem']; ?>" width="220" height="160" border="0" class="img-polaroid">  
	</div>	
	</td>	
<?php  $i++;}?>
</tr>	
</table>

<? } ?>

<? if($op == "add"){} ?>


<? if($op == "add_now"){} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);

 $data = date('d/m/Y');
 $hora = date('H:i:s');
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=topo">Topo</a> <span class="divider">/</span></li>
      <li>Trocar Imagem</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=topo&op=edit_now&id=<?= $id; ?>" >
	

	<div  class="control-group ">
    <label class="control-label" for="fileInput">Tamanho exato</label>
    <div class="controls" style="margin-top:10px;">
   	<span class="label label-info ">220 x 160</span>
    </div>
  </div>

	 <div  class="control-group">
            <label class="control-label" for="fileInput">Foto</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem"  type="file">
	  </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" onclick="return validaEditTopo()">Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 
	
	
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
		
//testando campos da foto  /*
	 if($imagem == "" ){ echo "<meta http-equiv='refresh'  content='0;URL=?pag=topo&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		
		if($imagem != ""){  

			if (copy($imagem,"../uploads/".$imagem_name))	{ 
				    
			//redimensionamento
			$imagem = $imagem_name;

			
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "min_";
					$largura = 220;
					$altura = 160;
					secao($imagem,$idt,$largura,$altura);	

				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
		
						
	$sql= mysql_query("UPDATE $pagina SET imagem='$imagem' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=topo&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar a foto '>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=topo&msg=sucesso&txt=Foto editado com sucesso'>"; }	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Foto</h4>
			<p>Tem certeza que deseja excluir este membro? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=topo&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=topo">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=topo&msg=erro&txt=Ocorreu um erro ao excluir a foto'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=topo&msg=sucesso&txt=Foto excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
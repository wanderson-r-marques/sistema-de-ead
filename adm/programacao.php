<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "programacao";
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



<? if($op == ""){ ?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Programas</li>
      </ul>
	  
	 		 <?php if($_GET['day'] == '') $_GET['day'] = '1'; ?>
				
<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo programa  </a>
<a href="?pag=<?= $pagina; ?>&day=1" class="btn <?php if($_GET['day'] == '1') echo 'disabled'?>" ><i class="icon-calendar "></i> Segunda </a>
<a href="?pag=<?= $pagina; ?>&day=2" class="btn <?php if($_GET['day'] == '2') echo 'disabled'?>" ><i class="icon-calendar "></i> Terça </a>
<a href="?pag=<?= $pagina; ?>&day=3" class="btn <?php if($_GET['day'] == '3') echo 'disabled'?>" ><i class="icon-calendar "></i> Quarta </a>
<a href="?pag=<?= $pagina; ?>&day=4" class="btn <?php if($_GET['day'] == '4') echo 'disabled'?>" ><i class="icon-calendar "></i> Quinta </a>
<a href="?pag=<?= $pagina; ?>&day=5" class="btn <?php if($_GET['day'] == '5') echo 'disabled'?>" ><i class="icon-calendar "></i> Sexta </a>
<a href="?pag=<?= $pagina; ?>&day=6" class="btn <?php if($_GET['day'] == '6') echo 'disabled'?>" ><i class="icon-calendar "></i> Sábado </a>
<a href="?pag=<?= $pagina; ?>&day=7" class="btn <?php if($_GET['day'] == '7') echo 'disabled'?>" ><i class="icon-calendar "></i> Domingo </a>


<br /><br />

	
	
	<?php $day = $_GET['day'];			
	
		 $sql = mysql_query("SELECT * FROM $pagina where dias like '%$day%' ORDER BY inicial asc"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th width="130">Capa</th>
	<th width="130">Horário</th>
    <th>Programa</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    <td><img src="../uploads/adm_<?= $reg['imagem']; ?>"  border="0" class="img-polaroid">  </td>
	
    <td><i><?php echo substr($reg['inicial'],0,5); ?> às <?php echo substr($reg['final'],0,5); ?></i></td>
   
   <td>Programa: <i><?php echo $reg['programa']; ?></i><br />
   		Locutor: <i><?php echo $reg['locutor']; ?></i>
   
   </td>
  	
    <td>
		<a href="?pag=programacao&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a class="btn disabled" rel="tooltip"  title="Você não pode alterar este item" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=programacao&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
  </tr>
	<?php } ?>

</table>
		<?php 					
		        $total_registros = mysql_num_rows($sql);
		
				echo"<div class='pull-left'>Total: $total_registros registros.</div>";
 } ?>

<? if($op == "add"){ 

 $data = date('d/m/Y');
 $hora = date('H:i:s');

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=programacao">Programas</a> <span class="divider">/</span></li>
      <li>Adicionar Programa</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=programacao&op=add_now" >

<div  class="control-group">
		<label class="control-label" for="fileInput">Nome do Programa</label>
		<div class="controls">
		  <input id="programa" name="programa" class="input-xlarge"  type="text" maxlength="30" placeholder="Adicione um programa com máx 30 caracteres">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira o nome do programa</span>			  
		</div>
</div>
<div  class="control-group">
		<label class="control-label" for="fileInput">Nome do Locutor</label>
		<div class="controls">
		  <input id="locutor" name="locutor" class="input-xlarge"  type="text"  maxlength="30" placeholder="Adicione um locutor com máx 30 caracteres">
		  <span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira o nome do locutor</span>			  
		</div>
</div>
<div  class="control-group">
		<label class="control-label" for="fileInput">Foto</label>
		<div class="controls">
		  <input class="input-file" id="imagem"  name="imagem"  type="file">
		  <span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira uma foto</span>			  
		</div>
</div>

<div class="control-group" >
    <label class="control-label" for="fileInput">Início do Programa</label>
    <div class="controls controls-row">
      <input name="inicial" type="text" placeholder="00:00" maxlength="5" class="input-mini" id="inicial" value="" />
	  <span id="erro4" class="label label-important" style=" visibility:hidden;">* Insira a hora inicial do programa</span>
    </div>
  </div>
 <div class="control-group" >
    <label class="control-label" for="fileInput">Fim do Programa</label>
    <div class="controls controls-row">
      <input name="final" type="text" placeholder="00:00" maxlength="5" class="input-mini" id="final" value="" />
	  <span id="erro5" class="label label-important" style=" visibility:hidden;">* Insira a hora final do programa</span>
    </div>
  </div>
   <div class="control-group" >
    <label class="control-label" for="fileInput">Dias da Semana</label>
    <div class="controls controls-row">	
		 <label class="checkbox inline">
		  <input type="checkbox" id="1" name="seg" value="1"> Segunda
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="2" name="ter" value="2"> Terça
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="3" name="qua" value="3"> Quarta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="4" name="qui" value="4"> Quinta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="5" name="sex" value="5"> Sexta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="6" name="sab" value="6"> Sabado
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="7" name="dom" value="7"> Domingo
		</label>
	</div>
</div>
   
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaProgramacao()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>

<? } ?>


<? if($op == "add_now"){ 
	
	$programa = $_POST['programa'];
	$locutor = $_POST['locutor'];
	$inicial = $_POST['inicial'];	
	$final = $_POST['final'];
	$dias =  $_POST['seg'].' '. $_POST['ter'].' '. $_POST['qua'].' '. $_POST['qui'].' '. $_POST['sex'].' '. $_POST['sab'].' '. $_POST['dom'];	
	
	if($final == '00:00') $final = '23:59:59';
	
	
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
	
	//testando campos do programa 
	 if( $imagem == "" || $programa == "" || $locutor == "" || $inicial == "" || $final == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
			
		if($imagem != ""){  

			if (copy($imagem,"../uploads/".$imagem_name))	{ 
				    
			//redimensionamento
			$imagem = $imagem_name;	
			
			//adm				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "adm_";
					$largura = 120;
					$altura = 70;
					secao($imagem,$idt,$largura,$altura);		
					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "min_";
					$largura = 100;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);

					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "foto_";
					$largura = 110;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);					
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (imagem, programa, locutor, inicial, final, dias)values('$imagem','$programa','$locutor','$inicial','$final','$dias')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&op=add&msg=erro&txt=Ocorreu um erro ao inserir o programa  '>"; }
	
		/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=aviso&txt=<b>Imagem não enviada!</b> Programa inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=sucesso&txt=Programa inserido com sucesso'>"; }
	
	} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);

	
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=programacao">Programas</a> <span class="divider">/</span></li>
      <li>Editar Programa</li>
      </ul>
	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=programacao&op=edit_now&id=<?= $id; ?>" >

	
<div  class="control-group">
		<label class="control-label" for="fileInput">Nome do Programa</label>
		<div class="controls">
		  <input id="programa" name="programa" class="input-xlarge" value="<?php echo $reg['programa']; ?>" type="text" maxlength="30" placeholder="Adicione um programa com máx 30 caracteres">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira o nome do programa</span>			  
		</div>
</div>
<div  class="control-group">
		<label class="control-label" for="fileInput">Nome do Locutor</label>
		<div class="controls">
		  <input id="locutor" name="locutor" class="input-xlarge"  type="text" value="<?php echo $reg['locutor']; ?>" maxlength="30" placeholder="Adicione um locutor com máx 30 caracteres">
		  <span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira o nome do locutor</span>			  
		</div>
</div>
<div  class="control-group">
		<label class="control-label" for="fileInput">Foto</label>
		<div class="controls">
		  <input class="input-file" id="imagem"  name="imagem"  type="file">
		  <span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira uma foto</span>			  
		</div>
</div>

<div class="control-group" >
    <label class="control-label" for="fileInput">Início do Programa</label>
    <div class="controls controls-row">
      <input name="inicial" type="text" placeholder="00:00" maxlength="5" class="input-mini" id="inicial" value="<?php echo substr($reg['inicial'],0,5); ?>" />
	  <span id="erro4" class="label label-important" style=" visibility:hidden;">* Insira a hora inicial do programa</span>
    </div>
  </div>
 <div class="control-group" >
    <label class="control-label" for="fileInput">Fim do Programa</label>
    <div class="controls controls-row">
      <input name="final" type="text" placeholder="00:00" maxlength="5" class="input-mini" id="final" value="<?php echo substr($reg['final'],0,5); ?>" />
	  <span id="erro5" class="label label-important" style=" visibility:hidden;">* Insira a hora final do programa</span>
    </div>
  </div>
   <div class="control-group" >
    <label class="control-label" for="fileInput">Dias da Semana</label>
    <div class="controls controls-row">	
		 <label class="checkbox inline">
		  <input type="checkbox" id="1" name="seg" <?php if(eregi('1', $reg['dias'])) {?>checked="checked"<?php }?> value="1"> Segunda
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="2" name="ter" <?php if(eregi('2', $reg['dias'])) {?>checked="checked"<?php }?> value="2"> Terça
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="3" name="qua" <?php if(eregi('3', $reg['dias'])) {?>checked="checked"<?php }?> value="3"> Quarta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="4" name="qui" <?php if(eregi('4', $reg['dias'])) {?>checked="checked"<?php }?> value="4"> Quinta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="5" name="sex" <?php if(eregi('5', $reg['dias'])) {?>checked="checked"<?php }?> value="5"> Sexta
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="6" name="sab" <?php if(eregi('6', $reg['dias'])) {?>checked="checked"<?php }?> value="6"> Sabado
		</label>
		<label class="checkbox inline">
		  <input type="checkbox" id="7" name="dom" <?php if(eregi('7', $reg['dias'])) {?>checked="checked"<?php }?> value="7"> Domingo
		</label>
	</div>
</div>
      
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaEditProgramacao()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>
	
	<? }  ?>

<? if($op == "edit_now"){ 

	$programa = $_POST['programa'];
	$locutor = $_POST['locutor'];
	$inicial = $_POST['inicial'];	
	$final = $_POST['final'];
	$dias =  $_POST['seg'].' '. $_POST['ter'].' '. $_POST['qua'].' '. $_POST['qui'].' '. $_POST['sex'].' '. $_POST['sab'].' '. $_POST['dom'];	
	
	if($final == '00:00') $final = '23:59:59';
	
			$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
	
	//testando campos do programa  /*
	if($programa == "" || $locutor == "" || $inicial == "" || $final == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		if($imagem != ""){  

			if (copy($imagem,"../uploads/".$imagem_name))	{ 
				    
			//redimensionamento
			$imagem = $imagem_name;
			
			//adm				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "adm_";
					$largura = 120;
					$altura = 70;
					secao($imagem,$idt,$largura,$altura);			
					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "min_";
					$largura = 100;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);			
			
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "foto_";
					$largura = 110;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);	

									
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET imagem='$imagem',locutor='$locutor',programa='$programa',inicial='$inicial',final='$final',dias='$dias' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o programa '>"; }
	
		/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=aviso&txt=<b>Imagem não enviada!</b> Programa inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=sucesso&txt=Programa editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Programa</h4>
			<p>Tem certeza que deseja excluir este programa? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=programacao&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=programacao">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=erro&txt=Ocorreu um erro ao excluir o programa'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=programacao&msg=sucesso&txt=Programa excluído com sucesso'>"; }	
	
		}
}
?>
<? if($op == "sta"){ 			 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do programa'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }	
	
		}

?>		
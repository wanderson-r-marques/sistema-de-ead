<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "destaques";
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

<style type="text/css">
.form-horizontal .control-label {
    width: 220px;
    margin-right: 10px;
}
</style>


<? if($op == ""){ ?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Destaques</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo destaque  </a><br /><br />

	<?php
	
				// Pegar a p&aacute;gina atual por GET
		$p = $_GET["p"];
		// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
		if(isset($p)) {
		$p = $p;
		} else {
		$p = 1;
		}
		// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
		$qnt = 15;
		// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
		// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
		$inicio = ($p*$qnt) - $qnt;
		// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
		 $sql = mysql_query("SELECT * FROM $pagina ORDER BY id desc LIMIT $inicio, $qnt"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th  width="320">Foto do Destaque</th>
    <th >Foto do Destaque Celular</th>
	 
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'open'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'close'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    <td><img src="../uploads/max_<?= $reg['imagem']; ?>" width="300"  border="0" class="img-polaroid">  </td>
    <td><img src="../uploads/min_<?= $reg['imagem']; ?>" width="130"  border="0" class="img-polaroid">  </td>
   
    		
   
    <td>
		<a rel="tooltip" href="?pag=destaques&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a rel="tooltip" href="?pag=destaques&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a rel="tooltip" href="?pag=destaques&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
  </tr>
	<?php } ?>

</table>
		<?
			
		// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
		// para pegarmos o n&uacute;mero total de registros
		$sql_select_all = "SELECT * FROM $pagina";
		// Executa o query da sele&ccedil;&atilde;o acimas
		$sql_query_all = mysql_query($sql_select_all);
		// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
		$total_registros = mysql_num_rows($sql_query_all);
		// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
		// O comando ceil() arredonda 'para cima' o valor
		$pags = ceil($total_registros/$qnt);
		// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
		$max_links = 3;
		
		//exibe a quantidade de registros encontrados
		echo"<div class='pull-left'>Total: $total_registros registros.</div>";
		
		// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
		echo"<div class='pagination pagination-right'><ul>";
		
		echo "<li ><a href='?pag=$pagina&p=1'>«</a></li>";
		// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
		for($i = $p-$max_links; $i <= $p-1; $i++) {
		// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
		// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
		if($i <=0) {
		//faz nada
		// Se estiver tudo OK, cria o link para outra p&aacute;gina
		} else {
		echo "<li><a href='?pag=$pagina&p=".$i."'>".$i."</a></li>";
		}
		}
		// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
		echo " <li class='active'><a>".$p."</a></li>";
		// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
		for($i = $p+1; $i <= $p+$max_links; $i++) {
		// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
		if($i > $pags)
		{
		//faz nada
		}
		// Se tiver tudo Ok gera os links.
		else
		{
		echo "<li><a href='?pag=$pagina&p=".$i."'>".$i."</a></li>";
		}
		}
		// Exibe o link "&uacute;ltima p&aacute;gina"
		echo "<li ><a href='?pag=$pagina&p=".$pags."'>»</a></li>";
		
		echo"</ul></div>";

 } ?>

<? if($op == "add"){ 

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=destaques">Destaques</a> <span class="divider">/</span></li>
      <li>Adicionar Destaque</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=destaques&op=add_now" >
 



	 <div  class="control-group">
        <label class="control-label"  for="fileInput">* Imagem (tam. 1120x350) </label>
        <div class="controls">
          <input class="input-file valida-file" required="required" data-width="1150" data-height="460" id="imagem" name="imagem" type="file">			  
        </div>
     </div>
 
	 <div  class="control-group">
        <label class="control-label"  for="fileInput">* Imagem Celular (tam. 420x300) </label>
        <div class="controls">
          <input class="input-file valida-file" required="required" data-width="1150" data-height="460" id="imagem2" name="imagem2" type="file">			  
        </div>
     </div>
	<div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Título </label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-xxlarge" id="titulo" placeholder="Adicione um titulo">	
    </div>
  </div>
<div class="control-group ">
    <label class="control-label" for="fileInput">Texto</label>
    <div class="controls" >
	<span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira um texto</span>
      <textarea name="texto" style="width: 600px; height: 350px;" id="textarea"></textarea>
    </div>
</div>

  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return valida()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>

  </div>




</form>

 

<? } ?>


<? if($op == "add_now"){ 
	

	
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
	
	//testando campos do destaque 
	 if($imagem == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
	 $data = date('d/m/Y');
 	 $hora = date('H:i:s');
 	 $titulo = addslashes($_POST['titulo']);
 	 $texto = addslashes($_POST['texto']);
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		
		
		if($imagem != ""){  

			if (copy($imagem,"../uploads/".$imagem_name))	{ 
				    
			//redimensionamento
			$imagem = $imagem_name;	
							


			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 1120;
					$altura = 350;
					secao($imagem,$idt,$largura,$altura);					
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }


		$imagem2 = $_FILES['imagem2']['tmp_name'];
		
		if($imagem2 != ""){  

			if (copy($imagem2,"../uploads/".$imagem_name))	{ 

				
				    
			//redimensionamento
			$imagem2 = $imagem_name;	
							


			//secao1				 
				     //adicione uma indentidade a imagem2 e um tamanho					
					$idt = "min_";
					$largura = 420;
					$altura = 300;
					secao($imagem2,$idt,$largura,$altura);					
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem2) ;
			 
			 }   }			
			
	$sql= mysql_query("INSERT INTO $pagina ( imagem,titulo,texto,status )values('$imagem','$titulo','$texto', 'sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&op=add&msg=erro&txt=Ocorreu um erro ao inserir o destaque  '>"; }
	
		/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=aviso&txt=<b>Imagem não enviada!</b> Destaque inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=sucesso&txt=Destaque inserido com sucesso'>"; }
	
	} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);



		$data = $reg['data'];
		$y = substr($data,0,4);
		$m = substr($data,5,2);
		$d = substr($data,8,2);
		$data=$d."/".$m."/".$y;
		
		$hora = $reg['hora'];
		$h = substr($hora,0,2);
		$m = substr($hora,3,2);
		$s = substr($hora,6,2);
		$hora=$h.":".$m.":".$s;
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=destaques">Destaques</a> <span class="divider">/</span></li>
      <li>Editar Destaque</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=destaques&op=edit_now&id=<?= $id; ?>" >


	 <div  class="control-group">
        <label class="control-label"  for="fileInput">* Imagem (tam. 1120x350) </label>
        <div class="controls">
          <input class="input-file valida-file"  data-width="1150" data-height="460" id="imagem" name="imagem" type="file">			  
        </div>
     </div>
 
	 <div  class="control-group">
        <label class="control-label"  for="fileInput">* Imagem Celular (tam. 420x300) </label>
        <div class="controls">
          <input class="input-file valida-file"  data-width="1150" data-height="460" id="imagem2" name="imagem2" type="file">			  
        </div>
     </div>
<div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Título </label>
    <div class="controls" >
	      <input name="titulo" value="<?php echo $reg['titulo']; ?>" type="text" class="input-xxlarge" id="titulo" placeholder="Adicione um titulo">		  
		  
    </div>
  </div>
<div class="control-group ">
    <label class="control-label" for="fileInput">Texto</label>
    <div class="controls" >
	<span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira um texto</span>
      <textarea name="texto" style="width: 600px; height: 350px;" id="textarea"><?php echo stripslashes($reg['texto']); ?></textarea>
    </div>
</div>
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaEditDestaque()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 


 	 $texto = addslashes($_POST['texto']);
		$titulo = addslashes($_POST['titulo']);
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem2 = $_FILES['imagem2']['tmp_name'];

		//recuperando imagem
		$sql = mysql_query("SELECT imagem FROM $pagina where id = '$id'");
		$reg = mysql_fetch_array($sql);
		

		if ($imagem == "" && $imagem2 != "") {
			$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem2']['name']))); 
			rename("../uploads/max_".$reg['imagem'],"../uploads/max_".$imagem_name); 
		}
		else if ($imagem != "" && $imagem2 == "") {
			$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
			rename("../uploads/min_".$reg['imagem'],"../uploads/min_".$imagem_name);
		}
		else if ($imagem != "" && $imagem2 != "") {
			$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
		}
		else  {
			$imagem_name = $reg['imagem'];
		}
		








		
			//testando campos do destaque  /*
	if($texto == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
		
		if($imagem != ""){  



			if (copy($imagem,"../uploads/".$imagem_name))	{ 
				    
			//redimensionamento
			$imagem = $imagem_name;			


			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 1120;
					$altura = 350;
					secao($imagem,$idt,$largura,$altura);					
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }


		
		if($imagem2 != ""){  

			if (copy($imagem2,"../uploads/".$imagem_name))	{ 

				//echo $name = strtolower(end(explode(".", $_FILES['imagem2']['name'])));
				    
			//redimensionamento
			$imagem2 = $imagem_name;							


			//secao1				 
				     //adicione uma indentidade a imagem2 e um tamanho					
					$idt = "min_";
					$largura = 420;
					$altura = 300;
					secao($imagem2,$idt,$largura,$altura);					
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem2) ;
			 
			 }   }	
			 
			
			
						
	$sql= mysql_query("UPDATE $pagina SET imagem='$imagem_name',titulo='$titulo',texto='$texto' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o destaque '>"; }
	
		/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=aviso&txt=<b>Imagem não enviada!</b> Destaque inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=sucesso&txt=Destaque editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Destaque</h4>
			<p>Tem certeza que deseja excluir este destaque? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=destaques&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=destaques">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=erro&txt=Ocorreu um erro ao excluir o destaque'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=destaques&msg=sucesso&txt=Destaque excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
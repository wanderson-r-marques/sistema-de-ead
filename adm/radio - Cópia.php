<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "radio";
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
      <li>Rádio</li>
      </ul>
	
	<!--<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo histórico </a><br />
<br /> -->
	
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
		 $sql = mysql_query("SELECT * FROM $pagina ORDER BY id asc LIMIT $inicio, $qnt"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    
	 
    <th>Histórico da Rádio</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    
 
    		
    <td><?= $reg['titulo']; ?></td>	
	
    <td>
		<a href="?pag=radio&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a class="btn disabled" rel="tooltip"  title="Você não pode alterar este item" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a class="btn disabled" rel="tooltip"  title="Você não pode excluir este item"><i class="icon-trash"></i></a>	</td>
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

 $data = date('d/m/Y');
 $hora = date('H:i:s');

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=radio">Rádio</a> <span class="divider">/</span></li>
      <li>Adicionar Rádio</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=radio&op=add_now">

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data do Cadastro</label>
		<div class="controls controls-row">		
		  <input name="data" type="text" readonly="" class="input-small" id="datepicker2" value="<?= $data; ?>" placeholder="00/00/0000"> 		 
		</div>				
	</div>

  <div class="control-group ">
    <label class="control-label" for="fileInput">Título do histórico</label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-xlarge" id="titulo" maxlength="30" placeholder="Adicione um titulo com até 30 caracteres">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira uma título</span>
    </div>
  </div>    
  <div class="control-group ">
    <label class="control-label" for="fileInput">Texto do histórico</label>
    <div class="controls" >
	<span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira um texto sobre este histórico</span>
      <textarea name="texto" style="width: 600px; height: 250px;" id="textarea"></textarea>
      </div>
  </div>  
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn"  onclick="return validaRádio()">Salvar</button>
    </div>
  </div>
</form>

 

<? } ?>


<? if($op == "add_now"){ 
	
	$slug = titulo($_POST['titulo']);
	$titulo = addslashes($_POST['titulo']);
	$texto = addslashes($_POST['texto']);
	$local = $_POST['local'];	
	$data = $_POST['data'];
	
	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 		
		
			//testando campos do destaque 
	 if($titulo == "" || $texto == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
		
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
					$idt = "des_";
					$largura = 900;
					$altura = 420;
					secao($imagem,$idt,$largura,$altura);
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (titulo, data, texto,slug, status )values('$titulo','$data','$texto','$slug','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&op=add&msg=erro&txt=Ocorreu um erro ao inserir o histórico  '>"; }
	
		//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=aviso&txt=<b>Imagem não enviada!</b> Menu inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=sucesso&txt=Menu inserido com sucesso'>"; }
	
	} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);

		/*$data = $reg['data'];
		$y = substr($data,0,4);
		$m = substr($data,5,2);
		$d = substr($data,8,2);
		$data=$d."/".$m."/".$y;
		
		$hora = $reg['hora'];
		$h = substr($hora,0,2);
		$m = substr($hora,3,2);
		$s = substr($hora,6,2);
		$hora=$h.":".$m.":".$s;*/
		
		$data = date('d/m/Y');
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=radio">Rádio</a> <span class="divider">/</span></li>
      <li>Editar Rádio</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=radio&op=edit_now&id=<?= $id; ?>">

 
  <div class="control-group ">
    <label class="control-label" for="fileInput">Texto do Histórico</label>
    <div class="controls" >
	<span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira um texto sobre este histórico</span>
      <textarea name="texto" style="width: 600px; height: 500px;" id="texto"><?php echo stripslashes($reg['texto']); ?></textarea>
      </div>
  </div>  
  
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn"  onclick="return validaEditRadio()">Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$texto = addslashes($_POST['texto']);
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	
	//testando campos do destaque  /*
	if($texto == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$imagem = $_FILES['imagem']['tmp_name'];
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
		
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
					$largura = 294;
					$altura = 125;
					secao($imagem,$idt,$largura,$altura);
					
				
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET texto='$texto' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o histórico '>"; }
	
	//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=aviso&txt=<b>Imagem não enviada!</b> Rádio editado com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=sucesso&txt=Menu editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Rádio</h4>
			<p>Tem certeza que deseja excluir este destaque? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=radio&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=radio">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=erro&txt=Ocorreu um erro ao excluir o histórico'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=radio&msg=sucesso&txt=Menu excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do histórico'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
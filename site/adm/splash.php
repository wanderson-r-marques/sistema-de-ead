<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "splash";

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
      <li>Splash</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo splash  </a><br /><br />

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
		 $sql = mysql_query("SELECT * FROM $pagina ORDER BY data desc LIMIT $inicio, $qnt"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th width="130">Capa</th>
	 <th>Data do Splash</th>
    
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    <td>
		        
		<embed src="../uploads/<?= $reg['arquivo']; ?>" width="120" height="70" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" ></embed>
		<!--fiim do banner --></td>
   <td>
		 <strong><?= diasemana($reg['data']);?></strong><br />		 
    <?=  substr($reg['data'],8,2); echo mes($reg['data']);  ?> </td>
    		
   
    <td>
		<a href="?pag=splash&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=splash&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=splash&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
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
		$max_links = 6;
		
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
		echo "<li ><a href='?pag=$pagina&p=1'>»</a></li>";
		
		echo"</ul></div>";

 } ?>

<? if($op == "add"){ 

 $data = date('d/m/Y');
 $hora = date('H:i:s');

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=splash">Splash</a> <span class="divider">/</span></li>
      <li>Adicionar Splash</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=splash&op=add_now" >

	<div class="control-group info" >
  	  <label class="control-label" for="fileInput">Data do Splash</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" > 
		 <span class="help-inline">Este será o prazo para exibição do splash</span>
		</div>		
	</div>
	
	<div   class="control-group ">
    <label class="control-label" for="fileInput">Largura</label>
    <div class="controls" >
	      <input name="largura" value="" type="text" class="input-small" id="largura" maxlength="3" placeholder="Máx 900">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Tamanho inválido</span>
    </div>
  </div>
  
  <div   class="control-group ">
    <label class="control-label" for="fileInput">Altura</label>
    <div class="controls" >
	      <input name="altura" value="" type="text" class="input-small" id="altura" maxlength="3" placeholder="Máx 600">
		  <span id="erro2" class="label label-important" style=" visibility:hidden;">* Tamanho inválido</span>
    </div>
  </div>
  
  	 <div  class="control-group">
            <label class="control-label" for="fileInput">Arquivo</label>
            <div class="controls">
              <input class="input-file" id="arquivo" name="arquivo"  type="file">
			  <span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira uma imagem</span>
            </div>
 	 </div>
<div  class="control-group ">
    <label class="control-label" for="fileInput">Link do banner</label>
    <div class="controls" >
      <input name="url"  type="text" class="input-xxlarge" id="url" placeholder="Para desativar este link deixe o campo em branco">
      <span id="erro4" class="label label-important" style=" visibility:hidden;">* Insira um link</span></div>
  </div>
 
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" onclick="return validaSplash()">Salvar</button>
    </div>
  </div>
</form>

 

<? } ?>


<? if($op == "add_now"){ 
	

	$largura = $_POST['largura'];	
	$altura = $_POST['altura'];
	$data = $_POST['data'];	
	$url = $_POST['url'];	
		
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		
		$arquivo = $_FILES['arquivo']['tmp_name'];
		$arquivo_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", '.swf'))); 
		
	//testando campos do splash 
	 if($data == "" || $largura == "" || $altura == "" || $arquivo == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }		
		
		if($arquivo != ""){  

			if (copy($arquivo,"../uploads/".$arquivo_name))	{ 
				    
			//redimensionamento
			$arquivo = $arquivo_name;				
					 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (largura,altura,data,arquivo,url,status )values('$largura','$altura','$data','$arquivo','$url','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&op=add&msg=erro&txt=Ocorreu um erro ao inserir o splash  '>"; }
	
	/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=aviso&txt=<b>Imagem não enviada!</b> Splash inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=sucesso&txt=Splash inserido com sucesso'>"; }
	
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
	  <li><a href="?pag=splash">Splash</a> <span class="divider">/</span></li>
      <li>Editar Splash</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=splash&op=edit_now&id=<?= $id; ?>" >

	<div class="control-group info" >
  	  <label class="control-label" for="fileInput">Data do Splash</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" > 
		 <span class="help-inline">Este será o prazo para exibição do splash</span>
		</div>		
	</div>
	
	<div   class="control-group ">
    <label class="control-label" for="fileInput">Largura</label>
    <div class="controls" >
	      <input name="largura" value="<?php echo $reg['largura']; ?>" type="text" class="input-small" id="largura" maxlength="3" placeholder="Máx 900">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Tamanho inválido</span>
    </div>
  </div>
  
  <div   class="control-group ">
    <label class="control-label" for="fileInput">Altura</label>
    <div class="controls" >
	      <input name="altura" value="<?php echo $reg['altura']; ?>" type="text" class="input-small" id="altura" maxlength="3" placeholder="Máx 600">
		  <span id="erro2" class="label label-important" style=" visibility:hidden;">* Tamanho inválido</span>
    </div>
  </div>
  
  	 <div  class="control-group">
            <label class="control-label" for="fileInput">Arquivo</label>
            <div class="controls">
              <input class="input-file" id="arquivo" name="arquivo"  type="file">
			
            </div>
 	 </div>
<div  class="control-group ">
    <label class="control-label" for="fileInput">Link do banner</label>
    <div class="controls" >
      <input name="url"  type="text" class="input-xxlarge" value="<?php echo $reg['url']; ?>" id="url" placeholder="Para desativar este link deixe o campo em branco">
      <span id="erro3" class="label label-important" style=" visibility:hidden;">* Insira um link</span></div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" onclick="return validaEditSplash()">Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$largura = $_POST['largura'];	
	$altura = $_POST['altura'];
	$data = $_POST['data'];	
	$url = $_POST['url'];	
		
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
	
		
	//testando campos do splash 
	 if($data == "" || $largura == "" || $altura == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		$arquivo = $_FILES['arquivo']['tmp_name'];
		$arquivo_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", '.swf'))); 
		
			if($arquivo != ""){  

			if (copy($arquivo,"../uploads/".$arquivo_name))	{ 
				    
			//redimensionamento
			$arquivo = $arquivo_name;				
					 
			 }   }
			
					 //resgatando imagem
		else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $arquivo =  $reg['arquivo']; }
		
	
						
	$sql= mysql_query("UPDATE $pagina SET largura='$largura',altura='$altura',data='$data',url='$url',arquivo='$arquivo' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o splash '>"; }
	
	/*else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=aviso&txt=<b>Imagem não enviada!</b> Splash inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=sucesso&txt=Splash editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Splash</h4>
			<p>Tem certeza que deseja excluir este splash? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=splash&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=splash">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=erro&txt=Ocorreu um erro ao excluir o splash'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=splash&msg=sucesso&txt=Splash excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do splash'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
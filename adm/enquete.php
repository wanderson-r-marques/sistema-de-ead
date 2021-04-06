<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "enquete";

?><script>  
   $(document).on('mouseenter','[rel=tooltip]', function(){
    $(this).tooltip('show');
		});
   </script> 
   
   <script>
	function duplicarCampos(){
	var clone = document.getElementById('origem').cloneNode(true);
	var destino = document.getElementById('destino');
	destino.appendChild (clone);
	
	var camposClonados = clone.getElementsByTagName('input');
	
	for(i=0; i<camposClonados.length;i++){
		camposClonados[i].value = '';
	}
	
}

function removerCampos(id){
	var node1 = document.getElementById('destino');
	node1.removeChild(node1.childNodes[0]);
}
</script>


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
      <li>Enquete</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo enquete  </a><br /><br />

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
<style>
.barra{
	width:200px; -moz-border-radius: 3px; 
	-webkit-border-radius:3px;
	  background-color: #E6E6E6;
}
.progresso{
	background-color: #CEE7FF; 
	width:130px; 
	padding-left:10px;
	height:20px; 
	color:#0066FF;
	-moz-border-radius: 3px; 
	-webkit-border-radius: 3px;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th width="140">Data da Publicação</th>
	 <th>Titulo do Enquete</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'open'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'close'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    <td>	<span ><?= $reg['data']; ?> </span></td>
  
    		
    <td>
	<?php echo $reg['pergunta']; ?><br />
	<?php 
	
		//recuperando array
	 $opcoes = explode('|',$reg['opcoes']);	 
	 $votos = explode('|',$reg['votos']);
	 
	 //total de votos
	 foreach ($votos as $values){
	 $total = $total + $values;
	 }
	 
	 if($total == 0){
	 
	 ?>
	 <div style="padding: 15px 0; color:#0066FF">A enquete ainda não foi votada!</div>
	 <?php 
	 
	 }else{
	
		$i = 0;
		foreach ($opcoes as $values){	 
		
	?><div><?php echo $values; ?></div>
		<div  class="barra"style="">
	  
	 		 <div  class="progresso"style="">	
	  <?php echo round($votos[$i] * 100 /$total)."%";	 ?>
	  		</div>	  
	  </div>
  <?php $i++; } }?>
	</td>	
    <td>
		<a href="?pag=enquete&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=enquete&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=enquete&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
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
	  <li><a href="?pag=enquete">Enquete</a> <span class="divider">/</span></li>
      <li>Adicionar Enquete</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=enquete&op=add_now" onclick="return validaEnquete()">

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data da Postagem</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" > 
		  <input name="hora" type="hidden"  value="<?= $hora; ?>" > 
		 
		</div>
		
	</div>
  <div  class="control-group" id="campo1">
    <label class="control-label" for="fileInput">Pegunta</label>
    <div class="controls" >
	   <input name="pergunta" value="" type="text" class="input-xxlarge" id="pergunta" placeholder="Adicione uma pergunta">
		 <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  <div   class="control-group" id="origem">
    <label class="control-label" for="fileInput">Opção:</label>
    <div class="controls" >
	      <input name="opcao[]" value="" type="text" class="input-xlarge" id="opcao[]" maxlength="35" placeholder="Adicione uma opção">
		  <i class="icon-minus-sign"  title="Remover esta opção"  rel="tooltip" onclick="removerCampos(this);"></i>
		  <i class="icon-plus-sign"  title="Adicionar mais opções"  rel="tooltip" onclick="duplicarCampos();"></i>
		  <span id="erro2" class="help-inline"></span>
    </div>
	</div>
	<div id="destino">	</div>	
	
	
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>  Salvar</button>
    </div>
  </div>
</form>

<? } ?>


<? if($op == "add_now"){ 
	
	
	$pergunta = $_POST['pergunta'];
	$descricao = $_POST['descricao'];
	$categoria = $_POST['categoria'];
	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
	
	$opcoes = $_POST['opcao'];
	
	foreach ($opcoes as $values){
	   $value = $value."|".$values;
	   $voto = $voto."|0";
	   
	}
		//removendo primeiro valor "|"
		$opcoes = substr( $value, 1 );
		$votos = substr( $voto, 1 );
	
		
	$sql= mysql_query("INSERT INTO $pagina (pergunta,opcoes,votos,data,status)values('$pergunta','$opcoes','$votos','$data','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&op=add&msg=erro&txt=Ocorreu um erro ao inserir a enquete  '>"; }
	
		//else if($hora == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=aviso&txt=<b>Imagem não enviada!</b> Enquete inserido com sucesso'>";}
			
	else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=sucesso&txt=Enquete inserido com sucesso'>"; }
	
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
		
		$categoria = $reg['categoria'];
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=enquete">Enquete</a> <span class="divider">/</span></li>
      <li>Editar Enquete</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=enquete&op=edit_now&id=<?= $id; ?>" onclick="return validaEnquete()">

	
		<div class="control-group" >
    <label class="control-label" for="fileInput">* Data da Postagem</label>
    <div class="controls controls-row">
      <input name="data" type="text"  class="input-small"   id="datepicker2" value="<?= $data; ?>" >
      <input name="hora" type="hidden" readonly="" class="input-mini" id="hora" value="<?= $hora; ?>" />
    </div>
  </div>
  <div  class="control-group" id="campo1">
    <label class="control-label" for="fileInput">Pergunta</label>
    <div class="controls" >
	   <input name="pergunta" value="<?php echo $reg['pergunta']; ?>" type="text" class="input-xxlarge" id="pergunta" placeholder="Adicione a url do enquete">
		 <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  
  
  <?php 
	
		//recuperando array
	 $opcoes = explode('|',$reg['opcoes']);
	
		
		foreach ($opcoes as $values){	 
		
	?><div   class="control-group" id="origem">
    <label class="control-label" for="fileInput">Opção:</label>
    <div class="controls" >
	      <input name="opcao[]" value="<?php echo $values; ?>" type="text" class="input-xlarge" id="opcao" maxlength="35" placeholder="Adicione uma opção">
		 
		  <span id="erro2" class="help-inline"></span>
    </div>
	</div>
 
  <?php }?> 
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i>  Salvar</button>
    </div>
  </div>

</form>

	<? }  ?>

<? if($op == "edit_now"){ 

	
	$pergunta = $_POST['pergunta'];
	$opcao = $_POST['opcao'];
	$categoria = $_POST['categoria'];
	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];

	
	//testando campos do enquete  /*
	 if($pergunta == "" || $opcao == "" || $data == ""){ 
	 echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$opcoes = $_POST['opcao'];
	
	foreach ($opcoes as $values){
	   $value = $value."|".$values;
	}
		//removendo primeiro valor "|"
	$opcoes = substr( $value, 1 );
		
		
		
	
		
	
		 					
	$sql= mysql_query("UPDATE $pagina SET pergunta='$pergunta',opcoes='$opcoes' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar a enquete '>"; }
	
		/*else if($hora == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=aviso&txt=<b>Imagem não enviada!</b> Enquete inserido com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=sucesso&txt=Enquete editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Enquete</h4>
			<p>Tem certeza que deseja excluir esta enquete? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=enquete&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=enquete">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=erro&txt=Ocorreu um erro ao excluir a enquete'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=enquete&msg=sucesso&txt=Enquete excluída com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status da enquete'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
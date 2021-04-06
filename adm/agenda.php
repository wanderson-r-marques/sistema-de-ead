<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "agenda";

?>

<? if($msg == "sucesso"){ ?><div class="alert alert-success fade in ">
<a href="#" class="close" data-dismiss="alert">×</a>
  <? echo $txt;?>
</div><? }?>

<? if($msg == "aviso"){ ?><div class="alert alert fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
  <? echo $txt;?>
</div><? }?>

<? if($msg == "erro"){ ?><div class="alert alert-error fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
  <? echo $txt;?>
</div><? }?>

<? if($msg == "exc"){ ?>
<div class="alert alert-block alert-error fade in">
<a href="#" class="close" data-dismiss="alert">×</a>
<? echo $txt;?>
</div>  
<? }?>



<? if($op == ""){ ?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Eventos</li>
      </ul>

<a href="?pag=<? echo $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo evento  </a>
<!--  <?php if ($_GET['lista'] == 'expirados') { ?>
<a href="?pag=<? echo $pagina; ?>" class="btn" ><i class="icon-ok-circle "></i> Eventos ativos  </a>
<?php } else { ?><a href="?pag=<? echo $pagina; ?>&lista=expirados" class="btn" ><i class="icon-ban-circle "></i> Eventos expirados  </a><?php }?> -->
<br /><br />

	<?php $dataAtual = date('Ymd');
	
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
    
	 <th width="130">Data de Validade</th>
    
      <th>Titulo do Evento</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'open'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'close'; $title = 'Exibir'; $status = 'sim'; }	

			    $dataAtual = date('Ymd');
			  	$data = $reg['data'];
		        $y = substr($data,0,4);
		        $m = substr($data,5,2);
		        $d = substr($data,8,2); 



	?>   
  <tr class="<?php if($y.$m.$d >= $dataAtual) echo 'success'; ?>">
    
   <td>
		 <strong><? echo diasemana($reg['data']);?></strong><br />		 
    <? echo  substr($reg['data'],8,2); echo mes($reg['data']);  ?> </td>
    		
    <td><? echo $reg['titulo']; ?></td>	
    <td>
		<a rel="tooltip" href="?pag=agenda&op=edit&id=<? echo $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a rel="tooltip" href="?pag=agenda&op=sta&id=<? echo $reg['id'];?>&status=<? echo $status;?>" class="btn" title="<? echo $title; ?>" ><i class="icon-eye-<? echo $icon; ?>"></i></a>
		<a rel="tooltip" href="?pag=agenda&op=exc&id=<? echo $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
  </tr>
	<?php } ?>

</table>
		<?
			
		// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
		// para pegarmos o n&uacute;mero total de registros				
		 $sql_select_all = "SELECT * FROM $pagina  ";		
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
	  <li><a href="?pag=agenda">Eventos</a> <span class="divider">/</span></li>
      <li>Adicionar Evento</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=agenda&op=add_now" >

	<div class="control-group info" >
  	  <label class="control-label" for="fileInput">Data do Evento</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<? echo $data; ?>" > 
		 <span class="help-inline">Este será o prazo para exibição do evento</span>
		</div>				
	</div>

	<div  class="control-group ">
		<label class="control-label" for="fileInput">Título do Evento</label>
		<div class="controls" >
			<input name="titulo"  required="required" value="" type="text" class="input-xxlarge" id="titulo" maxlength="150" placeholder="Adicione um titulo com 150 caracteres" >
			
		</div>
	</div>
  
<!--   <div  class="control-group ">
    <label class="control-label" for="fileInput">Local do Evento</label>
    <div class="controls" >
	      <input name="local" value="" type="text" class="input-large" id="local" maxlength="50" placeholder="Adicione um local com 50 caracteres">
	 	<span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira um local</span>
	 </div>
  </div>     -->

<!-- 	 <div  class="control-group">
            <label class="control-label" for="fileInput">Foto</label>
            <div class="controls">
              <input class="input-file" accept="image/*" required="required" id="imagem" name="imagem"  type="file">
	  </div>
  </div>
 -->
  
   <div  class="control-group">
    <label class="control-label" for="fileInput">Texto do Evento</label>
	<div class="controls">
	    <textarea name="texto" style="width: 600px; height: 400px;" id="textarea"></textarea>
    </div>
  </div>
  
   
  <div class="control-group ">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaAgenda()"><i class="icon-ok icon-white"></i> Salvar</button>	  
    </div>
  </div>
</form>

 

<? } ?>


<? if($op == "add_now"){ 
	
	$titulo = addslashes($_POST['titulo']);
	$texto = addslashes($_POST['texto']);
	$local = $_POST['local'];	
	$data = $_POST['data'];
	
	//testando campos do evento 
	 if($titulo == ""  || $texto == "<br>" || $texto == "<BR>" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		
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
					
			//facebook				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "facebook_";
					$largura = 250;
					$altura = 250;
					secao($imagem,$idt,$largura,$altura);
			
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "min_";
					$largura = 350;
					$altura = "";
					secao($imagem,$idt,$largura,$altura);
					
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 600;
					$altura = "";
					secao($imagem,$idt,$largura,$altura);		
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (local,titulo, texto, data, imagem, status )values('$local','$titulo','$texto','$data','$imagem','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&op=add&msg=erro&txt=Ocorreu um erro ao inserir o evento  '>"; }
	
		//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=aviso&txt=<b>Imagem não enviada!</b> Evento inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=sucesso&txt=Evento inserido com sucesso'>"; }
	
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
	  <li><a href="?pag=agenda">Eventos</a> <span class="divider">/</span></li>
      <li>Editar Evento</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=agenda&op=edit_now&id=<? echo $id; ?>" >

	<div class="control-group info" >
  	  <label class="control-label" for="fileInput">Data do Evento</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<? echo $data; ?>" > 
		 <span class="help-inline">Este será o prazo para exibição do evento</span>
		</div>
		
		
		
	</div>

  <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Título do Evento</label>
    <div class="controls" >
	      <input name="titulo" value="<? echo aspas($reg['titulo']); ?>" type="text" class="input-xxlarge" id="titulo" maxlength="150" placeholder="Adicione um titulo com 150 caracteres">
		  
    </div>
  </div>
  
<!--   <div id="campo2"  class="control-group ">
    <label class="control-label" for="fileInput">Local do Evento</label>
    <div class="controls" >
	      <input name="local" value="<? echo $reg['local']; ?>" type="text" class="input-large" id="local" maxlength="50" placeholder="Adicione um local com 50 caracteres">
		  <span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira um local</span>
    </div>
  </div>    

	 <div id="campo3"  class="control-group">
            <label class="control-label" for="fileInput">Foto</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem"  type="file">
            </div>
  </div>
 -->
  
   <div  class="control-group">
    <label class="control-label" for="fileInput">Texto do Evento</label>
    <div class="controls" >
	    <textarea name="texto" style="width: 650px; height: 400px;" id="textarea"><? echo aspas($reg['texto']); ?></textarea>
		<span class="help-inline"></span>
    </div>
  </div>
  
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary" onclick="return validaEditAgenda()"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$local = $_POST['local'];
	$titulo = addslashes($_POST['titulo']);
	$texto = addslashes($_POST['texto']);
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	
	//testando campos do evento  /*
	if($titulo == "" || $texto == "<br>" || $texto == "<BR>" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
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
					
			//facebook				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "facebook_";
					$largura = 250;
					$altura = 250;
					secao($imagem,$idt,$largura,$altura);				
					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "min_";
					$largura = 350;
					$altura = "";
					secao($imagem,$idt,$largura,$altura);
					
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 600;
					$altura = "";
					secao($imagem,$idt,$largura,$altura);		
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET local='$local',titulo='$titulo',descricao='$descricao',texto='$texto',imagem='$imagem',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o evento '>"; }
	
		//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=aviso&txt=<b>Imagem não enviada!</b> Evento inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=sucesso&txt=Evento editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Evento</h4>
			<p>Tem certeza que deseja excluir este evento? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=agenda&op=exc&id=<? echo $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=agenda">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=erro&txt=Ocorreu um erro ao excluir o evento'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=agenda&msg=sucesso&txt=Evento excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
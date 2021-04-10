<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "videos";

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
      <li>Vídeos</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo vídeo  </a><br /><br />

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
	 <th width="110">Data do Vídeo</th>
    <th>Titulo do Vídeo</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    <td>	<?php parse_str( parse_url( $reg['url'], PHP_URL_QUERY ), $array ); $url = $array['v']; ?>
		<img src="http://img.youtube.com/vi/<?= $url; ?>/default.jpg"  border="0" class="img-polaroid">  </td>
   <td>
		 <strong><?= diasemana($reg['data']);?></strong><br />		 
    <?=  substr($reg['data'],8,2); echo mes($reg['data']);  ?> </td>
    		
    <td><?= $reg['titulo']; ?><br /><span class="descricao"><?= $reg['url']; ?></span></td>	
    <td>
		<a href="?pag=videos&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=videos&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=videos&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
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
	  <li><a href="?pag=videos">Vídeos</a> <span class="divider">/</span></li>
      <li>Adicionar Vídeo</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=videos&op=add_now" onclick="return validaVideo()">

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">* Data da Postagem</label>
		<div class="controls controls-row">
		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" > 
		  <input name="hora" type="hidden"  value="<?= $hora; ?>" > 
		 
		</div>
		
	</div>
  <div  class="control-group" id="campo1">
    <label class="control-label" for="fileInput">* Endereço do Vídeo</label>
    <div class="controls" >
	   <input name="url" value="" type="text" class="input-xxlarge" id="url" placeholder="Adicione a url do vídeo">
		 <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  <div  id="campo2" class="control-group ">
    <label class="control-label" for="fileInput">* Título do Vídeo</label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-xxlarge" id="titulo" maxlength="35" placeholder="Adicione um título com até 35 caracteres">
		  <span id="erro2" class="help-inline"></span>
    </div>
	</div>
	 <div  id="campo3" class="control-group ">
    <label class="control-label" for="fileInput">* Descrição do Vídeo</label>
    <div class="controls" >
	      <input name="descricao" value="" type="text" class="input-xxlarge" id="descricao" maxlength="135" placeholder="Adicione um desrição com até 135 caracteres">
		  <span id="erro3" class="help-inline"></span>
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">* Categoria do Vídeo</label>
    <div class="controls" >
	      <select name="categoria" id="categoria" class="span2" >
      	<?php $sql = mysql_query("SELECT * FROM categorias ");
				while($reg = mysql_fetch_array($sql)){ ?>
        <option  value="<?php echo $reg['id']; ?>"><?php echo $reg['titulo']; ?></option>
		<?php } ?>        
      </select> 
		 
    </div>
  </div>
		<div id="campo4"  class="control-group">
            <label class="control-label" for="fileInput">* Imagem de Capa</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem"  type="file">
			   <span id="erro4" class="help-inline"></span>
            </div>
  </div>

  
  <div  class="control-group">
    <label class="control-label" for="fileInput">Adicionar Texto</label>
    <div class="controls" >
	    <textarea name="texto" style="width: 550px; height: 200px;" id="textarea"></textarea>
		<span class="help-inline"></span>
    </div>
  </div>
  
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Salvar</button>
    </div>
  </div>
</form>

<? } ?>


<? if($op == "add_now"){ 
	
	$titulo = addslashes($_POST['titulo']);
	$url = $_POST['url'];
	$descricao = $_POST['descricao'];
	$categoria = $_POST['categoria'];
	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	
	$imagem = $_FILES['imagem']['tmp_name'];
	$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem']['name']))); 
	
	//testando campos do vídeo 
	 if($titulo == "" || $url == "" || $data == "" || $imagem == "" || $descricao == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
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
					$largura = 160;
					$altura = 120;
					secao($imagem,$idt,$largura,$altura);
					
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 530;
					$altura = 350;
					secao($imagem,$idt,$largura,$altura);		
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
		
		
	$sql= mysql_query("INSERT INTO $pagina (url,titulo,descricao,categoria,imagem,texto,data,hora,status 		)values('$url','$titulo','$descricao','$categoria','$imagem','$texto','$data','$hora','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&op=add&msg=erro&txt=Ocorreu um erro ao inserir o vídeo  '>"; }
	
		//else if($hora == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=aviso&txt=<b>Imagem não enviada!</b> Vídeo inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=sucesso&txt=Vídeo inserido com sucesso'>"; }
	
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
	  <li><a href="?pag=videos">Vídeos</a> <span class="divider">/</span></li>
      <li>Editar Vídeo</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=videos&op=edit_now&id=<?= $id; ?>" onclick="return validaAgenda2()">

	
		<div class="control-group" >
    <label class="control-label" for="fileInput">* Data da Postagem</label>
    <div class="controls controls-row">
      <input name="data" type="text"  class="input-small"   id="datepicker2" value="<?= $data; ?>" >
      <input name="hora" type="hidden" readonly="" class="input-mini" id="hora" value="<?= $hora; ?>" />
    </div>
  </div>
  <div  class="control-group" id="campo1">
    <label class="control-label" for="fileInput">* Endereço do Vídeo</label>
    <div class="controls" >
	   <input name="url" value="<?php echo $reg['url'] ?>" type="text" class="input-xxlarge" id="url" placeholder="Adicione a url do vídeo">
		 <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  <div  id="campo2" class="control-group ">
    <label class="control-label" for="fileInput">* Título do Vídeo</label>
    <div class="controls" >
	      <input name="titulo" value="<?php echo $reg['titulo'] ?>" type="text" class="input-xxlarge" id="titulo" maxlength="35" placeholder="Adicione um título com 35 caracteres">
		  <span id="erro2" class="help-inline"></span>
    </div>
  </div>
	 <div  id="campo3" class="control-group ">
    <label class="control-label" for="fileInput">* Descrição do Vídeo</label>
    <div class="controls" >
	      <input name="descricao" value="<?php echo $reg['descricao'] ?>" type="text" class="input-xxlarge" id="descricao" maxlength="135" placeholder="Adicione um desrição com até 135 caracteres">
		  <span id="erro3" class="help-inline"></span>
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">* Categoria do Vídeo</label>
    <div class="controls" >
	      <select name="categoria" id="categoria" class="span2" >
		<?php $sql = mysql_query("SELECT * FROM categorias where id <> '$categoria' order by titulo asc");
				while($reg2 = mysql_fetch_array($sql)){ ?>  
		 <option selected="selected" value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>		  
      	<?php $sql = mysql_query("SELECT * FROM categorias where titulo <> '$categoria' order by titulo asc");
				while($reg2 = mysql_fetch_array($sql)){ ?>
        <option  value="<?php echo $reg2['id']; ?>"><?php echo $reg2['titulo']; ?></option>
		<?php } ?>        
      </select> 
		 
    </div>
  </div>
		<div id="campo4"  class="control-group">
            <label class="control-label" for="fileInput">* Imagem de Capa</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem"  type="file">
			   <span id="erro4" class="help-inline"></span>
            </div>
  </div>

  
  <div  class="control-group">
    <label class="control-label" for="fileInput">Adicionar Texto</label>
    <div class="controls" >
	    <textarea name="texto" style="width: 550px; height: 200px;" id="textarea"><?php echo stripslashes($reg['texto']); ?></textarea>
		<span class="help-inline"></span>
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Salvar</button>
    </div>
  </div>
	
	

</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$titulo = addslashes($_POST['titulo']);
	$url = $_POST['url'];
	$descricao = $_POST['descricao'];
	$categoria = $_POST['categoria'];
	$texto = addslashes($_POST['texto']);
	$data = $_POST['data'];
	$hora = $_POST['hora'];

	
	//testando campos do vídeo  /*
	 if($titulo == "" || $url == "" || $data == "" || $descricao == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
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
					$largura = 160;
					$altura = 120;
					secao($imagem,$idt,$largura,$altura);
					
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "max_";
					$largura = 530;
					$altura = 350;
					secao($imagem,$idt,$largura,$altura);		
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
		  
		 					
	$sql= mysql_query("UPDATE $pagina SET url='$url',titulo='$titulo',descricao='$descricao',categoria='$categoria',imagem='$imagem',texto='$texto',hora='$hora',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o vídeo '>"; }
	
		else if($hora == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=aviso&txt=<b>Imagem não enviada!</b> Vídeo inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=sucesso&txt=Vídeo editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Vídeo</h4>
			<p>Tem certeza que deseja excluir este vídeo? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=videos&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=videos">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=erro&txt=Ocorreu um erro ao excluir o vídeo'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=videos&msg=sucesso&txt=Vídeo excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status do álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
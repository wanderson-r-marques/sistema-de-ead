<?php require_once("includes/verifica.php"); $pagina = "noticias";

?>
<? if($msg == "sucesso"){ ?>
<div class="alert alert-success fade in "> <a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div>
<? }?>
<? if($msg == "aviso"){ ?>
<div class="alert alert fade in"> <a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div>
<? }?>
<? if($msg == "erro"){ ?>
<div class="alert alert-error fade in"> <a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div>
<? }?>
<? if($msg == "exc"){ ?>
<div class="alert alert-block alert-error fade in"> <a href="#" class="close" data-dismiss="alert">×</a>
  <?= $txt;?>
</div>
<? }?>
<? if($op == ""){ ?>
<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li><a href="?pag=noticias">Notícias</a> <span class="divider">/</span></li>
</ul>
<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar nova notícia </a><br />
<br />
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
  <thead>
    <tr>
      <th width="130">Capa</th>
      <th>Titulo da Notícia</th>
      <th width="140">A&ccedil;&atilde;o</th>
    </tr>
  </thead>
  <?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'open'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'close'; $title = 'Exibir'; $status = 'sim'; }	
	?>
  <tr>
    <td><img src="../uploads/adm_<?= $reg['imagem']; ?>"  border="0" class="img-polaroid"> </td>
    <td><?= $reg['titulo']; ?></td>
    <td><a rel="tooltip" href="?pag=noticias&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a> <a rel="tooltip" href="?pag=noticias&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a> <a rel="tooltip" href="?pag=noticias&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a> </td>
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

 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Limpar codigo</h3>
  </div>
  <div class="modal-body">
    <textarea class="mceNoEditor" style="width: 600px; height: 400px;" ></textarea>
  </div>
</div>
<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li><a href="?pag=noticias">Notícias</a> <span class="divider">/</span></li>
  <li>Adicionar Notícia</li>
</ul>
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=noticias&op=add_now">
  <div class="control-group" >
    <label class="control-label" for="fileInput">Data e hora</label>
    <div class="controls controls-row">
      <input name="data" type="text" readonly="" class="input-small" id="data" value="<?= $data; ?>" >
      <input name="hora" type="text" readonly="" class="input-mini" id="hora" value="<?= $hora; ?>" />
    </div>
  </div>   
<!--     <div class="control-group" id="tipo" >
    <label class="control-label" for="fileInput">Posição</label>
    <div class="controls">
		<label class="radio inline">
		  <input type="radio" name="tipo" id="inlineRadio1" value="destaque"> Destaques

		</label>
		<label class="radio inline">
		  <input type="radio" name="tipo" id="inlineRadio2" value="slide"> Slide
		</label>
	  
    </div>
  </div>  -->   
 <!-- <div class="control-group" id="tipo" >
    <label class="control-label" for="fileInput">Classificação</label>
    <div class="controls">
      <select name="local" id="local" class="input-large">
		<option value="Geral">Geral</option> 
		<option value="Interior">Interior</option> 
		<option value="Política">Política</option> 
		<option value="Esportes">Esportes</option> 	
		<option value="Entretenimento">Entretenimento</option> 
      </select> 
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Categoria</label>
    <div class="controls" >
      <input name="categoria" value="" type="text" required="" class="input-xxlarge" id="categoria" maxlength="50" placeholder="Adicione um categoria com 50 caracteres">
	  
      </div>
  </div> -->
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Título da Notícia</label>
    <div class="controls" >
      <input name="titulo" value="" type="text" required="" class="input-xxlarge" id="titulo" maxlength="80" placeholder="Adicione um titulo com 80 caracteres">
	  
      </div>
  </div>
<!--   <div  class="control-group ">
    <label class="control-label" for="fileInput">Descrição da Notícia</label>
    <div class="controls" >
      <input name="descricao" value="" type="text" required="" class="input-xxlarge" id="descricao" maxlength="150" placeholder="Adicione um descricao com 150 caracteres"> 
	     
  </div>
  </div> -->
  <div  class="control-group">
    <label class="control-label"  for="fileInput">Foto</label>
    <div class="controls">
      <input class="input-file" accept="image/*" required="required"  name="imagem" id="imagem" type="file">	  
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Texto da Notícia</label>
    <div class="controls" >
      <textarea name="texto" class="" style="width: 600px; height: 400px;" id="textarea"></textarea>
      </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary"  ><i class="icon-ok icon-white"></i> Salvar</button>
       <a href="#myModal" role="button" class="btn" data-toggle="modal">Limpar codigo</a>
	 </div>
  </div>
</form>
<? } ?>
<? if($op == "add_now"){ 
	$local = $_POST['local'];
	$categoria = $_POST['categoria'];
	$tipo = $_POST['tipo'];
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$texto = addslashes($_POST['texto']);
	$menu = $_POST['submenu'];
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	$tipo = $_POST['tipo'];
		
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
		
	//testando campos da noticia
		if( $titulo == "" || $imagem == ""|| $texto == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>"; die(); }
	
				
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
					$largura = 490;
					$altura = 255;
					secao($imagem,$idt,$largura,$altura);				
					
		 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "360x150_";
					$largura = 360;
					$altura = 150;
					secao($imagem,$idt,$largura,$altura);	
			 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "360x250_";
					$largura = 360;
					$altura = 250;
					secao($imagem,$idt,$largura,$altura);						
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "350x200_";
					$largura = 350;
					$altura = 200;
					secao($imagem,$idt,$largura,$altura);
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "170x110_";
					$largura = 170;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);			
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "360x280_";
					$largura = 360;
					$altura = 280;
					secao($imagem,$idt,$largura,$altura);	
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "170x120_";
					$largura = 170;
					$altura = 120;
					secao($imagem,$idt,$largura,$altura);	
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "355x170_";
					$largura = 355;
					$altura = 170;
					secao($imagem,$idt,$largura,$altura);	


			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (categoria,local,tipo,titulo,descricao ,texto, hora, data, imagem,  status )
	values('$categoria','$local','$tipo','$titulo','$descricao','$texto','$hora','$data','$imagem','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&op=add&msg=erro&txt=Ocorreu um erro ao inserir a notícia'>"; }
	
		else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=aviso&txt=<b>Imagem não enviada!</b> Notícia inserida com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=sucesso&txt=Notícia inserida com sucesso'>"; }
	
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
  <li><a href="?pag=noticias">Notícias</a> <span class="divider">/</span></li>
  <li>Editar Notícia</li>
</ul>
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=noticias&op=edit_now&id=<?= $id; ?>" >
 <div class="control-group" >
    <label class="control-label" for="fileInput">Data e hora</label>
    <div class="controls controls-row">
      <input name="data" type="text" readonly="" class="input-small" id="data" value="<?= $data; ?>" >
      <input name="hora" type="text" readonly="" class="input-mini" id="hora" value="<?= $hora; ?>" />
    </div>
  </div>  


<!--  <div class="control-group" id="tipo" >
    <label class="control-label" for="fileInput">Classificação</label>
    <div class="controls">
      <select name="local" id="local" class="input-large">
      	<option  selected="selected"  value="<?php echo $reg['local']; ?>"><?php echo $reg['local']; ?></option>
		<option value="Geral">Geral</option> 
		<option value="Interior">Interior</option> 
		<option value="Política">Política</option> 
		<option value="Esportes">Esportes</option> 	
		<option value="Entretenimento">Entretenimento</option> 
      </select> 
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Categoria</label>
    <div class="controls" >
      <input name="categoria" value="<?php echo aspas($reg['categoria']); ?>" type="text" required="" class="input-xxlarge" id="categoria" maxlength="50" placeholder="Adicione um categoria com 50 caracteres">
	  
      </div>
  </div> -->
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Título da Notícia</label>
    <div class="controls" >
      <input name="titulo" value="<?php echo aspas($reg['titulo']); ?>" type="text" required="" class="input-xxlarge" id="titulo" maxlength="80" placeholder="Adicione um titulo com 80 caracteres">
	  
      </div>
  </div>
<!--   <div  class="control-group ">
    <label class="control-label" for="fileInput">Descrição da Notícia</label>
    <div class="controls" >
      <input name="descricao" value="<?php echo aspas($reg['descricao']); ?>" type="text" required="" class="input-xxlarge" id="descricao" maxlength="150" placeholder="Adicione um descricao com 150 caracteres"> 
	     
  </div>
  </div> -->
  <div  class="control-group">
    <label class="control-label"  for="fileInput">Foto</label>
    <div class="controls">
      <input class="input-file" accept="image/*"   name="imagem" id="imagem" type="file">	  
    </div>
  </div>
  <div  class="control-group ">
    <label class="control-label" for="fileInput">Texto da Notícia</label>
    <div class="controls" >
      <textarea name="texto" style="width: 600px; height: 400px;" id="textarea"><?php echo aspas($reg['texto']); ?></textarea>
      </div>
  </div>



  <div class="control-group ">
    <div class="controls">
      <button type="submit" class="btn btn-primary"  onclick="return validaEditNoticia()"><i class="icon-ok icon-white"></i> Salvar</button>
	   <span id="erro" class="help-inline"></span>
    </div>
  </div>
</form>
<? }  ?>
<? if($op == "edit_now"){ 

	$local = $_POST['local'];
	$categoria = $_POST['categoria'];
	$tipo = $_POST['tipo'];
	$menu = $_POST['submenu'];
	$titulo = addslashes($_POST['titulo']);
	$descricao = addslashes($_POST['descricao']);
	$texto = addslashes($_POST['texto']);
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	$tipo = $_POST['tipo'];
	
	//testando campos da noticia
		if( $titulo == "" ||  $texto == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
		
		
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$imagem = $_FILES['imagem']['tmp_name'];
		$tmp = explode(".", $_FILES['imagem']['name']);
		$imagem_name = str_replace(" ", "",microtime()).".".strtolower(end($tmp)); 


		
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
					$largura = 490;
					$altura = 255;
					secao($imagem,$idt,$largura,$altura);				
					
		 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "360x150_";
					$largura = 360;
					$altura = 150;
					secao($imagem,$idt,$largura,$altura);	
			 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "360x250_";
					$largura = 360;
					$altura = 250;
					secao($imagem,$idt,$largura,$altura);						
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "350x200_";
					$largura = 350;
					$altura = 200;
					secao($imagem,$idt,$largura,$altura);
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "170x110_";
					$largura = 170;
					$altura = 110;
					secao($imagem,$idt,$largura,$altura);			
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "360x280_";
					$largura = 360;
					$altura = 280;
					secao($imagem,$idt,$largura,$altura);	
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "170x120_";
					$largura = 170;
					$altura = 120;
					secao($imagem,$idt,$largura,$altura);	
					//adicione uma indentidade a imagem e um tamanho					
					$idt = "355x170_";
					$largura = 355;
					$altura = 170;
					secao($imagem,$idt,$largura,$altura);	
	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET categoria='$categoria',tipo='$tipo',local='$local',titulo='$titulo',descricao='$descricao',texto='$texto',imagem='$imagem' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar a notícia'>"; }
	
		else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=aviso&txt=<b>Imagem não enviada!</b> Notícia inserida com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=sucesso&txt=Notícia editada com sucesso'>"; }
	
	} ?>
<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li><a href="?pag=noticias">Notícias</a> <span class="divider">/</span></li>
  <li>Excluir Notícia</li>
</ul>
<div class="alert alert-block alert-error fade in"> <a href="#" class="close" data-dismiss="alert">×</a>
  <h4 class="alert-heading">Excluir Notícia</h4>
  <p>Tem certeza que deseja excluir esta notícia? Esta operação não pode ser desfeita.</p>
  <p> <a class="btn btn-danger" href="?pag=noticias&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=noticias">Não</a> </p>
</div>
<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=erro&txt=Ocorreu um erro ao excluir a notícia'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=noticias&msg=sucesso&txt=Notícia excluída com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>

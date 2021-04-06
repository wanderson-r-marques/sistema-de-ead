<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "gata";
?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
	<script type="text/javascript" src="multi_upload/multiUpload.js"></script>
	<style type="text/css">
		@import 'multi_upload/style.css';
		@import "multi_upload/multiUpload.css";
	</style>
	
	
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
      <li> Álbuns</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo álbum  </a><br /><br />

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
 <thead>
 	<tr>
    <td width="130">Capa</td>
	 <td width="105">Data do Álbum</td>
    <td>Titulo do Álbum</td>
    <td width="140">A&ccedil;&atilde;o</td>
	</tr>
  </thead>
	<?php while($reg = mysql_fetch_array($sql)){ ?>  
  <tr>
    <td><?php $imagem = explode(',',$reg['imagem']); ?>
		<img src="../uploads/adm_<?= $imagem[0]; ?>"  border="0" class="img-polaroid">  </td>
   <td>
		  
		<? $data = $reg['data'];
		$y = substr($data,0,4);
		$m = substr($data,5,2);
		$d = substr($data,8,2);
		$data=$d."/".$m."/".$y;
		 
		 if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
		 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
		 
		  echo $data; ?> </td>
    		
    <td><?= $reg['titulo']; ?><br /><span class="descricao"><?= $reg['descricao']; ?></span></td>	
    <td>
		<a href="?pag=gata&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=gata&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=gata&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
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
 

 
  $file = date('d').date('His');
 
 mkdir("../".$pagina.'/'.$file, 0777); // Cria uma nova pasta dentro do diretório atual com permissão CHMOD de 744
 mkdir("../".$pagina.'/'.$file."/thumb/", 0777); 
 mkdir("../".$pagina.'/'.$file."/edit/", 0777); 
 
 	 // Criando nome do diretorio
	$open = fopen("multi_upload/cont.txt","w");
	fwrite($open,$pagina.'/'.$file.'/');
	fclose($open);

?>
		
	<script type="text/javascript">
		var uploader = new multiUpload('uploader', 'uploader_files', {
			swf:            'multi_upload/multiUpload.swf',
			script:         'multi_upload/fotos_upload.php?i=../../<?= $pagina.'/'.$file; ?>/',
			expressInstall: 'multi_upload/expressInstall.swf',
			multi:          true,
			auto:           true
		});		
	</script>
	
	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=gata"> Álbuns</a> <span class="divider">/</span></li>
      <li>Adicionar  Álbum</li>
      </ul>


<form name="formulario" id="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=gata&op=add_now&file=<?= $file;?>" onclick="return validaFotos()">

	<div class="control-group" >
  	  <label class="control-label" for="fileInput">Data do Álbum</label>
		<div class="controls controls-row">		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" > 	
		</div>	
	</div>

  <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome do Gata</label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-xxlarge" id="titulo" maxlength="35" placeholder="Adicione um nome com 35 caracteres">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  
  <div id="campo0"  class="control-group ">
    <label class="control-label" for="fileInput">Descrição do Ensaio</label>
    <div class="controls" >
	      <textarea name="descricao" class="input-xxlarge" id="descricao" ></textarea>
		  <span id="erro0" class="help-inline"></span>
    </div>
  </div>    

	 <div id="campo0"  class="control-group">
            <label class="control-label" for="fileInput">Foto da Capa</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem01"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem02"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem03"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem04"  type="file">			  
            </div>
          </div>
		 
		 <div id="campo3"  class="control-group">
            <label class="control-label" for="fileInput">Adicionar fotos</label>
            <div class="controls">
			<!--div conteudo de botao browser fiel -->
            <div id="uploader"></div>
            </div>
          </div>
			<!--div conteudo de imagens carregando -->
			<div id="uploader_files"></div>				
			
		<div class="control-group" >
		<div class="control pull-right" style="margin:10px 20px 0 0;"><span  id="content" ></span>		
		  <button id="redimensiona" class="btn btn-success">Continuar</button>
		  <button id="redimensionando" class="btn btn-danger" style="display:none;">Redimensionando...</button>
		 <!--<button id="salva" type="submit" class="btn btn-success" style="display:none;">Concluir</button> -->
		</div>
	  </div>
	</div>		
</form>





<? } ?>

<? if($op == "add_now"){ ?>
	
		
	 <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=gata"> Álbuns</a> <span class="divider">/</span></li>
      <li>Redimensionando Imagens</li>
      </ul>
	
	<?
	$titulo = $_POST['titulo'];
	$descricao = addslashes($_POST['descricao']);
	$texto = $_POST['texto'];
	$data = $_POST['data'];
	
	//testando campos do álbum 
	 if($titulo == "" || $descricao == ""  ){ echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		
		$imagem01 = $_FILES['imagem01']['tmp_name'];
		$imagem01_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem01']['name']))); 
		$imagem02 = $_FILES['imagem02']['tmp_name'];
		$imagem02_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem02']['name']))); 
		$imagem03 = $_FILES['imagem03']['tmp_name'];
		$imagem03_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem03']['name']))); 
		$imagem04 = $_FILES['imagem04']['tmp_name'];
		$imagem04_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem04']['name']))); 
		
		
		if($imagem01 != "" && $imagem02 != "" && $imagem03 != "" && $imagem04 != ""){  

			if (copy($imagem01,"../uploads/".$imagem01_name))	{ 
				    
			//redimensionamento
			$imagem01 = $imagem01_name;				
			
			$funcaoPosicao = 'sim';
			
			//adm				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "adm_";
					$largura = 120;
					$altura = 100;
					secao($imagem01,$idt,$largura,$altura);	
					
					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "01_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem01,$idt,$largura,$altura);
					
								
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "01_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem01,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem01) ; 
			 
			 }  
			 
			 if (copy($imagem02,"../uploads/".$imagem02_name))	{ 
			 //redimensionamento
			$imagem02 = $imagem02_name;	
			 
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "02_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem02,$idt,$largura,$altura);
			
			
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "02_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem02,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem02) ; 
			 
			 } 
			 
			 if (copy($imagem03,"../uploads/".$imagem03_name))	{ 
			 //redimensionamento
			$imagem03 = $imagem03_name;
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "03_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem03,$idt,$largura,$altura);
		
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "03_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem03,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem03) ; 
			 
			 } 
			 
			 if (copy($imagem04,"../uploads/".$imagem04_name))	{ 
			 //redimensionamento
			$imagem04 = $imagem04_name;
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "04_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem04,$idt,$largura,$altura);
		
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "04_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem04,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem04) ; 
			 
			 			 
			 } 	  }
	
			$imagem = $imagem01.','.$imagem02.','.$imagem03.','.$imagem04;
			
	$sql= mysql_query("INSERT INTO $pagina (descricao,titulo,  data, imagem, file, status)values('$descricao','$titulo','$data','$imagem','$file','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=add&msg=erro&txt=Ocorreu um erro ao inserir o álbum '>"; }
	
		else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=aviso&txt=<b>Imagem de capa não enviada!</b>  Álbum inserido com sucesso'>";}
			
			else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=sucesso&txt= Álbum inserido com sucesso'>"; }
	
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
		
		$file = $pagina.'/'.$reg['file']."/edit/";
		
		// Criando nome do diretorio
	$open = fopen("multi_upload/cont.txt","w");
	fwrite($open,$file);
	fclose($open);
		
?>		<script type="text/javascript">
		var uploader = new multiUpload('uploader', 'uploader_files', {
			swf:            'multi_upload/multiUpload.swf',
			script:         'multi_upload/fotos_upload.php?i=../../<?= $file; ?>',
			expressInstall: 'multi_upload/expressInstall.swf',
			multi:          true,
			auto:           true
		});		
		</script>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=gata"> Álbuns</a> <span class="divider">/</span></li>
      <li>Editar  Álbum</li>
      </ul>
	
<form name="formulario" id="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=gata&op=edit_now&id=<?= $id; ?>" onclick="return validaAgenda2()">

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data do Álbum</label>
		<div class="controls controls-row">		
		  <input name="data" type="text"  class="input-small" id="datepicker2" value="<?= $data; ?>" >		 
		</div>		
		
	</div>


 <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome do Gata</label>
    <div class="controls" >
	      <input name="titulo" value="<?= $reg['titulo']; ?>" type="text" class="input-xxlarge" id="titulo" maxlength="35" placeholder="Adicione um nome com 35 caracteres">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  
  <div id="campo0"  class="control-group ">
    <label class="control-label" for="fileInput">Descrição do Ensaio</label>
    <div class="controls" >
	      <textarea name="descricao" class="input-xxlarge" id="descricao" ><?= $reg['descricao']; ?></textarea>
		  <span id="erro0" class="help-inline"></span>
    </div>
  </div>    

 <div id="campo0"  class="control-group">
            <label class="control-label" for="fileInput">Foto da Capa</label>
            <div class="controls">
              <input class="input-file" id="imagem" name="imagem01"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem02"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem03"  type="file">			  
            </div>
			 <div class="controls">
              <input class="input-file" id="imagem" name="imagem04"  type="file">			  
            </div>
          </div>
		 <div id="campo4"  class="control-group">
            <label class="control-label" for="fileInput">Visualizar fotos</label>
            <div class="controls">
 				<a href="?pag=gata&op=ver&id=<?= $id; ?>"><button class="btn btn-info" type="button">Ver todas as fotos</button></a> 			  
            </div>
          </div>
		  
		  <div id="campo3"  class="control-group">
            <label class="control-label" for="fileInput">Adicionar fotos</label>
            <div class="controls">
			<!--div conteudo de botao browser fiel -->
            <div id="uploader"></div>
            </div>
          </div>
			<!--div conteudo de imagens carregando -->
			<div id="uploader_files"></div>	 
			
		<div class="control-group "><div class="control pull-right" style="margin:10px 20px 0 0;"><span  id="content" ></span>		
		  <button id="edit-redimensiona" class="btn btn-success">Salvar Álbum</button>
		  <button id="edit-redimensionando" class="btn btn-danger" style="display:none;">Redimensionando...</button>
		  <!--<button id="edit-salva" type="submit" class="btn btn-success" style="display:none;">Concluir</button> -->
		</div>
	  </div>
	</div>		   
 
</form>	
	<? }  ?>

<? if($op == "edit_now"){ 

	$descricao = addslashes($_POST['descricao']);
	$titulo = $_POST['titulo'];
	$texto = $_POST['texto'];
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	
	//testando campos do álbum  /*
	if($titulo == "" || $texto == "<br>" || $texto == "<BR>" ){ echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$imagem01 = $_FILES['imagem01']['tmp_name'];
		$imagem01_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem01']['name']))); 
		$imagem02 = $_FILES['imagem02']['tmp_name'];
		$imagem02_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem02']['name']))); 
		$imagem03 = $_FILES['imagem03']['tmp_name'];
		$imagem03_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem03']['name']))); 
		$imagem04 = $_FILES['imagem04']['tmp_name'];
		$imagem04_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['imagem04']['name']))); 
		
		
		if($imagem01 != "" && $imagem02 != "" && $imagem03 != "" && $imagem04 != ""){  

			if (copy($imagem01,"../uploads/".$imagem01_name))	{ 
				    
			//redimensionamento
			$imagem01 = $imagem01_name;			
					
			$funcaoPosicao = 'sim';
			//adm				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "adm_";
					$largura = 120;
					$altura = 100;
					secao($imagem01,$idt,$largura,$altura);	
					
			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "01_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem01,$idt,$largura,$altura);
					
			
					
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "01_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem01,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem01) ; 
			 
			 }  
			 
			 if (copy($imagem02,"../uploads/".$imagem02_name))	{ 
			 //redimensionamento
			$imagem02 = $imagem02_name;	
			 
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "02_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem02,$idt,$largura,$altura);
			
			
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "02_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem02,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem02) ; 
			 
			 } 
			 
			 if (copy($imagem03,"../uploads/".$imagem03_name))	{ 
			 //redimensionamento
			$imagem03 = $imagem03_name;
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "03_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem03,$idt,$largura,$altura);
					
		
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "03_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem03,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem03) ; 
			 
			 } 
			 
			 if (copy($imagem04,"../uploads/".$imagem04_name))	{ 
			 //redimensionamento
			$imagem04 = $imagem04_name;
			 //secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "04_min_";
					$largura = 70;
					$altura = 60;
					secao($imagem04,$idt,$largura,$altura);
					
		
			//secao2				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "04_max_";
					$largura = 480;
					$altura = 320;
					secao($imagem04,$idt,$largura,$altura);		
					
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem04) ; 
			 
			 } 	
			 
			 $imagem = $imagem01.','.$imagem02.','.$imagem03.','.$imagem04;
			 
			   }		 
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET descricao='$descricao',titulo='$titulo',imagem='$imagem',data='$data' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o álbum '>"; }
	
		else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=aviso&txt=<b>Imagem não enviada!</b>  Álbum inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=sucesso&txt= Álbum editado com sucesso'>"; }
	
	} ?>

<? if($op == "ver"){ 

?>
			<ul class="breadcrumb bord" >
			<li><a href="?">Home</a> <span class="divider">/</span></li>
			<li><a href="?pag=gata"> Álbuns</a> <span class="divider">/</span></li>
			 <li><a href="?pag=gata&op=edit&id=<?php echo $id; ?>"> Editar Álbuns</a> <span class="divider">/</span></li>
			<li>Visualisar fotos</li>
			</ul>	
		<div class="well well-large">
		 
	<? 
	
	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);
	$dir = "../gata/".$reg['file']."/";


	$d = opendir($dir);
	$i = 0;
	 
	$nome = readdir($d);
	while( $nome != false ){
		if (substr($nome,-4) == ".jpg" || substr($nome,-4) == ".JPG" || substr($nome,-5) == ".jpeg" || substr($nome,-5) == ".JPEG") {
			$arquivos[$i] = $nome;
					$i++;
		}
		$nome = readdir($d);
	}
	sort($arquivos);
	 
	foreach($arquivos as $imagem){
	 
	?>
 		<div class="bord"  id='fotos' style="background:url(<?= $dir.'/thumb/'.$imagem; ?>);"> 		
		   <div id="sera-mostrada" >
		   		<div style="float:left; line-height:40px; width:170px; color:#FFFFFF; text-align:center ;  ">
					<?= substr($imagem,0,20) ;?>
				</div>
				<div style="float:right;  text-align:left;line-height:40px;">
			 <a  title="Excluir" href='?pag=gata&op=exc_foto&id=<?= $id; ?>&file=<?= $dir; ?>&img=<?= $imagem; ?>'><i class="icon-trash icon-white"></i> </a>
			 	</div>
		  </div>  		  
		</div>
			
	<? } ?>
	
	<div class="clearfix"></div>
	</div>
	
<? } ?>

	
<? if($op == "exc_foto"){ 


		if (file_exists($file.$img)) {		
			//deletando foto 
			unlink($file.$img) ;
			//deletando foto thumb 
 			 unlink($file.'/thumb/'.$img) ;
			
		 echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=ver&id=".$id."&msg=sucesso&txt=Foto excluída com sucesso'>";
		
		} else {
			echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&op=ver&id=".$id."&msg=erro&txt=A foto não foi encontrada'>"; }
	

}
?>



<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<ul class="breadcrumb bord" >
		  <li><a href="?">Home</a> <span class="divider">/</span></li>
		  <li><a href="?pag=gata"> Álbuns</a> <span class="divider">/</span></li>
		  <li>Excluir fotos</li>
		  </ul>	
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir  Álbum</h4>
			<p>Tem certeza que deseja excluir este álbum? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=gata&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=gata">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=erro&txt=Ocorreu um erro ao excluir o álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=sucesso&txt= Álbum excluído com sucesso'>"; }
	
	
		}
}
?>

<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=erro&txt=Ocorreu um erro ao alterar o status do álbum'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=gata&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>
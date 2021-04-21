<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "submenu"; if($menu == "") $menu = 1;
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
      <li>Menu</li>
      </ul>
	  
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" style="color:#b94a48" >Selecione um menu</a>
    <ul class="nav">
		<li <?php if($menu == 1) echo "class='active'"; ?>><a href="?pag=submenu&menu=1">Secretarias</a></li>
		<li <?php if($menu == 2) echo "class='active'"; ?>><a href="?pag=submenu&menu=2">Fundacao e Autarquias </a></li>
		<li <?php if($menu == 3) echo "class='active'"; ?>><a href="?pag=submenu&menu=3">Departamentos</a></li>
		<li <?php if($menu == 4) echo "class='active'"; ?>><a href="?pag=submenu&menu=4">Projetos</a></li>
		<li <?php if($menu == 5) echo "class='active'"; ?>><a href="?pag=submenu&menu=5">Serviços</a></li>	  
    </ul>
  </div>
</div>

	
	<a href="?pag=<?= $pagina; ?>&op=add&menu=<?php echo $menu; ?>" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo submenu </a><br />
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
		 $sql = mysql_query("SELECT * FROM $pagina where menu = '$menu' ORDER BY titulo asc LIMIT $inicio, $qnt"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    
	 <th width="80">Data</th> 
    <th>Titulo do Submenu</th>
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'open'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'close'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>
    
   <td><?php echo substr($reg['data'],8,2).'/'.substr($reg['data'],5,2).'/'.substr($reg['data'],0,4); ?><br />

    </td> 
    		
    <td><?= $reg['titulo']; ?></td>	
	
    <td>
		<a href="?pag=submenu&op=edit&id=<?= $reg['id'];?>&menu=<?php echo $menu; ?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=submenu&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>&menu=<?php echo $menu; ?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a class="btn disabled" rel="tooltip"  title="Você não tem permissão" ><i class="icon-trash"></i></a></td>
  </tr>
	<?php } ?>

</table>
		<?
			
		// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
		// para pegarmos o n&uacute;mero total de registros
		$sql_select_all = "SELECT * FROM $pagina where menu = '$menu'";
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
		
		echo "<li ><a href='?pag=$pagina&menu=$menu&p=1'>«</a></li>";
		// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
		for($i = $p-$max_links; $i <= $p-1; $i++) {
		// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
		// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
		if($i <=0) {
		//faz nada
		// Se estiver tudo OK, cria o link para outra p&aacute;gina
		} else {
		echo "<li><a href='?pag=$pagina&menu=$menu&p=".$i."'>".$i."</a></li>";
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
		echo "<li><a href='?pag=$pagina&menu=$menu&p=".$i."'>".$i."</a></li>";
		}
		}
		// Exibe o link "&uacute;ltima p&aacute;gina"
		echo "<li ><a href='?pag=$pagina&menu=$menu&p=".$pags."'>»</a></li>";
		
		echo"</ul></div>";

 } ?>

<? if($op == "add"){ 

 $data = date('d/m/Y');
 $hora = date('H:i:s');

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=submenu">Menu</a> <span class="divider">/</span></li>
      <li>Adicionar Menu</li>
      </ul>
	  
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" style="color:#b94a48" >Selecione um menu</a>
    <ul class="nav">
		<li <?php if($menu == 1) echo "class='active'"; ?>><a href="?pag=submenu&menu=1">Secretarias</a></li>
		<li <?php if($menu == 2) echo "class='active'"; ?>><a href="?pag=submenu&menu=2">Administração Indireta</a></li>
		<li <?php if($menu == 3) echo "class='active'"; ?>><a href="?pag=submenu&menu=3">Projetos</a></li>
		<li <?php if($menu == 4) echo "class='active'"; ?>><a href="?pag=submenu&menu=4">Serviços</a></li>
		<li <?php if($menu == 5) echo "class='active'"; ?>><a href="?pag=submenu&menu=5">Cidades em ação</a></li>	  
    </ul>
  </div>
</div>

<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=submenu&op=add_now&menu=<?php echo $menu; ?>">

	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data do Cadastro</label>
		<div class="controls controls-row">		
		  <input name="data" type="text" readonly="" class="input-small" id="datepicker2" value="<?= $data; ?>" placeholder="00/00/0000"> 		 
		</div>				
	</div>

  <div class="control-group ">
    <label class="control-label" for="fileInput">Título do menu</label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-xlarge" id="titulo" maxlength="25" placeholder="Adicione um titulo com até 25 caracteres">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira uma título</span>
    </div>
  </div>    
  <div class="control-group ">
    <label class="control-label" for="fileInput">Texto do menu</label>
    <div class="controls" >
	<span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira um texto sobre este menu</span>
      <textarea name="texto" style="width: 600px; height: 350px;" id="textarea"></textarea>
      </div>
  </div>  
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn"  onclick="return validaMenu()">Salvar</button>
    </div>
  </div>
</form>

 

<? } ?>


<? if($op == "add_now"){ 
	
	$slug = titulo($_POST['titulo'], '-');
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
	 if($titulo == "" || $texto == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&op=add&menu=$menu&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
		
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
					

	
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			
			
	$sql= mysql_query("INSERT INTO $pagina (titulo, data, texto,slug,menu, status )values('$titulo','$data','$texto','$slug','$menu','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&op=add&menu=$menu&msg=erro&txt=Ocorreu um erro ao inserir o menu  '>"; }
	
		//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&msg=aviso&txt=<b>Imagem não enviada!</b> Menu inserido com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&menu=$menu&msg=sucesso&txt=Menu inserido com sucesso'>"; }
	
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
	  <li><a href="?pag=submenu">Menu</a> <span class="divider">/</span></li>
      <li>Editar Menu</li>
      </ul>
	  
<div class="navbar">
  <div class="navbar-inner">
    <a class="brand" style="color:#b94a48" >Selecione um menu</a>
    <ul class="nav">
		<li <?php if($menu == 1) echo "class='active'"; ?>><a href="?pag=submenu&menu=1">Secretarias</a></li>
		<li <?php if($menu == 2) echo "class='active'"; ?>><a href="?pag=submenu&menu=2">Administração Indireta</a></li>
		<li <?php if($menu == 3) echo "class='active'"; ?>><a href="?pag=submenu&menu=3">Projetos</a></li>
		<li <?php if($menu == 4) echo "class='active'"; ?>><a href="?pag=submenu&menu=4">Serviços</a></li>
		<li <?php if($menu == 5) echo "class='active'"; ?>><a href="?pag=submenu&menu=5">Cidades em ação</a></li>	  
    </ul>
  </div>
</div>
	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=submenu&op=edit_now&id=<?= $id; ?>&menu=<?php echo $menu; ?>">


	<div class="control-group " >
  	  <label class="control-label" for="fileInput">Data do Cadastro</label>
		<div class="controls controls-row">		
		  <input name="data" type="text" readonly="" class="input-small" id="datepicker2" value="<?= $data; ?>" placeholder="00/00/0000"> 		 
		</div>				
	</div>

<div class="control-group ">
    <label class="control-label" for="fileInput">Título do menu</label>
    <div class="controls" >
	      <input name="titulo" value="<?php echo $reg['titulo']; ?>" type="text" class="input-xlarge" id="titulo" maxlength="25" placeholder="Adicione um titulo com até 25 caracteres">
		  <span id="erro1" class="label label-important" style=" visibility:hidden;">* Insira uma título</span>
    </div>
  </div>    
  <div class="control-group ">
    <label class="control-label" for="fileInput">Texto do menu</label>
    <div class="controls" >
	<span id="erro2" class="label label-important" style=" visibility:hidden;">* Insira um texto sobre este menu</span>
      <textarea name="texto" style="width: 600px; height: 350px;" id="textarea"><?php echo stripslashes($reg['texto']); ?></textarea>
      </div>
  </div>  
  
   
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn"  onclick="return validaMenu()">Salvar</button>
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$slug = titulo($_POST['titulo'], '-');
	$titulo = addslashes($_POST['titulo']);
	$texto = addslashes($_POST['texto']);
	$hora = $_POST['hora'];
	$data = $_POST['data'];
	
	//testando campos do destaque  /*
	if($titulo == "" || $texto == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&op=edit&id=$id&menu=$menu&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }	
	
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
					

					
				
				
			//deletando foto risco de ser grande e pesada
 			 unlink('../uploads/'.$imagem) ;
			 
			 }   }
			 
			 //resgatando imagem
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $imagem =  $reg['imagem']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET titulo='$titulo',texto='$texto',data='$data',menu='$menu',slug='$slug' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&op=edit&id=$id&menu=$menu&msg=erro&txt=Ocorreu um erro ao editar o menu '>"; }
	
	//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&msg=aviso&txt=<b>Imagem não enviada!</b> Menu editado com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&menu=$menu&msg=sucesso&txt=Menu editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Menu</h4>
			<p>Tem certeza que deseja excluir este menu? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=submenu&op=exc&id=<?= $id;?>&menu=<?php echo $menu; ?>&msg=exc">Sim</a> <a class="btn" href="?pag=submenu&menu=<?php echo $menu; ?>">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&menu=$menu&msg=erro&txt=Ocorreu um erro ao excluir o menu'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=submenu&menu=$menu&msg=sucesso&txt=Menu excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&menu=$menu&msg=erro&txt=Ocorreu um erro ao alterar o status do menu'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&menu=$menu&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
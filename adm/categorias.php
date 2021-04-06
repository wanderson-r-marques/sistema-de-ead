<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "categorias";

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

<script>

	 	  function validaCategoria(){
    
			 
         if (document.getElementById("titulo").value==""  ) {
            
		document.getElementById("campo1").className = "control-group error";
		document.getElementById("erro1").innerHTML = "Insira uma Categoria";
					
				 return(false);			 
		 

				 
		}<?php $sql = mysql_query("SELECT titulo FROM categorias");	while($reg = mysql_fetch_array($sql)){ 
		?>else if(document.getElementById("titulo").value=="<?= $reg['titulo'];?>" ){
		
		document.getElementById("campo1").className = "control-group info";
		document.getElementById("erro1").innerHTML = "Categoria já existe!";
					
				 return(false);				 
				 
 		}<? }?>else{
		
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
		
	           
		   		 return(true);
        } 
	 }
	 
	 </script>

<? if($op == ""){ ?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Categoria</li>
      </ul>

<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar nova categoria  </a><br /><br />

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
		 $sql = mysql_query("SELECT * FROM $pagina order by titulo asc  LIMIT $inicio, $qnt"); 		 
			
	?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th  >Nome da Categoria</th>
    
    <th width="140">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ 
			if($reg['status'] == 'sim'){ $icon = 'close'; $title = 'Ocultar'; $status = 'nao'; }
			 else{ $icon = 'open'; $title = 'Exibir'; $status = 'sim'; }	
	?>   
  <tr>   		
    <td><?= $reg['titulo']; ?></td>
    
     
    	
    <td>
		<a href="?pag=categorias&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		<a href="?pag=categorias&op=sta&id=<?= $reg['id'];?>&status=<?= $status;?>" class="btn" title="<?= $title; ?>" ><i class="icon-eye-<?= $icon; ?>"></i></a>
		<a href="?pag=categorias&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a>	</td>
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
		echo "<li ><a href='?pag=$pagina&p=1'>»</a></li>";
		
		echo"</ul></div>";

 } ?>

<? if($op == "add"){ 

 $data = date('d/m/Y');
 $hora = date('H:i:s');

?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=categorias">Categoria</a> <span class="divider">/</span></li>
      <li>Adicionar Categoria</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=categorias&op=add_now" onclick="return validaCategoria()">
       

  <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome da Categoria</label>
    <div class="controls" >
	      <input name="titulo" value="" type="text" class="input-large" id="titulo"  placeholder="Adicione um categorias">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  


  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" >Salvar</button>      
    </div>
  </div>
</form>

 

<? } ?>


<? if($op == "add_now"){ 

	
	$titulo = $_POST['titulo'];
	$lista = $_POST['lista'];
	$local = $_POST['local'];	
	$data = $_POST['data']; 
	
		//testando campos da Categoria 
	 if($titulo == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	 
	 	//testando usuario existentes
	$sql = mysql_query("SELECT * FROM $pagina where titulo = '$titulo'"); 
	if(mysql_num_rows($sql)==1) { echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Esta categoria já existe'>";  die(); }
	
		
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
			
		
	$sql= mysql_query("INSERT INTO $pagina (titulo, status )values('$titulo','sim')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&op=add&msg=erro&txt=Ocorreu um erro ao inserir a Categoria  '>"; }
	
	/*	else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=aviso&txt=<b>Imagem não enviada!</b> Categoria inserida com sucesso'>"; }*/
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=sucesso&txt=Categoria inserida com sucesso'>"; }
	
	} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);
	
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=categorias">Categoria</a> <span class="divider">/</span></li>
      <li>Editar Categoria</li>
      </ul>

	
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=categorias&op=edit_now&id=<?= $id; ?>" onclick="return validaCategoria()">

	
  <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome da Categoria</label>
    <div class="controls" >
	      <input name="titulo" value="<?php echo $reg['titulo']; ?>" type="text" class="input-large" id="titulo"  placeholder="Adicione um categorias">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div>
  
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" >Salvar</button>      
    </div>
  </div>
</form>


	
	<? }  ?>

<? if($op == "edit_now"){ 

	$titulo = $_POST['titulo'];
	$lista = $_POST['lista'];
	$local = $_POST['local'];	
	$data = $_POST['data']; 
	
		//testando campos da Categoria 
	 if($titulo == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }
	
	
							
	$sql= mysql_query("UPDATE $pagina SET titulo='$titulo' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar a Categoria '>"; }
	
/*		else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=aviso&txt=<b>Imagem não enviada!</b> Categoria inserida com sucesso'>"; }
*/			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=sucesso&txt=Categoria editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Categoria</h4>
			<p>Tem certeza que deseja excluir este Categoria? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=categorias&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=categorias">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=erro&txt=Ocorreu um erro ao excluir a Categoria'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=categorias&msg=sucesso&txt=Categoria excluído com sucesso'>"; }
	
	
		}
}
?>
<? if($op == "sta"){ 		
	 
	
	$sql= mysql_query("UPDATE $pagina SET status='$status' WHERE id = '$id' ") ;
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=erro&txt=Ocorreu um erro ao alterar o status da Categoria'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL= ?pag=$pagina&msg=sucesso&txt=Status aletrado com sucesso'>"; }
	
	
		}

?>		
<?php $pagina = "usuarios";

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
      <li>Usuários</li>
      </ul>
				
		
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
			
	//Verificando o nivel do usuario logado
	if ($nivel_atual == 1){
	
	?>
	
	
	
<a href="?pag=<?= $pagina; ?>&op=add" class="btn btn-primary" ><i class="icon-plus icon-white"></i> Adicionar novo usuário </a><br /><br /> 

	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead><tr>
    <th>Nível do Usuário</th>
    <th>Nome do Usuário</th>
    <th width="100">A&ccedil;&atilde;o</th>
  </tr></thead> 
	<?php while($reg = mysql_fetch_array($sql)){ ?>  
  <tr>
    <td  width="120">
		<? if ($reg['nivel'] == '1') {echo 'Master';}else{echo 'Simples';} ?>  </td>
    <td><?= $reg['nome']; ?></td>
    <td>
		<a href="?pag=usuarios&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>
		
		<? if ($reg['username'] == $login_atual) {?>
		<a class="btn disabled" rel="tooltip"  title="Você não pode ser excluido" ><i class="icon-trash"></i></a>	
		<? }else { ?><a href="?pag=<?= $pagina;?>&op=exc&id=<?= $reg['id'];?>" class="btn" title="Excluir" ><i class="icon-trash"></i></a><? }?>
		</td>
  </tr>
	<?php } ?>

</table>  
			<!--Se nivel atual for igual a 0 -->
		<? }else{ ?>
	
<a  class="btn btn-primary disabled" rel="tooltip" title="Você não tem permissão" ><i class="icon-plus icon-white"></i> Adicionar novo usuário </a><br /><br />
	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
 <thead>
    <td>Nível do Usuário</td>
    <td>Nome do Usuário</td>
    <td width="100">A&ccedil;&atilde;o</td>
  </thead> 
	<?php while($reg = mysql_fetch_array($sql)){ ?>  
  <tr>
    <td  width="120">
		<? if ($reg['nivel'] == '1') {echo 'Master';}else{echo 'Simples';} ?>  </td>
    <td><?= $reg['nome']; ?></td>
    <td>
		<? if ($reg['username'] == $login_atual) {?>
		<a href="?pag=usuarios&op=edit&id=<?= $reg['id'];?>" class="btn" title="Editar" ><i class="icon-pencil"></i></a>	
		<? }else { ?>
		<a  class="btn disabled" rel="tooltip" title="Você não tem permissão" ><i class="icon-pencil"></i></a>
		<?php } ?>
		<a class="btn disabled" rel="tooltip"  title="Você não tem permissão" ><i class="icon-trash"></i></a>	
	
		</td>
  </tr>
	<?php } ?>

</table>  		
		<?php } ?>
		
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
<script>

	 	  function validaUsuario(){
    
			 
         if (document.getElementById("nome").value==""  ) {
            
		document.getElementById("campo1").className = "control-group error";
		document.getElementById("erro1").innerHTML = "Insira seu Nome";
					
				 return(false);
				 
		 
        }else if(document.getElementById("email").value=="" ){
			
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
			
		document.getElementById("campo2").className = "control-group error";
		document.getElementById("erro2").innerHTML = "Insira seu email";
					
				 return(false);
        		
		
		}else if(document.getElementById("email").value.match(/(\w+)@(.+)\.(\w+)$/) == null){
		
		
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
			
		document.getElementById("campo2").className = "control-group error";
		document.getElementById("erro2").innerHTML = "Email parece inválido";
					
				 return(false);
				 
				 
		}else if(document.getElementById("login").value=="" ){
			
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			
		document.getElementById("campo3").className = "control-group error";
		document.getElementById("erro3").innerHTML = "Insira um apelido";
					
				 return(false);		
				 
				 
		}else if(document.getElementById("login").value.length < 4 ){
			
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			
		document.getElementById("campo3").className = "control-group error";
		document.getElementById("erro3").innerHTML = "É necessário pelo menos 4 caracteres";
					
				 return(false);		
				 
		}<?php $sql = mysql_query("SELECT username FROM usuarios");	while($reg = mysql_fetch_array($sql)){ 
		?>else if(document.getElementById("login").value=="<?= $reg['username'];?>" ){
	
			
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			
		document.getElementById("campo3").className = "control-group info";
		document.getElementById("erro3").innerHTML = "Usuário já existe!";
					
				 return(false);				 
				 
 		}<? }?>else if(document.getElementById("senha").value=="" ){
			
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";	
			
		document.getElementById("campo4").className = "control-group error";
		document.getElementById("erro4").innerHTML = "Insira uma senha";
					
				 return(false);	
				 
 		}else if(document.getElementById("senha").value.length < 4  ){
			
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";	
			
		document.getElementById("campo4").className = "control-group error";
		document.getElementById("erro4").innerHTML = "É necessário pelo menos 4 caracteres";
					
				 return(false);		 
       
		}else{
		
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
		
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";
		
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";
		
		document.getElementById("campo4").className = "control-group";
		document.getElementById("erro4").innerHTML = "";		
	           
		   		 return(true);
        } 
	 }
	 
	 </script>



	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=usuarios">Usuários</a> <span class="divider">/</span></li>
      <li>Adicionar Usuário</li>
      </ul>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=usuarios&op=add_now" onclick="return validaUsuario()">

   <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome do Usuário</label>
    <div class="controls" >
	      <input name="nome" value="" type="text" class="input-xlarge" id="nome" maxlength="50" placeholder="Adicione seu nome">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div> 
  
    <div id="campo2"  class="control-group ">
    <label class="control-label" for="fileInput">Email do Usuário</label>
    <div class="controls" >
	      <input name="email" value="" type="text" class="input-xlarge" id="email" maxlength="50" placeholder="Ex. email@email.com">
		  <span id="erro2" class="help-inline"></span>
    </div>
  </div> 

  
      <div id="campo3"  class="control-group ">
    <label class="control-label" for="fileInput">Login do Usuário</label>
    <div class="controls" >
	      <input name="login" value="" type="text" class="input-large" id="login" maxlength="20" placeholder="Adicione um login">
		  <span id="erro3" class="help-inline"></span>
    </div>
  </div> 
  
      <div id="campo4"  class="control-group ">
    <label class="control-label" for="fileInput">Senha do Usuário</label>
    <div class="controls" >
	      <input name="senha" value="" type="password" class="input-large" id="senha" maxlength="20" placeholder="Adicione uma senha">
		  <span id="erro4" class="help-inline"></span>
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

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	
	
	//testando campos da noticia
		if($nome == "" || $email == "" || $login == "" || $senha == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>"; die(); }
	
	//testando usuario existentes
	$sql = mysql_query("SELECT * FROM $pagina where username = '$login'"); 
	if(mysql_num_rows($sql)==1) { echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Este usuário já existe'>";  die(); }
		
	//criptografando dados		
	$senha	 = md5(md5($senha).sitei('chave'));		
			
	$sql= mysql_query("INSERT INTO $pagina (nome,email, username, senha,nivel)values('$nome','$email','$login','$senha','0')") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&op=add&msg=erro&txt=Ocorreu um erro ao inserir o usuário'>"; }
	
		//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=aviso&txt=<b>Imagem não enviada!</b> Usuário inserida com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=sucesso&txt=Usuário inserida com sucesso'>"; }
	
	} ?>


<? if($op == "edit"){ 

	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");
	$reg = mysql_fetch_array($sql);

		
?>

	  <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
	  <li><a href="?pag=usuarios">Usuarios</a> <span class="divider">/</span></li>
      <li>Editar Usuário</li>
      </ul>

 
<script>

	 	  function validaUsuario(){
    
			 
         if (document.getElementById("nome").value==""  ) {
            
		document.getElementById("campo1").className = "control-group error";
		document.getElementById("erro1").innerHTML = "Insira seu Nome";
					
				 return(false);
				 
		 
        }else if(document.getElementById("email").value=="" ){
			
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
			
		document.getElementById("campo2").className = "control-group error";
		document.getElementById("erro2").innerHTML = "Insira seu email";
					
				 return(false);
        		
		
		}else if(document.getElementById("email").value.match(/(\w+)@(.+)\.(\w+)$/) == null){
		
		
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
			
		document.getElementById("campo2").className = "control-group error";
		document.getElementById("erro2").innerHTML = "Email parece inválido";
					
				 return(false);
				 
				 
		}else if(document.getElementById("login").value=="" ){
			
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			
		document.getElementById("campo3").className = "control-group error";
		document.getElementById("erro3").innerHTML = "Insira um apelido";
					
				 return(false);		
				 
				 
		}else if(document.getElementById("login").value.length < 4 ){
			
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";	
			
		document.getElementById("campo3").className = "control-group error";
		document.getElementById("erro3").innerHTML = "É necessário pelo menos 4 caracteres";
					
				 return(false);		
				 
		}else if(document.getElementById("senha").value=="" ){
			
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";	
			
		document.getElementById("campo4").className = "control-group error";
		document.getElementById("erro4").innerHTML = "Insira uma senha";
					
				 return(false);	
				 
 		}else if(document.getElementById("senha").value.length < 4  ){
			
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";	
			
		document.getElementById("campo4").className = "control-group error";
		document.getElementById("erro4").innerHTML = "É necessário pelo menos 4 caracteres";
					
				 return(false);		 
       
		}else{
		
		document.getElementById("campo1").className = "control-group";
		document.getElementById("erro1").innerHTML = "";	
		
		document.getElementById("campo2").className = "control-group";
		document.getElementById("erro2").innerHTML = "";
		
		document.getElementById("campo3").className = "control-group";
		document.getElementById("erro3").innerHTML = "";
		
		document.getElementById("campo4").className = "control-group";
		document.getElementById("erro4").innerHTML = "";		
	           
		   		 return(true);
        } 
	 }
	 
	 </script>


<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=usuarios&op=edit_now&id=<?= $id;?>" onclick="return validaUsuario()">

   <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Nome do Usuário</label>
    <div class="controls" >
	      <input name="nome" value="<?= $reg['nome'];?>" type="text" class="input-xlarge" id="nome" maxlength="50" placeholder="Adicione seu nome">
		  <span id="erro1" class="help-inline"></span>
    </div>
  </div> 
  
    <div id="campo2"  class="control-group ">
    <label class="control-label" for="fileInput">Email do Usuário</label>
    <div class="controls" >
	      <input name="email" value="<?= $reg['email'];?>" type="text" class="input-xlarge" id="email" maxlength="50" placeholder="Ex. email@email.com">
		  <span id="erro2" class="help-inline"></span>
    </div>
  </div> 

  
      <div id="campo3"  class="control-group ">
    <label class="control-label" for="fileInput">Login do Usuário</label>
    <div class="controls" >
	      <input name="login" value="<?= $reg['username'];?>"  type="text" class="input-large" id="login" maxlength="20" placeholder="Adicione um login">
		  <span id="erro3" class="help-inline"></span>
    </div>
  </div> 
  
      <div id="campo4"  class="control-group ">
    <label class="control-label" for="fileInput">Senha do Usuário</label>
    <div class="controls" >
	      <input name="senha" value="" type="password" class="input-large" id="senha" maxlength="20" placeholder="Adicione uma senha">
		  <span id="erro4" class="help-inline"></span>
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

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$login = $_POST['login'];
	
	
	//testando campos da noticia
		if($nome == "" || $email == "" || $senha == "" || $login == "" ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&op=add&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>"; die(); }

		//criptografando dados		
	$senha	 = md5(md5($senha).sitei('chave'));	
					
	$sql= mysql_query("UPDATE $pagina SET nome='$nome',email='$email',username='$login',senha='$senha' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&op=edit&id=$id&msg=erro&txt=Ocorreu um erro ao editar o usuário'>"; }
	
	//else if($imagem == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=aviso&txt=<b>Imagem não enviada!</b> Usuário inserida com sucesso'>"; }
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=sucesso&txt=Usuário editado com sucesso'>"; }
	
	} ?>


<? if($op == "exc"){ 			

	
	if($msg != "exc"){ ?>
	
			<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<h4 class="alert-heading">Excluir Usuário</h4>
			<p>Tem certeza que deseja excluir este usuário? Esta operação não pode ser desfeita.</p>
			<p>
			<a class="btn btn-danger" href="?pag=usuarios&op=exc&id=<?= $id;?>&msg=exc">Sim</a> <a class="btn" href="?pag=usuarios">Não</a>
			</p>
			</div>
						<? }
	
	else{ $sql = mysql_query("DELETE FROM $pagina where id='$id' LIMIT 1"); 
	
		if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=erro&txt=Ocorreu um erro ao excluir o usuário'>"; }
	
		else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=usuarios&msg=sucesso&txt=Usuário excluído com sucesso'>"; }
	
	
		}
}
?>
			

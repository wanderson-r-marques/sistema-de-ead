<?php require_once("includes/verifica.php"); $pagina = "publicidade";

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
<script>  
			$(document).on('mouseenter','[rel=tooltip]', function(){
			$(this).tooltip('show');
				});
				
							
   </script>
<style>
	#pencil {
		position:absolute; 
		margin:5px 5px;
		width:90px;
		z-index:10;
		}
	</style>
	
	
<? if($op == ""){ ?>
<?php

    $width = array( "360", "360", "940", "380","","","","","","","940","940","940","460","460","540","","","","","420","420","420","420","420","420","420","420","420","940");
    $height = array("160" , "160", "110", "90" ,"","","","","","","110","120","120","100","100","100","","","","","350","350","350","350","350","350","350","350","350","110");  

	
	$i = 0;	
	$sql = mysql_query("SELECT * FROM $pagina order by id"); while($reg = mysql_fetch_array($sql)){ $arquivo[$i] = $reg['arquivo']; $id[$i] =  $reg['id']; $i++; }
	$i = 0;	
	//navegação recuperada apos submits no form
	switch ($nav){	
	case '' : $classe1 = 'active'; break;
	case 1 : $classe1 = 'active'; break;
	case 2 : $classe2 = 'active'; break;
	case 3 : $classe3 = 'active'; break;
	case 4 : $classe4 = 'active'; break;
	case 5 : $classe5 = 'active'; break;
	case 6 : $classe6 = 'active'; break;
	}

	
?>
<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li>Publicidade</li>
 
</ul>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="<?php echo $classe1; ?>"><a href="#tab1" data-toggle="tab">Página Inicial</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane <?php echo $classe1; ?>" id="tab1"><?php $nav = '1'?>
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">

       
	   <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i = 0;	 $i++;  ?>
		</td>
       
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++;  ?>
		</td>
       </tr> 
	   
         


		
      </table> 
    </div>
	<div class="tab-pane <?php echo $classe2; ?>" id="tab2"><?php $nav = '2'?><?php $i = 10;?>
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">        
     	<tr>
          <td>
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 

	   <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	   <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	    <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px;  float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
			
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px;  float: right;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>		
       </tr> 
	    <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px;  float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 

      <tr>
       	<td><h4><div align="center">Banners para celular</div></h4></td>
       </tr>

       <?php $i = 23;  ?>
	   <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	   <tr>
          <td>
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	   <tr>
          <td>
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px;  float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
        </td>
       </tr> 
	   <tr>
          <td>		
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left; ">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	   <tr>
          <td>
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px; float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
		</td>
       </tr> 
	   <tr>
          <td>
		<div style="width:<?= $width[$i]; ?>px; height:<?= $height[$i]; ?>px;  float: left;">
        <div id="pencil" > <a href="?pag=publicidade&op=edit&id=<?= $id[$i]; ?>&w=<?= $width[$i]; ?>&h=<?= $height[$i]; ?>&nav=<?= $nav; ?>" rel="tooltip"  class="btn" title="Trocar anúncio" ><i class="icon-pencil"></i></a></div>
		<img src="../banners/<?= $arquivo[$i]; ?>" width="<?= $width[$i]; ?>" height="<?= $height[$i]; ?>">        
        </div><?php $i++; ?>
        </td>
       </tr> 



      </table> 
    </div>

	<div class="tab-pane <?php echo $classe3; ?>" id="tab3"><?php $nav = '3'?><?php $i = 10;?>
     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">        
	   <tr>
          <td >		
		<iframe style="margin:-207.5px 0 0 70px;" width="960" height='1100' frameborder='0'   src='http://gifmaker.me/' scrolling="no" ></iframe>
		</td>
       </tr> 
		
      </table> 
    </div>
	
	
  </div>
</div>




<?	
 } ?>
<? if($op == "edit"){ 

	$w = $_GET['w']; $h = $_GET['h'];
	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'"); $reg = mysql_fetch_array($sql); 

?>
<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li><a href="?pag=publicidade">Banners</a> <span class="divider">/</span></li>
  <li>Editar Banners</li>
</ul>
<form name="formulario" class="form-horizontal form"  method="post" enctype="multipart/form-data" action="?pag=publicidade&op=edit_now&id=<?= $id; ?>&nav=<?= $nav; ?>&w=<?= $w; ?>&h=<?= $h; ?>" onclick="return validaNoticia()">
<div  class="control-group ">
    <label class="control-label" for="fileInput">Tamanho exato</label>
    <div class="controls" >
   	<span class="label label-info "><?php echo $w.' X '.$h; ?></span>
    </div>
  </div>
  <div id="campo1"  class="control-group ">
    <label class="control-label" for="fileInput">Link do banner</label>
    <div class="controls" >
      <input name="url" value="<?= $reg['url']; ?>" type="text" class="input-xxlarge" id="url" placeholder="Para desativar este link deixe o campo em branco">
      <span id="erro1" class="help-inline"></span> </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="fileInput">Arquivo </label>
    <div class="controls">
      <input class="input-file" id="fileInput" name="arquivo" type="file">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Salvar</button>
    </div>
  </div>
</form>
<? }  ?>
<? if($op == "edit_now"){  

	$url = $_POST['url'];
		
	//testando campos da noticia
	/*	if($arquivo == ""  ){ echo "<meta http-equiv='refresh' content='0;URL=?pag=publicidade&op=edit&id=$id&msg=erro&txt=<strong>Ocorreu um erro!</strong> Campos obrigatórios não foram preenchidos'>";  die(); }*/	
	
		$d = substr($data,0,2);
		$m = substr($data,3,2);
		$y = substr($data,6,4);
	    $data=$y.$m.$d;
		
		$d = substr($hora,0,2);
		$m = substr($hora,3,2);
		$y = substr($hora,6,2);
		$hora=$d.$m.$y;
		
		$arquivo = $_FILES['arquivo']['tmp_name'];
		$arquivo_name = str_replace(" ", "",microtime()).".".strtolower(end(explode(".", $_FILES['arquivo']['name'])));
		
		if($arquivo != ""){  

			if (copy($arquivo,"../banners/".$arquivo_name))	{ 		    

						$arquivo = "../banners/".$arquivo_name;
						
						$tam = getimagesize( $arquivo);
						$w = $_GET['w']; $h = $_GET['h'];

						$arquivo = $arquivo_name;
					 
			 }   }
			 
			 //resgatando arquivo
			 else {	$sql = mysql_query("SELECT * FROM $pagina where id = '$id'");	$reg = mysql_fetch_array($sql); $arquivo =  $reg['arquivo']; }
			
						
	$sql= mysql_query("UPDATE $pagina SET url='$url',arquivo='$arquivo' WHERE id = '$id' ") ;
	
	if(!$sql){  echo "<meta http-equiv='refresh' content='0;URL=?pag=publicidade&op=edit&id=$id&nav=$nav&msg=erro&txt=Ocorreu um erro ao cadastrar o banner'>"; }
	
		else if($arquivo == ""){  echo "<meta http-equiv='refresh' content='0;URL=?pag=publicidade&nav=$nav&msg=aviso&txt=<b>Nenhum arquivo enviado!</b> Alterado com sucesso'>"; }
		
	else if($tam[0] > $w || $tam[1] > $h){  echo "<meta http-equiv='refresh' content='0;URL=?pag=publicidade&nav=$nav&msg=aviso&txt=<b>Imagem muito grande!</b> A imagem pode causar mau carregamento da página!'>"; }	
		
			
			else{  echo "<meta http-equiv='refresh' content='0;URL=?pag=publicidade&nav=$nav&msg=sucesso&txt=Banner cadastrado com sucesso'>"; }
	
	} ?>

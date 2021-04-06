<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "espaco";
		
?>

<ul class="breadcrumb bord" >
  <li><a href="?">Home</a> <span class="divider">/</span></li>
  <li>Uso em disco</li>
</ul>
<?php 	//nome do dominio
		//$dominio = 'portalpe10.com.br';
		//espaco total da hospedagem
		$espacoTotal = 1000;
		//Quantidade de emails
		//$quantEmail = 1;
		//espaco reservado para cada email
		//$espacoEmail = array(250); 
		//nome reservado para cada email
		//$nomeEmail = array('contato');	
		
		
		?>
<fieldset>
<legend>Tamanho total <?php echo $espacoTotal; ?> MB</legend>
</fieldset>
<div class="control-group">
  <div >As barras no gráfico representam números de uso de disco:</div>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table table-hover">
 
  <?php $espacoSite = $espacoTotal - $espacoEmailTotal;	
  		//funcao recursiva
		disco('../');
		//funcao calcula
   		discoCalcula($espacoTotal,$tamanho_total);//path da sua pasta
   		$totalMb =  $tamanho_total ;  
  ?>
  <tr>
    <td>Espaço ocupado pelo site</td>
    <td width="600"><div class="progress progress-<?php echo $status; ?> progress-striped active" >
        <div class="bar" style="width:<?php echo $percentual; ?>"><?php echo $percentual; ?></div>
      </div></td>
    <td><div class="pull-right"><?php echo $totalMb.' | '.$espacoSite.' MB'; ?></div></td>
  </tr>
</table>

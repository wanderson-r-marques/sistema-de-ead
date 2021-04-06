<?php 	require_once("includes/config.php");
		require_once("includes/verifica.php");
		
		$pagina = "acessos";
?>

	 <ul class="breadcrumb bord" >
      <li><a href="?">Home</a> <span class="divider">/</span></li>
      <li>Acessos</li>
      </ul>
			
			<?php $anoInicio = '2013'; $anoAtual = date('Y'); $mesAtual = date('m'); $anoSelect = ""; $mesSelect = "" ; $i = 0; 
			
			$mesSelect = $_POST['mes'];
			$anoSelect = $_POST['ano'];
			
			//se selecionando
			if($anoSelect == ""){ $anoSelect = $anoAtual; }
			
			if($mesSelect == ""){ $mesSelect = $mesAtual; }			
				
				
			
			//pegando nome do mes selecionado
		switch ($mesSelect) {
        case "1":    $nomeMes = 'Janeiro';  break;
		case "2":    $nomeMes = 'Fevereiro';  break;
        case "3":    $nomeMes = 'Março';  break;
        case "4":    $nomeMes = 'Abril';  break;
        case "5":    $nomeMes = 'Maio';  break;
        case "6":    $nomeMes = 'Junho';  break;
        case "7":    $nomeMes = 'Julho';  break;
        case "8":    $nomeMes = 'Agosto';  break;
        case "9":    $nomeMes = 'Setembro';  break;
        case "10":    $nomeMes = 'Outubro';  break;
        case "11":    $nomeMes = 'Novembro';  break;
        case "12":    $nomeMes = 'Dezembro';  break;
       	
						}
						
			//acesssos mensal e total anual
		$jan = $fev = $mar = $abr = $mai = $jun = $jul = $ago = $set = $out = $nov = $dez = $totalAno = 0;	
		$sql = mysql_query("SELECT * FROM acessos where y = '$anoSelect' "); 
		while($reg = mysql_fetch_array($sql)){
		
		switch ($reg['m']) {
        case "1":    $jan = $jan + $reg['contador'];  break;
        case "2":    $fev = $fev + $reg['contador'];  break;
		case "3":  	 $mar = $mar + $reg['contador'];  break;
		case "4":    $abr = $abr + $reg['contador'];  break;
        case "5":    $mai = $mai + $reg['contador'];  break;
        case "6":    $jun = $jun + $reg['contador'];  break;
        case "7":    $jul = $jul + $reg['contador'];  break;
        case "8":    $ago = $ago + $reg['contador'];  break;
        case "9":    $set = $set + $reg['contador'];  break;
        case "10":   $out = $out + $reg['contador'];  break;
        case "11":   $nov = $nov + $reg['contador'];  break;
        case "12":   $dez = $dez + $reg['contador'];  break;		
						}
		
			$totalAno = $totalAno + $reg['contador'];	 
		
		}	
		
		// Conhecendo um mes mais acessado
		$maxMes = 1; 		
		if($maxMes < $jan){ $maxMes = $jan; }
		if($maxMes < $fev){ $maxMes = $fev; }
		if($maxMes < $mar){ $maxMes = $mar; }
		if($maxMes < $abr){ $maxMes = $abr; }
		if($maxMes < $mai){ $maxMes = $mai; }
		if($maxMes < $jun){ $maxMes = $jun; }
		if($maxMes < $jul){ $maxMes = $jul; }
		if($maxMes < $ago){ $maxMes = $ago; }
		if($maxMes < $set){ $maxMes = $set; }
		if($maxMes < $out){ $maxMes = $out; }
		if($maxMes < $nov){ $maxMes = $nov; }
		if($maxMes < $dez){ $maxMes = $dez; }	
		
		
				//acesssos diario e total mensal
				
				//Contando os dia do mes selecionado
				$quantMes = date("d",mktime(0,0,0,($mesSelect+1),0,$anoSelect));				
				
				//Criando grafico dos dias
				 $i = 1; //$total = ""; 
					while($i<=$quantMes){ 
						$soma =  $i .','; 
						//$total = $total . $soma ;		
						$dias = $dias . '|' . $i;
						//criando array de dias						
						$dia[$i] = 0;						
						$i++; 
						
					} 
					
		//Selecionando os dias que receberam acessos e contabilizando-os			
		$totalMes = 0; $maxDia = 1;
		$sql = mysql_query("SELECT * FROM acessos where y = '$anoSelect' and m = '$mesSelect' "); 
		while($reg = mysql_fetch_array($sql)){
		
		//atrbindo dias
		$dia[$reg['d']] = $reg['contador'];
		//Valor total desse mes
		$totalMes = $totalMes + $reg['contador'];	
		//Dia mais acessado
		if($maxDia < $reg['contador']){ $maxDia = $reg['contador']; }
		}
			
			//Criando array de valores no grfico
				 $i = 1; while($i<=$quantMes){ 
				 			//round aceita 0
				 		$diaPer = round($dia[$i] * 100 / $maxDia);				 
				 		$soma =  $diaPer .',';
						$total = $total . $soma ;										
						$i++; 						
					} 
			
			
		?>
			
			
	<div class="well well-large">
				
	<form name="formulario" class="form-horizontal "  method="post" enctype="multipart/form-data" action="?pag=acessos" >

	<div class="control-group">                   
			Selecione o ano que deseja consultar&nbsp;&nbsp;
			        
		   <select name="mes" class="input-medium">
			  
                <option <? if($mesSelect == '1') { ?>selected="selected" <? }?>  value="1">Janeiro</option>
				 <option <? if($mesSelect == '2') { ?>selected="selected" <? }?>  value="2">Fevereiro</option>
                 <option <? if($mesSelect == '3') { ?>selected="selected" <? }?>  value="3">Março</option>
                 <option <? if($mesSelect == '4') { ?>selected="selected" <? }?>  value="4">Abril</option>
                 <option <? if($mesSelect == '5') { ?>selected="selected" <? }?>  value="5">Maio</option>
                 <option <? if($mesSelect == '6') { ?>selected="selected" <? }?>  value="6">Junho</option>
                 <option <? if($mesSelect == '7') { ?>selected="selected" <? }?>  value="7">Julho</option>
                 <option <? if($mesSelect == '8') { ?>selected="selected" <? }?>  value="8">Agosto</option>
                 <option <? if($mesSelect == '9') { ?>selected="selected" <? }?>  value="9">Setembro</option>
                 <option <? if($mesSelect == '10'){ ?>selected="selected" <? }?>  value="10">Outubro</option>
                 <option <? if($mesSelect == '11'){ ?>selected="selected" <? }?>  value="11">Novembro</option>
                 <option <? if($mesSelect == '12'){ ?>selected="selected" <? }?>  value="12">Dezembro</option> 
      </select>    
			  <select name="ano" class="input-small">
               <?php  while($anoInicio <= $anoAtual){ ?>
			    <option <? if($anoInicio == $anoSelect) { ?>selected="selected" <? }?>  value="<?= $anoInicio;?>" ><?= $anoInicio; ?></option>
				<? $anoInicio++; } ?>   
		   </select>  
			   <button class="btn " type="submit">Ok</button>      		   
    </div>	 
	</form>			
	
	
		
	<fieldset>
	 <legend>Histórico do mês de <?= $nomeMes;?></legend>	
	</fieldset>
	<img src="http://chart.apis.google.com/chart?cht=bvs&chxt=x,y&chd=t:<?= substr($total,0,-1);?>&chco=76A4FB&chs=890x300&chxl=0:<?= $dias;?>" />

	<br />
	<br />
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
	 <thead>
	  <td>Dia</td>
		<td>Número de visitas</td>		
	  </thead> 
		<?php $i = 1; while($i<=$quantMes){	 		  						
		 ?><tr>
		<td >Dia <?= $i; ?></td><td ><?= $dia[$i]; ?> acessos</td>	
	 	</tr>
		<?php $i++;  } ?>	
	</table>
	<div class="pull-right">
		<strong>Total de acessos: <?= $totalMes; ?></strong>
		</div>	
		<br />
		<br />
		<legend></legend>
		<br />
		<fieldset>
		<legend>Histórico Anual - <?= $anoSelect;?></legend>
		</fieldset>
		
	<img src="http://chart.apis.google.com/chart?cht=bvs&chxt=x,y&chd=t:<?= round($jan * 100 / $maxMes)?>,<?= round($fev * 100 / $maxMes)?>,<?= round($mar * 100 / $maxMes)?>,<?= round($abr * 100 / $maxMes)?>,<?= round($mai * 100 / $maxMes)?>,<?= round($jun * 100 / $maxMes)?>,<?= round($jul * 100 / $maxMes)?>,<?= round($ago * 100 / $maxMes)?>,<?= round($set * 100 / $maxMes)?>,<?= round($out * 100 / $maxMes)?>,<?= round($nov * 100 / $maxMes)?>,<?= round($dez * 100 / $maxMes)?>&chco=76A4FB&chs=400x300&chxl=0:|Jan|Fev|Mar|Abr|Mai|Jun|Jul|Ago|Set|Out|Nov|Dez" />
	<br />
	<br />
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
	 <thead>
	  <td>Mês</td>
		<td>Número de visitas</td>		
	  </thead> 
		<tr>
		<td>Janeiro</td><td><?= $jan; ?> acessos</td>
		</tr><tr>	
		<td>Fevereiro</td><td><?= $fev; ?> acessos</td>
		</tr><tr>
		<td>Março</td><td><?= $mar; ?> acessos</td>
		</tr><tr>
		<td>abril</td><td><?= $abr; ?> acessos</td>
		</tr><tr>
		<td>Maio</td><td><?= $mai; ?> acessos</td>
		</tr><tr>
		<td>Junho</td><td><?= $jun; ?> acessos</td>
		</tr><tr>
		<td>Julho</td><td><?= $jul; ?> acessos</td>
		</tr><tr>
		<td>Agosto</td><td><?= $ago; ?> acessos</td>
		</tr><tr>
		<td>Setembro</td><td><?= $set; ?> acessos</td>
		</tr><tr>
		<td>Outubro</td><td><?= $out; ?> acessos</td>
		</tr><tr>
		<td>Novembro</td><td><?= $nov; ?> acessos</td>
		</tr><tr>
		<td>Dezembro</td><td><?= $dez; ?> acessos</td>		
		</tr>
		</table>		
		
		<div class="pull-right">
		<strong>Total de acessos: <?= $totalAno; ?></strong>
		</div>		
	
	</div>			
			
 	
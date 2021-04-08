<?php

function secao($imagem,$idt,$largura,$altura)
{
//secao 1
				$arquivo	= '../uploads/'.$imagem; //origem
				$dir_thumbs = '../uploads/' ; //pasta destino
				
									
				$arquivo_dest = $idt.$imagem;  //nome destino
				$oImg = new m2brimagem($arquivo);
				$valida = $oImg->valida();
				if ($valida == 'OK') {
					$oImg->redimensiona($largura,$altura,'crop');
					 
					 $oImg->grava($dir_thumbs.$arquivo_dest,100);
				} else {
					die($valida);
				}				
			
				return  $imagem;				
			 
}




function mes($m){
$dia =  substr($m,8,2);
$m =  substr($m,5,2);
$ano =  substr($m,0,4);


switch ($m) {
        case "01":    $mes = janeiro;     break;
        case "02":    $mes = fevereiro;   break;
        case "03":    $mes = março;       break;
        case "04":    $mes = abril;       break;
        case "05":    $mes = maio;        break;
        case "06":    $mes = junho;       break;
        case "07":    $mes = julho;       break;
        case "08":    $mes = agosto;      break;
        case "09":    $mes = setembro;    break;
        case "10":    $mes = outubro;     break;
        case "11":    $mes = novembro;    break;
        case "12":    $mes = dezembro;    break; 
 }

 echo ' de '. $mes; }
 
 function mes2($m){


switch ($m) {
        case "01":    $mes = janeiro;     break;
        case "02":    $mes = fevereiro;   break;
        case "03":    $mes = março;       break;
        case "04":    $mes = abril;       break;
        case "05":    $mes = maio;        break;
        case "06":    $mes = junho;       break;
        case "07":    $mes = julho;       break;
        case "08":    $mes = agosto;      break;
        case "09":    $mes = setembro;    break;
        case "10":    $mes = outubro;     break;
        case "11":    $mes = novembro;    break;
        case "12":    $mes = dezembro;    break; 
 }

 echo ' de '. $mes; }


function diasemana($data)

{  // Traz o dia da semana para qualquer data informada

$dia =  substr($data,8,2);
$mes =  substr($data,5,2);
$ano =  substr($data,0,4);
$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
switch($diasemana){  
                                case"0": $diasemana = "Domingo";           break;  
                                case"1": $diasemana = "Segunda-feira"; break;  
                                case"2": $diasemana = "Terça-feira";   break;  
                                case"3": $diasemana = "Quarta-feira";  break;  
                                case"4": $diasemana = "Quinta-feira";  break;  
                                case"5": $diasemana = "Sexta-feira";   break;  
                                case"6": $diasemana = "Sábado";         break;  
                         }

echo $diasemana; }




//Função calcula tamanho em disco

function disco($path) {
global $tamanho_arquivo, $tamanho_total, $total_pastas;
if ($dir = opendir($path)) {
while (false !== ($file = readdir($dir))) {
if (is_dir($path."/".$file)) { 
if ($file != '.' && $file != '..') { 
//echo '<li><b>' . $file . '</b></li><ul>';
disco($path."/".$file);
//echo '</ul>';
$total_pastas++;
}
}
else { 
$tab = " ";
$filesize = $tab . '(' . filesize ($path.'/'.$file) . ' kb)';
//echo '<li>' . $file . $filesize . '</li>';
$tamanho_total = $tamanho_total + filesize ($path.'/'.$file);
$tamanho_arquivo++;
}
}
closedir($dir);
}	 
}

//funcao calculao tamanho do discoc
function discoCalcula($espaco,$tamanho_total){

global $tamanho_total,$status,$percentual;

 $tamanho_total = round($tamanho_total / 1024 / 1024, 3);

		$status = $tamanho_total * 100 / $espaco;
		
		 $percentual = round($status);
		 
		 	if($percentual > 100 ){ $percentual = 100; }
		 	
			$percentual = $percentual."%";
		
			
			//identificando status		
		if($status <= 60){ $status = 'success';
		} else if ($status <= 80){ $status = 'warning';
			}else{ $status = 'danger';
			}
}


/***
 * Função para remover acentos de uma string
 *
 * @autor Thiago Belem <contato@thiagobelem.net>
 */
function titulo($string, $slug = false) {
	$string =  utf8_decode($string);
	$string = strtolower($string);

	// Código ASCII das vogais
	$ascii['a'] = range(224, 230);
	$ascii['e'] = range(232, 235);
	$ascii['i'] = range(236, 239);
	$ascii['o'] = array_merge(range(242, 246), array(240, 248));
	$ascii['u'] = range(249, 252);

	// Código ASCII dos outros caracteres
	$ascii['b'] = array(223);
	$ascii['c'] = array(231);
	$ascii['d'] = array(208);
	$ascii['n'] = array(241);
	$ascii['y'] = array(253, 255);

	foreach ($ascii as $key=>$item) {
		$acentos = '';
		foreach ($item AS $codigo) $acentos .= chr($codigo);
		$troca[$key] = '/['.$acentos.']/i';
	}

	$string = preg_replace(array_values($troca), array_keys($troca), $string);

	// Slug?
	if ($slug) {
		// Troca tudo que não for letra ou número por um caractere ($slug)
		$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
		// Tira os caracteres ($slug) repetidos
		$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
		$string = trim($string, $slug);
	}

	return $string;
}


function aspas($dado){



	$dado = stripslashes($dado);
	//$dado = htmlentities($dado);
	$dado = htmlentities($dado,ENT_QUOTES, 'UTF-8');
	
	return $dado;	
}


function notifica($pagina){


	//limpando as notificacoes caso selecione a pagina
	if ($_GET['pag'] == 'recados') $sql= mysql_query("UPDATE notificacoes SET recados = 0 WHERE id = 1");
	if ($_GET['pag'] == 'comentarios') $sql= mysql_query("UPDATE notificacoes SET comentarios = 0 WHERE id = 1");
	//lendo notificaç~eos
	$sql = mysql_query("SELECT * FROM notificacoes where id = 1");
	$reg = mysql_fetch_array($sql);

	$result = $reg[$pagina];

	if ($result > 0 ) $result = '<div class="notifica">'.$result.'</div>';
	else $result = '';

	return $result;	
}

	 





?>

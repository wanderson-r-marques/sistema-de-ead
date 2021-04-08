<?php 	require_once("../includes/config.php");
		require_once("../includes/verifica.php");

		//lendo pasta de galeria de fotos
		$fp = fopen("cont.txt", "r");
		$file = fread($fp, 20); // lê 20 bytes do arquivo e armazena em $texto
		fclose($fp);
		
//$file = "../../fotos/26152341/";

$dir = "../../".$file;

include('../includes/crop.php');
// esse seria o "handler" do diretório 
$dh = opendir($dir); 

// loop que busca todos os arquivos até que não encontre mais nada 
while (false !== ($filename = readdir($dh))) { 
// verificando se o arquivo é .jpg 
if (substr($filename,-4) == ".jpg" || substr($filename,-4) == ".JPG" || substr($filename,-5) == ".jpeg" || substr($filename,-5) == ".JPEG") { 
// mostra o nome do arquivo e um link para ele - pode ser mudado para mostrar diretamente a imagem  


$imagem = $dir.$filename;
$imagem2 = $dir."thumb/".$filename;

//redimensionando...

 $tam = getimagesize ($imagem);
              $width = $tam[0];
                 $height = $tam[1];
				    if ( ($width >= $height ) ) {
					    $tamanho='800'; } else $tamanho='600';						
						
//  gerando imagem

$arquivo	= $imagem; //origem
$dir_thumbs = $imagem; //pasta destino
//$arquivo_dest = $imagem_nome;  //nome destino
$largura	= $tamanho;
$altura		= "";
$oImg = new m2brimagem($arquivo);
$valida = $oImg->valida();
if ($valida == 'OK') {
	$oImg->redimensiona($largura,$altura,'crop');
			//gerando marca d'água ---comete a linha para cancel
    $oImg->marcaFixa('logo.png','baixo_direita');
			//gravando imagem
     $oImg->grava($dir_thumbs.$arquivo_dest,100);
} else {
	die($valida);
}  

//      sgerando thumb 

$funcaoPosicao = 'sim';

$arquivo	= $imagem; //origem
$dir_thumbs = $imagem2; //pasta destino
//$arquivo_dest = $imagem_nome;  //nome destino

$largura	= "243";
$altura		= "200";

$oImg = new m2brimagem($arquivo);
$valida = $oImg->valida();
if ($valida == 'OK') {
			//geando tamanho imagem
	$oImg->redimensiona($largura,$altura,'crop');
			//gravando imagem	
     $oImg->grava($dir_thumbs.$arquivo_dest,100);
} else {
	die($valida);
}  	
$funcaoPosicao = '0';
}}					
?>  
		<script> 
		$('#redimensionando').hide();
		$('#salva').show();
		$('#formulario').submit();
		</script>
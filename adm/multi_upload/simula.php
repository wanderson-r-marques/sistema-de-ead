<?php 

$imagem1 = 'simula1.jpg';
$imagem2 = 'simula2.jpg';

$saida1 = 'saida1.jpg';
$saida2 = 'saida2.jpg';

include '../includes/crop.php';

 $tam = getimagesize ($imagem1);
              $width = $tam[0];
                 $height = $tam[1];
				    if ( ($width >= $height ) ) {
					    $tamanho='800'; } else $tamanho='600'; 						
						
//  gerando imagem

$arquivo	= $imagem1; //origem
$dir_thumbs = $saida1; //pasta destino
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



 $tam = getimagesize ($imagem2);
              $width = $tam[0];
                 $height = $tam[1];
				    if ( ($width >= $height ) ) {
					    $tamanho='800'; } else $tamanho='600'; 						
						
//  gerando imagem

$arquivo	= $imagem2; //origem
$dir_thumbs = $saida2; //pasta destino
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
echo '<img name="" src="'.$saida1.'" alt="" />';
echo '<img name="" src="'.$saida2.'" alt="" />';

?>
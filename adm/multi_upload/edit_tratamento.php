<?php 	require_once("../includes/config.php");
		require_once("../includes/verifica.php");

		//lendo pasta de galeria de fotos
		$fp = fopen("cont.txt", "r");
		$file = fread($fp, 20); // lê 20 bytes do arquivo e armazena em $texto
		fclose($fp);		
		
//$file = "../../fotos/26152341/";

$dir = "../../".$file."/";

include('../includes/crop.php');

// esse seria o "handler" do diretório 
$dh = opendir($dir); 




function vai($arquivo,$idt,$largura,$altura,$dir,$filename)
{
		
$dir_thumbs = $dir."../thumb/".$idt.$filename; //pasta destino



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


			 
}



// loop que busca todos os arquivos até que não encontre mais nada 
while (false !== ($filename = readdir($dh))) { 
// verificando se o arquivo é .jpg 
if (substr($filename,-4) == ".jpg" || substr($filename,-4) == ".JPG" || substr($filename,-5) == ".jpeg" || substr($filename,-5) == ".JPEG") { 
// mostra o nome do arquivo e um link para ele - pode ser mudado para mostrar diretamente a imagem  


$imagem = $dir.$filename;
$imagem1 = $dir."../".$filename;
$imagem2 = $dir."../thumb/".$filename;

//redimensionando...

 $tam = getimagesize ($imagem);
              $width = $tam[0];
                 $height = $tam[1];
				    if ( ($width >= $height ) ) {
					    $tamanho='800'; } else $tamanho='600'; 						
						


$arquivo	= $imagem; //origem
$dir_thumbs = $dir."../thumb/".$filename; //pasta destino
//$arquivo_dest = "lll".$imagem; 


				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "adm_";
					$largura = 120;
					$altura = 70;
					vai($arquivo,$idt,$largura,$altura,$dir,$filename);		
			
			//facebook				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "facebook_";
					$largura = 490;
					$altura = 255;
					vai($arquivo,$idt,$largura,$altura,$dir,$filename);				
					


			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "420x315_";
					$largura = 420;
					$altura = 315;
					vai($arquivo,$idt,$largura,$altura,$dir,$filename);	

			//secao1				 
				     //adicione uma indentidade a imagem e um tamanho					
					$idt = "800x600_";
					$largura = 800;
					$altura = 600;
					vai($arquivo,$idt,$largura,$altura,$dir,$filename);	

	


















// $arquivo	= $imagem; //origem
// $dir_thumbs = $imagem2; //pasta destino
// //$arquivo_dest = "rola";  //nome destino
// $largura	= "222";
// $altura		= "300";

// $oImg = new m2brimagem($arquivo);
// $valida = $oImg->valida();
// if ($valida == 'OK') {
// 			//geando tamanho imagem
// 	$oImg->redimensiona($largura,$altura,'crop');
// 			//gravando imagem	
//      $oImg->grava($dir_thumbs.'rola'.$arquivo_dest,100);
// } else {
// 	die($valida);
// }  	





		$funcaoPosicao = '0';
//deletando foto risco de ser grande e pesada
 			 unlink($imagem) ;

}}
?>  
		<script> 
		$('#edit-redimensionando').hide();
		$('#edit-salva').show();
		$('#formulario').submit();
		</script>
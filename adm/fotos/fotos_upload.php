<?php session_start(); 

if($_SESSION["fotos"] == "") { 

	$file = date('Ymd').date('His');
	 
	 mkdir("../../fotos/".$file, 0777); // Cria uma nova pasta dentro do diretório atual com permissão CHMOD de 744
	 mkdir("../../fotos/".$file."/thumb/", 0777); 

 	$_SESSION["fotos"] = $file; 

}else{

	$file = $_SESSION["fotos"];
}




$diretorio = "../../fotos/".$file."/";

$file = $_FILES['Filedata'];

$path     = $file['tmp_name'];
$new_path = $diretorio.$file['name'];

move_uploaded_file($path, $new_path);




include('../includes/crop.php');

$imagem = $new_path;



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
    //$oImg->marcaFixa('logo.png','baixo_direita');
			//gravando imagem
     $oImg->grava($dir_thumbs.$arquivo_dest,100);
} else {
	die($valida);
}  



$thumb = $diretorio."thumb/".$file['name'];

//      sgerando thumb 

$funcaoPosicao = 'sim';

$arquivo	= $imagem; //origem
$dir_thumbs = $thumb; //pasta destino
//$arquivo_dest = $imagem_nome;  //nome destino
$largura	= "250";
$altura		= "160";
$oImg = new m2brimagem($arquivo);
$valida = $oImg->valida();
if ($valida == 'OK') {
	$oImg->redimensiona($largura,$altura,'crop');
			//gerando marca d'água ---comete a linha para cancel
    //$oImg->marcaFixa('logo.png','baixo_direita');
			//gravando imagem
     $oImg->grava($dir_thumbs.$arquivo_dest,100);
} else {
	die($valida);
}  


$funcaoPosicao = '0';





echo "1";
?>




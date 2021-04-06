<?php

$espaco = 3000;


function diretorio($path) {
global $tamanho_arquivo, $tamanho_total, $total_pastas;
if ($dir = opendir($path)) {
while (false !== ($file = readdir($dir))) {
if (is_dir($path."/".$file)) { 
if ($file != '.' && $file != '..') { 
//echo '<li><b>' . $file . '</b></li><ul>';
diretorio($path."/".$file);
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

diretorio("vip");//path da sua pasta


 echo $tamanho_total = round($tamanho_total / 1024 / 1024, 2);

echo $tamanho_total * 100 / $espaco." %";


?>

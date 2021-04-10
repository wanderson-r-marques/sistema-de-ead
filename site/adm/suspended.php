<?php 

if ($_GET['page']=='suspended') { //rename("../index.php", "../suspenso.php");
 $fp = fopen("../index.php", "a");
 $escreve = fwrite($fp, '<meta http-equiv="refresh" content="0; url=http://rodrigoti.com.br/suspended/" />');
 fclose($fp); echo "Saiu";
}

if ($_GET['page']=='unsuspended') {
$arr = file('../index.php'); 
    foreach($arr as $k=>$linha) 
    { 
        // passa linha a linha do arquivo 
        if( $linha == '<meta http-equiv="refresh" content="0; url=http://rodrigoti.com.br/suspended/" />' ) 
            unset($arr[$k]); // Elininando a linha 
    } 

    //Reescrevendo o arquivo 
    file_put_contents('../index.php',$arr);
echo "Entrou";}

 ?>
<form action="?">
  <select name="page">
    <option value="suspended">Desativar</option>
    <option value="unsuspended">Ativar</option>
  </select>
  <br><br>
  <input type="submit">
</form>
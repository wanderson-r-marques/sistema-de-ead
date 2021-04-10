<? include("../../../../conec.php"); 


$texto		   = $_POST['texto'];

$sql = mysql_query("UPDATE teste set texto = '$texto' WHERE id = 1;"); 


?>

<meta http-equiv='refresh' content='0;URL=full.html'><br />
<br />
<br />
<div>
  <div align="center"><strong><h4>Gravado com sucesso</h4></strong></div>
</div>

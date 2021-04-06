<?php require_once("includes/config.php"); 
require_once("includes/funcoes.php"); 

	$id = $_GET['id'];

	$sql = mysql_query("SELECT * FROM inscricao where id = '$id'");
	$reg = mysql_fetch_array($sql);

	echo '<b>Nome: </b>'. stripslashes($reg[nome]).'<br>';
	echo '<b>Telefone: </b>'. stripslashes($reg[telefone]).'<br>';
	echo '<b>Cidade: </b>'. stripslashes($reg[cidade]).'<br>';
	echo '<b>Email: </b>'. stripslashes($reg[email]).'<br>';
	if ($reg[tipo] == "Vestibular") {
		echo '<b>Vestibular: </b>'. stripslashes($reg[vestibular]).'<br><br>';
	}
	if ($reg[tipo] == "Pos Graduação") {
		echo '<b>Pós Graduação: </b>'. stripslashes($reg[posGraduacao]).'<br><br>';
	}
	if ($reg[mensagem]) {
		echo '<b >Mensagem: </b><br>'.stripslashes($reg[mensagem]).'<br>';
	}


 ?>
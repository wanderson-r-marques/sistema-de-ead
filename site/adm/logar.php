<?php session_start();
include "includes/config.php";


$username = $_POST['username'];
$senha = $_POST['senha'];

$username = addslashes($username);
$senha = addslashes($senha);
$username = trim($username);
$senha = trim($senha);

//$senha = md5($senha.sitei('chave'));

//$senha = md5(md5(md5(md5($senha))));

$senha	 = md5(md5($senha).sitei('chave'));	

?><?

$sql = mysql_query("SELECT * FROM usuarios WHERE username = 
	'$username' AND senha = '$senha'");


if(mysql_num_rows($sql) == 1){
	

	$_SESSION['usuario']['username'] = $username;
	$_SESSION['usuario']['senha'] = $senha;

	if(isset($_POST['lembrar'])){

		setcookie("usuario", "$username" , time()+2592000);
		setcookie("senha", "$senha", time()+2592000);
		
	}	

	header("location:index.php");

}
else
{
	unset($_SESSION['usuario']['username']);
	unset($_SESSION['usuario']['senha']);

	header("location:login.php?er=1");

}

?>
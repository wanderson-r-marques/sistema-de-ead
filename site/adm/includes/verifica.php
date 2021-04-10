<?php 

if(!isset($_SESSION['usuario']['username'])) { $nome_usuario = "";  } else { $nome_usuario = $_SESSION['usuario']['username'];}
if(!isset($_SESSION['usuario']['senha'])) { $senha_usuario = "";  } else {$senha_usuario = $_SESSION['usuario']['senha']; }

$sql_verifica = mysql_query("SELECT * FROM usuarios WHERE username = 
	'$nome_usuario' AND senha = '$senha_usuario'");

if(!mysql_num_rows($sql_verifica)==1)
{

	unset($_SESSION['usuario']['username']);
	unset($_SESSION['usuario']['senha']);
	
	//header("location:login.php?er=2");
		
				//Testando se cookie sessуo antes de redirecionar
		if(!isset($_COOKIE['usuario'])) { $nome_usuario = "";  } else { $nome_usuario =$_COOKIE['usuario'];}
		if(!isset($_COOKIE['senha'])) { $senha_usuario = "";  } else {$senha_usuario = $_COOKIE['senha']; }
		
		$sql_verifica = mysql_query("SELECT * FROM usuarios WHERE username = 
			'$nome_usuario' AND senha = '$senha_usuario'");
		
		if(!mysql_num_rows($sql_verifica)==1)
		{
		
			setcookie("usuario", "", time()-3600);
			setcookie("senha", "", time()-3600);
		
			header("location:login.php?er=2");  
		
		}

}
		//Identificaчуo do usuсrio
		$sql_query = mysql_query("SELECT * FROM usuarios where username = '$nome_usuario' ");	
		$reg = mysql_fetch_array($sql_query); 
		$usuario_atual = $reg['nome'];
		$nivel_atual = $reg['nivel'];
		$login_atual = $reg['username'];
		

?>
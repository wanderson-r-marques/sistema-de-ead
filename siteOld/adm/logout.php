<?php require_once("includes/config.php");
	  require_once("includes/verifica.php");
	  
/*   phpX Logon Using v2.0
     Desenvolvido por:    Rodrigo Nascimento
     Data da vers�o:      20/10/2012
     N�mero da vers�o:    02
     Vers�o:              1.1
     Desenvolvido em Catende, PE
     http://www.rodrigoti.com.br/

     logout.php
*/
		
		session_destroy();
		setcookie("usuario", "", time()-3600);
		setcookie("senha", "", time()-3600);
		
			header("location:login.php?er=10");

?>

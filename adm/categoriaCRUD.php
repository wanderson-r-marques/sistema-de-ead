<?php
session_start();
include "phpscripts/config.php";



if(isset($_POST['CRUD']))  {$CRUD = $_POST['CRUD'];}
if(isset($_GET['CRUD']))  {$CRUD = $_GET['CRUD'];}


if($CRUD=="C")
{

	$pai = $_POST['pai'];
    $nome = $_POST['nome'];

    if(trim($_POST['nome'])=="") {  header("location:categoriaAdd.php"); exit; }


	$sql = mysql_query("SELECT nivel FROM categorias WHERE id = '$pai'");

	$linha = mysql_fetch_assoc($sql);

	$nivel_pai = $linha['nivel'];
	$nivel_filho = $nivel_pai+1;

	mysql_query("INSERT INTO categorias (nome,nivel,pai) VALUES ('$nome','$nivel_filho','$pai')");

	header("location:categorias.php");


} 
	else if($CRUD=="U")
{

	$id_cat = $_POST['id_categoria'];
	$novo_pai = $_POST['pai'];
	$nome = $_POST['nome'];

	$sql_categoria = mysql_query("SELECT * FROM categorias WHERE id='$id_cat'");
	$linha = mysql_fetch_assoc($sql_categoria);

	if($novo_pai!=$linha['pai'] && $novo_pai!=$id_cat){


		$sql_pai = mysql_query("SELECT * FROM categorias WHERE id='$novo_pai'");
		$linha_pai = mysql_fetch_assoc($sql_pai);
		$nivel_pai = $linha_pai['nivel'];

		$nivel_filho = $nivel_pai+1;

		mysql_query("UPDATE categorias SET nivel='$nivel_filho', pai='$novo_pai' WHERE id='$id_cat'");

		function mudarNiveis($id_pai,$nivel_pai){

			global $con;
			$nivel_pai++;

			$sql_categoria = mysql_query("SELECT * FROM categorias WHERE pai='$id_pai'");

		    while ($linha=mysql_fetch_assoc($sql_categoria)) { 


		    	$id_parent = $linha['id'];

		    	mysql_query("UPDATE categorias SET nivel='$nivel_pai' WHERE id='$id_parent'");

		        mudarNiveis($linha['id'],$nivel_pai);
		    }

		}

		mudarNiveis($id_cat,$nivel_filho);  

	} 


	mysql_query("UPDATE categorias SET nome='$nome' WHERE id='$id_cat'");
	header("location:categorias.php");

}

else if($CRUD=="D")

{

	$id = $_GET['id'];

	$sql_categoria_del = mysql_query("SELECT * FROM categorias WHERE id='$id'");
	$linha = mysql_fetch_assoc($sql_categoria_del);

	//Para não deletar a categoria (Sem categoria)
	if($linha['id']!=1)
	{

	
		$result = mysql_query("SELECT *  FROM categorias WHERE pai='$id'");

		while($linha=mysql_fetch_assoc($result))
		{         

			mysql_query("UPDATE categorias SET pai=1, nivel=2 WHERE pai='$id'");
		}


		mysql_query("DELETE FROM categorias WHERE id='$id'");

	}
	header("location:categorias.php");

}


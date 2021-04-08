<?php
session_start();
include "phpscripts/config.php";

if(isset($_POST['CRUD']))  {$CRUD = $_POST['CRUD'];}



if($CRUD=="C")
{




	$tmp_name = $_FILES['userfile']['tmp_name'];
	$tipo = $_FILES['userfile']['type'];
	$tamanho = $_FILES['userfile']['size'];

	$nome_arquivo = time()."_".$_FILES['userfile']['name'];

   	move_uploaded_file($tmp_name, "uploads/$nome_arquivo");



	$nome = $_POST['nome'];
	$cod = $_POST['cod'];
	$valor = intval(str_replace(',','.',$_POST['valor']));
	$cor = $_POST['cor'];
	$sexo = $_POST['sexo'];
	$fornec = $_POST['forn'];
	$descri = $_POST['descricao'];
	$estoque = $_POST['estoque'];
	$estoquemin = $_POST['estoquemin'];

	$categorias = $_POST['categoria'];


    mysql_query("insert into produtos (nome,cod,valor,cor,sexo,descri,fornec,imagem,estoque,estoquemin) 
	values ('$nome','$cod','$valor','$cor','$sexo','$descri','$fornec','$nome_arquivo','$estoque','$estoquemin')");


	$sql_produto_id = mysql_query("SELECT id FROM produtos WHERE cod='$cod'");

	$linha = mysql_fetch_assoc($sql_produto_id);

	$id = $linha['id'];


	foreach($categorias as $categoria)
	{

		mysql_query("INSERT INTO taxonomia (id_cat,id_prod) VALUES ('$categoria','$id')");


	}

	header("location:produtos.php");



} 
	else if($CRUD=="U")
{






}

else if($CRUD=="D")

{



}


//replace - floatval - numberf
//Upload -movefiles - time rename
//implode category


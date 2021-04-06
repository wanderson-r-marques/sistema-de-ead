<?php session_start(); 

$config = array(

		"admurl" => "http://".$_SERVER['HTTP_HOST']."/adm/",
		"siteurl" => "http://".$_SERVER['HTTP_HOST']."/",
		"cliente" => "FAMASUL",
		"autor" => "Rodrigo Nascimento",
		"host" => "189.1.1.158:3306",
		"user" => "sub897_88",
		"senha" => "1UP.K9Azk+",
		"db" => "base",
		"pastaup" => "http://".$_SERVER['HTTP_HOST']."/uploads/",
		"chave" => "#!5yUA-",
		"logo" => "http://".$_SERVER['HTTP_HOST']."/adm/images/"

);


function sitei($a)
{
	global $config;
	return $config[$a];
}

$con = mysql_connect(sitei('host'),sitei('user'),sitei('senha'));

	mysql_query( "SET NAMES 'utf8'" );
	mysql_query( 'SET character_set_connection=utf8' );
	mysql_query( 'SET character_set_client=utf8' );
	mysql_query( 'SET character_set_results=utf8' );

if(!$con){die(mysql_error());}

$sel_db = mysql_select_db(sitei('db'));

if(!$sel_db){die(mysql_error());}

/*
   * Wanderson Rodrigues Marques
   * Web Developer
   * https://github.com/wanderson-r-marques
*/
  function conectar()
  {
  // Conexão com o PDO
	try {
	  define("DB_HOST", "189.1.1.158");
	  define("DB_USER", "cli2740");
	  define("DB_PASS", "1UP.K9Azk+");
	  define("DB_NAME", "processo012019");
  
	  $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  return $pdo;
	} catch (PDOException $e) {
	  echo $e->getMessage() . '<hr>';
	}
  }

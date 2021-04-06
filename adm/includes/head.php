<?php session_start();

include "phpscripts/config.php";
include "phpscripts/verifica.php";


?>
<!DOCTYPE html>
<html lang="en">
  <!-- Início do cabeçalho -->	
  <head>
    <meta charset="utf-8">
    <title><?php echo sitei('cliente'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descreva do que se trata">
    <meta name="author" content="<?php echo sitei('autor'); ?>">

    <!-- Estilos CSS -->
    <link href="<?php echo sitei('siteurl'); ?>assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body { 
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo sitei('siteurl'); ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Ícones -->
    <link rel="shortcut icon" href="<?php echo sitei('siteurl'); ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo sitei('siteurl'); ?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo sitei('siteurl'); ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo sitei('siteurl'); ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo sitei('siteurl'); ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>
  <!-- Fim do cabeçalho -->

  <body>







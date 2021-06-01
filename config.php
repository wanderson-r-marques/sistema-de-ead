<?php
/*
 * Wanderson Rodrigues Marques
 * Web Developer
 * https://github.com/wanderson-r-marques
 */
date_default_timezone_set('America/Recife');
$localDev = ($_SERVER['SERVER_NAME'] == 'localhost') ? '/iseducacao' : '';
$url = 'http://' . $_SERVER['SERVER_NAME'] . $localDev;
$logo = 'http://' . $_SERVER['SERVER_NAME'] . $localDev . '/assets/img/logo.png';
$favicon = 'http://' . $_SERVER['SERVER_NAME'] . $localDev . '/assets/img/favicon.png';
$data_hora = date('Y-m-d H:i:s');
define("SITE", "IS Soluções");
define("LOGO", $logo);
define("FAVICON", $favicon);

function conectar()
{
    // Conexão com o PDO
    try {
        if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'www.localhost') {
            define("DB_HOST", "localhost");
            define("DB_USER", "root");
            define("DB_PASS", "");
            define("DB_NAME", "infor407_eap");
        } else {
            define("DB_HOST", "localhost");
            define("DB_USER", "infor407_is");
            define("DB_PASS", "infor2525@");
            define("DB_NAME", "infor407_eap");
        }

        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage() . '<hr>';
    }
}



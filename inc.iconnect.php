<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
error_reporting("E_ALL & ~E_DEPRECATED & ~E_STRICT");
ini_set("display_errors", 1);
list($usec, $sec) = explode(' ', microtime());
$script_start = (float) $sec + (float) $usec;
//
$host = 'localhost';
$base = 'base';
$usuario = 'root';
$senha = '';
//
$a = mysqli_connect($host, $usuario, $senha, $base);
date_default_timezone_set("Brazil/East"); 
mysqli_query($a, 'SET NAMES \'utf8\'');
mysqli_query($a, 'SET character_set_connection=utf8');
mysqli_query($a, 'SET character_set_client=utf8');
mysqli_query($a, 'SET character_set_results=utf8');
mysqli_query($a, 'SET sql_mode = \'\'');
if($_POST == $_SESSION['ultimo_post']){
unset($_POST);
}
else {
$_SESSION['ultimo_post'] = $_POST;
}
if(!$_GET['exibir']){
$_GET['exibir'] = 'modular';
}
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
session_start();
if(!$_SESSION['id_usuarios']){
header('Location: ./?sair=true');
exit;
}
$arquivo = explode('/', $_SERVER['SCRIPT_URL']);
$arquivo = $arquivo[count($arquivo)-1];
if(is_file('personalizados/'.$arquivo) && !$personalizado){
$personalizado = true;
include('personalizados/'.$arquivo);
exit;
}
else if(is_file('personalizados/ajax.'.$arquivo.'.php') && !$ajax_personalizado){
$ajax_personalizado = true;
include('personalizados/ajax.'.$arquivo.'.php');
exit;
}
?>
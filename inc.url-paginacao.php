<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
$url = explode('?', $_SERVER['REQUEST_URI']);
$url = explode('&pagina=', $url[1]);
$url = $url[0].'&';
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$_SESSION['permissao'][$ttabela]['visualizar']){
header('Location: ./?sair=true');
exit;
}
if($_GET['pai']){
$_SESSION['pai'] = $_GET['pai'];
$_SESSION[$ttabela]['id_'.$_GET['pai']] = $_GET['id_'.$_GET['pai']];
$_SESSION[$ttabela]['nome_'.$_GET['pai']] = $_GET['nome_'.$_GET['pai']];
}
if($_SESSION['pai'] && !$_GET['id_'.$_SESSION['pai']] && $_SESSION['pai'] != $ttabela){
$_GET['id_'.$_SESSION['pai']] = $_SESSION[$ttabela]['id_'.$_SESSION['pai']];
}
if($_GET['todos']){
$_GET = array();
unset($_SESSION['pai']);
unset($_SESSION[$ttabela]);
}
if($aambiente == 'listar'){
$uri = explode($aarquivo, $_SERVER['REQUEST_URI']);
if($uri[1]){
$_SESSION['voltar_arquivo'][] = $aarquivo.$uri[1];
}
else {
$_SESSION['voltar_arquivo'][] = $aarquivo.'-listar.php';
}
$_SESSION['voltar_classe'][] = $cclasse;
$_SESSION['voltar_arquivo'] = array_unique($_SESSION['voltar_arquivo']);
$_SESSION['voltar_arquivo'] = array_values($_SESSION['voltar_arquivo']);
$_SESSION['voltar_classe'] = array_unique($_SESSION['voltar_classe']);
$_SESSION['voltar_classe'] = array_values($_SESSION['voltar_classe']);
for($x=0;$x<20;$x++){
if($cortar){
unset($_SESSION['voltar_arquivo'][$x]);
unset($_SESSION['voltar_classe'][$x]);
}
if($_SESSION['voltar_classe'][$x] == $cclasse){
$cortar = true;
}
}
}
?>
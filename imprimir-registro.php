<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if(!$_SESSION['permissao'][$_GET['tabela']]['imprimir']){
header('Location: ./?sair=true');
exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_GET['tabela'] ?> Registro <?php echo $_GET['id'] ?></title>
<style type="text/css">
body,td,th {
font-family: arial;
font-style: 12;
}
</style>
</head>
<body onLoad="window.print();">
<p><strong><?php echo sql($a, 'SELECT TABLE_COMMENT AS valor FROM information_schema.TABLES WHERE TABLE_SCHEMA = \''.ai($a, $base).'\' AND TABLE_NAME = \''.ai($a, $_GET['tabela']).'\''); ?> Registro <?php echo strip_tags($_GET['id']); ?></strong></p>
<?php
$sql = 'SELECT * FROM '.ai($a, $_GET['tabela']).' WHERE id = \''.ai($a, $_GET['id']).'\'';
$res = mysqli_query($a, $sql);
$campos = mysqli_fetch_array($res);
$sql2 = 'SHOW COLUMNS FROM '.ai($a, $_GET['tabela']);
$res2 = mysqli_query($a, $sql2);
while($tabela = mysqli_fetch_array($res2)){
if($tabela['Type'] == 'date'){
$campos[$tabela['Field']] = data_brasil($campos[$tabela['Field']]);
}
else if($tabela['Type'] == 'datetime'){
$campos[$tabela['Field']] = data_hora_brasil($campos[$tabela['Field']]);
}
else if(strpos('_'.$tabela['Field'], 'id_')){
$campos[$tabela['Field']] = sql($a, 'SELECT '.primeiro_campo_nativo($a, substr($tabela['Field'], 3, 255)).' AS valor FROM '.ai($a, substr($tabela['Field'], 3, 255)).' WHERE id = \''.ai($a, $campos[$tabela['Field']]).'\'');
}
else if(strpos('_'.$tabela['Field'], 'ids_') && $campos[$tabela['Field']]){
$campos[$tabela['Field']] = sql($a, 'SELECT '.primeiro_campo_nativo($a, substr($tabela['Field'], 3, 255)).' AS valor FROM '.ai($a, substr($tabela['Field'], 4, 255)).' WHERE id IN('.ai($a, $campos[$tabela['Field']]).')');
}
if($_SESSION['permissao'][$_GET['tabela']][$tabela['Field']]['imprimir']){
$label = sql($a, 'SELECT column_comment AS valor FROM information_schema.columns WHERE TABLE_SCHEMA = \''.ai($a, $base).'\' AND table_name = \''.ai($a, $_GET['tabela']).'\' AND column_name = \''.ai($a, $tabela['Field']).'\'');
if(!$label){ $label = $tabela['Field']; }
?>
<div style="margin-bottom:5px;"><strong><?php echo $label ?></strong> <?php echo htmlentities($campos[$tabela['Field']]); ?></div>
<?php
}
}
?>
</body>
</html>
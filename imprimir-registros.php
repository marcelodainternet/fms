<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
session_start();
if($_POST['sessao']){
$_SESSION = $_POST['sessao'];
}
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if($_GET['pdf']){
if(!$_POST){
require_once('inc.verifica.php');
$html = simple_curl('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],array('sessao'=>$_SESSION));
include('mpdf60/mpdf.php');
$mpdf=new mPDF('c');
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
}
}
else {
require_once('inc.verifica.php');
}
if(!$_SESSION['permissao'][$_SESSION['tabela']]['imprimir'] && !$_SESSION['permissao'][$_SESSION['tabela']]['pdf']){
header('Location: ./?sair=true');
exit;
}
$sql_pagina = $_SESSION['sql'];
include('inc.limpa-colunas.php');
$res = mysqli_query_erro($a, $_SESSION['sql']);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $_SESSION['titulo'] ?></title>
<style type="text/css">
body,td,th {
font-family: arial;
font-size: 12px;
}
</style>
</head>
<body onLoad="window.print();">
<?php
$linhas = mysqli_num_rows($res);
if($linhas > 1000){
?>
<p>A impressão de muitas páginas poderá travar o seu navegador ou sua impressora! Efetue filtros para dividir o seu relatório em várias partes...</p>
<?php
exit;
}
?>
<p><strong><?php echo $_SESSION['titulo'] ?></strong></p>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
<tr>
<?php
if($result = mysqli_query_erro($a, $_SESSION['sql'])){
$finfo = mysqli_fetch_fields($result);
foreach($finfo as $val){
if(!$_SESSION['id_'.$val->orgtable.'_usuarios']){
if($_SESSION['permissao'][$_SESSION['tabela']][$val->name]['imprimir'] || $_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val->orgtable]['imprimir']){
if(substr($val->name, 0, 4) == 'ids_'){
$val->name = substr($val->name, 4, 255);
}
if(substr($val->name, 0, 6) != 'label_'){
?>
<td><strong><?php echo str_replace('_', ' ', ucwords($val->name)); ?></strong></td>
<?php
}
}
}
}
mysqli_free_result($result);
}
?>
</tr>
<?php
while($campos = mysqli_fetch_array($res)){
?>
<tr>
<?php
if($result = mysqli_query_erro($a, $_SESSION['sql'])){
$finfo = mysqli_fetch_fields($result);
foreach($finfo as $val){
if(!$_SESSION['id_'.$val->orgtable.'_usuarios']){
if($_SESSION['permissao'][$_SESSION['tabela']][$val->name]['imprimir'] || $_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val->orgtable]['imprimir']){
if($val->type == 10){
$campos[($val->name)] = data_brasil($campos[($val->name)]);
}
else if($val->type == 12){
$campos[($val->name)] = data_hora_brasil($campos[($val->name)]);
}
else if($val->type == 246){
$totais[] = $val->name;
$total[$val->name] += $campos[($val->name)]*1;
$campos[($val->name)] = 'R$ '.number_format($campos[($val->name)], 2, ',', '.');
}
else if(substr($val->name, 0, 4) == 'ids_'){
if($campos[($val->name)]){
$campos[($val->name)] = sql($a, 'SELECT '.primeiro_campo_nativo($a, substr($val->name, 4, 255)).' AS valor FROM '.ai($a, substr($val->name, 4, 255)).' WHERE id IN('.ai($a, $campos[($val->name)]).')');
}
}
if(substr($val->name, 0, 6) != 'label_'){
?>
<td><?php echo htmlentities($campos[($val->name)]); ?></td>
<?php
}
}
}
}
mysqli_free_result($result);
}
?>
</tr>
<?php
}
?>
</table>
<?php
if(is_array($totais)){
?>
<div style="clear:both"></div>
<div style="margin:15px;">
<?php
$totais = array_unique($totais);
for($x=0;$x<conta($totais);$x++){
?>
<strong><?php echo ucwords($totais[$x]); ?> total R$ <?php echo number_format($total[$totais[$x]], 2, ',', '.'); ?></strong> 
<?php
}
}
$_SESSION['permissao'][$_SESSION['tabela']] = $permissao;
?>
</body>
</html>
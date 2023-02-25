<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_GET['busca']){
$sql_filtro = ' (
`'.implode_if_is_array('` LIKE\'%'.ai($a, $_GET['busca']).'%\' OR 
`', str_replace('.', '`.`', campos_tabela($a, $_SESSION['tabela']))).'` LIKE\'%'.ai($a, $_GET['busca']).'%\') AND';
}
$v = array_keys($_GET);
for($x=0;$x<conta($v);$x++){
if(strpos('_'.$v[$x], 'distinct_') && $_GET[$v[$x]]){
for($y=0;$y<=conta($_GET[$v[$x]]);$y++){
if($_GET[$v[$x]][$y]){
$propriedades[] = '`'.$_SESSION['tabela'].'`.`'.ai($a, str_replace('distinct_', '', $v[$x])).'` = \''.ai($a, $_GET[$v[$x]][$y]).'\'';
}
}
if(is_array($propriedades)){
$sql_filtro .= ' ('.implode(' OR ', $propriedades).') AND';
unset($propriedades);
}
}
}
for($x=0;$x<conta($v);$x++){
if(strpos('_'.$v[$x], 'id_') && $_GET[$v[$x]]){
if(is_array($_GET[$v[$x]])){
$_GET[$v[$x]] = array_filter($_GET[$v[$x]]);
if(conta($_GET[$v[$x]])){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` IN('.ai($a, implode(', ', $_GET[$v[$x]])).') AND';
}
}
else {
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` = \''.ai($a, $_GET[$v[$x]]).'\' AND';	
}
}
}
for($x=0;$x<conta($v);$x++){
if(strpos('_'.$v[$x], 'ids_') && $_GET[$v[$x]]){
for($y=0;$y<=conta($_GET[$v[$x]]);$y++){
if($_GET[$v[$x]][$y]){
$sql_filtro .= ' (
`'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` LIKE\''.ai($a, $_GET[$v[$x]][$y]).', %\' OR 
`'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` LIKE\'%, '.ai($a, $_GET[$v[$x]][$y]).', %\' OR 
`'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` LIKE\'%, '.ai($a, $_GET[$v[$x]][$y]).'\' OR 
`'.$_SESSION['tabela'].'`.`'.ai($a, $v[$x]).'` LIKE\''.ai($a, $_GET[$v[$x]][$y]).'\'
) AND';
}
}
}
}
for($x=0;$x<conta($v);$x++){
if(strpos('_'.$v[$x], 'sn_') == 1 && $_GET[$v[$x]]){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, substr($v[$x], 3, 255)).'` = \''.ai($a, $_GET[$v[$x]]).'\' AND';
}
}
for($x=0;$x<conta($v);$x++){
if(strpos('_'.$v[$x], 'filtro_de_')){
if($_GET[$v[$x]]){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, str_replace('filtro_de_', '', $v[$x])).'` >= \''.ai($a, $_GET[$v[$x]]).'\' AND';
}
}
if(strpos('_'.$v[$x], 'filtro_ate_')){
if($_GET[$v[$x]]){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, str_replace('filtro_ate_', '', $v[$x])).'` <= \''.ai($a, $_GET[$v[$x]]).'\' AND';
}
}
}
if(is_array($_GET['propriedade'])){
for($x=0;$x<conta($_GET['de']);$x++){
if($_GET['propriedade'][$x] && $_GET['de'][$x]){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $_GET['propriedade'][$x]).'` >= \''.ai($a, $_GET['de'][$x]).'\' AND';
}
}
for($x=0;$x<conta($_GET['ate']);$x++){
if($_GET['propriedade'][$x] && $_GET['ate'][$x]){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $_GET['propriedade'][$x]).'` <= \''.ai($a, $_GET['ate'][$x]).'\' AND';
}
}
}
else {
if($_GET['propriedade'] != '' && $_GET['de'] != ''){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $_GET['propriedade']).'` >= \''.ai($a, $_GET['de']).'\' AND';
}
if($_GET['propriedade'] != '' && $_GET['ate'] != ''){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.ai($a, $_GET['propriedade']).'` <= \''.ai($a, $_GET['ate']).'\' AND';
}
}
for($x=0;$x<conta($_SESSION['subordinacoes']);$x++){
if(in_array($_SESSION['tabela'].'.'.$_SESSION['subordinacoes'][$x], campos_tabela($a, $_SESSION['tabela']))){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`'.$_SESSION['subordinacoes'][$x].'` = \''.ai($a, $_SESSION[$_SESSION['subordinacoes'][$x].'_usuarios']).'\' AND';
}
else if(substr($_SESSION['subordinacoes'][$x], 3, 255) == $_SESSION['tabela']){
$sql_filtro .= ' `'.$_SESSION['tabela'].'`.`id` = \''.ai($a, $_SESSION[$_SESSION['subordinacoes'][$x].'_usuarios']).'\' AND';
}
}
?>
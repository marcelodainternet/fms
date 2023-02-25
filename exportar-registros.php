<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria... 
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if(!$_SESSION['permissao'][$_SESSION['tabela']]['exportar']){
header('Location: ./?sair=true');
exit;
}
$res = mysqli_query_erro($a, $_SESSION['sql']);
if(mysqli_num_rows($res) > 10000){
?>
<p>O arquivo tem muitas linhas, isso poderá travar o servidor! Efetue filtros para dividir o seu relatório em várias partes...</p>
<?php
exit;
}
if($result = mysqli_query_erro($a, $_SESSION['sql'])){
$finfo = mysqli_fetch_fields($result);
foreach($finfo as $val){
if(substr($val->name, 0, 6) != 'label_'){
if(!$_SESSION['id_'.$val->orgtable.'_usuarios']){
$fonte .= '"'.ucwords(str_replace('_', ' ', str_replace(';', '', str_replace('"', '', utf8_decode($val->name))))).'";';
}
}
}
mysqli_free_result($result);
}
$fonte .= '
';
while($campos = mysqli_fetch_array($res)){
if($result = mysqli_query_erro($a, $_SESSION['sql'])){
$finfo = mysqli_fetch_fields($result);
foreach($finfo as $val){
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
$campos[($val->name)] = sql($a, 'SELECT nome AS valor FROM '.ai($a, substr($val->name, 4, 255)).' WHERE id IN('.ai($a, $campos[($val->name)]).')');
}
}
if(substr($val->name, 0, 6) != 'label_'){
if(!$_SESSION['id_'.$val->orgtable.'_usuarios']){
$fonte .= '"'.str_replace(';', '', str_replace('"', '', utf8_decode($campos[($val->name)]))).'";';
}
}
}
mysqli_free_result($result);
}
$fonte .= '
';
}
grava_arquivo('csv/csv.csv', $fonte);
header('Location: csv/csv.csv');
exit;
?>
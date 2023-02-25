<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php');
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$i = 0;
$sql = 'SELECT `'.ai($a, $_GET['propriedade']).'` AS `value`, `'.ai($a, $_GET['propriedade']).'` AS `text` FROM `'.ai($a, $_GET['classe']).'` WHERE'.sql_subordinacao($a, $_GET['classe']).' `'.ai($a, $_GET['propriedade']).'` LIKE\'%'.ai($a, $_POST['q']).'%\' GROUP BY `'.ai($a, $_GET['propriedade']).'` ORDER BY `'.ai($a, $_GET['propriedade']).'` LIMIT 100';
$res = mysqli_query_erro($a, $sql);
while($desenvolvedores = mysqli_fetch_array($res)){
$json[$i]['text'] = $desenvolvedores['text'];
$json[$i]['value'] = $desenvolvedores['value'];
$i++;
}
echo json_encode(array_slice(array_values($json), 0, 100));
?>
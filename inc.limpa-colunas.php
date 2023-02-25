<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
$permissao = $_SESSION['permissao'][$_SESSION['tabela']];
$res2 = mysqli_query_erro($a, $sql_pagina);
$finfo2 = mysqli_fetch_fields($res2);
foreach($finfo2 as $val2){
$_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val2->orgtable]['visualizar'] = 0;
$_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val2->orgtable]['imprimir'] = 0;
$_SESSION['permissao'][$_SESSION['tabela']][$val2->name]['visualizar'] = 0;
$_SESSION['permissao'][$_SESSION['tabela']][$val2->name]['imprimir'] = 0;
}
$res2 = mysqli_query_erro($a, $sql_pagina);
while($tabela = mysqli_fetch_array($res2)) {
$res3 = mysqli_query_erro($a, $sql_pagina);
$finfo3 = mysqli_fetch_fields($res3);
foreach($finfo3 as $val3){
if($tabela[$val3->name] != '' && $tabela[$val3->name] != '0' && $tabela[$val3->name] != '0.0' && $tabela[$val3->name] != '0.00' && $tabela[$val3->name] != '0.000' && $tabela[$val3->name] != '0000-00-00' && $tabela[$val3->name] != '0000-00-00 00:00:00' && $tabela[$val3->name] != '00:00:00'){
if($permissao['id_'.$val3->orgtable]['visualizar']){
$_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val3->orgtable]['visualizar'] = 1; 
}
if($permissao['id_'.$val3->orgtable]['imprimir']){
$_SESSION['permissao'][$_SESSION['tabela']]['id_'.$val3->orgtable]['imprimir'] = 1; 
}
if($permissao[$val3->name]['visualizar']){
$_SESSION['permissao'][$_SESSION['tabela']][$val3->name]['visualizar'] = 1;
}
if($permissao[$val3->name]['imprimir']){
$_SESSION['permissao'][$_SESSION['tabela']][$val3->name]['imprimir'] = 1;
}
}
}
}
?>
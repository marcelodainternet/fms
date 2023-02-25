<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_GET['editar'] && $_SESSION['permissao'][$ttabela]['editar']){
$sql = 'SELECT * FROM '.ai($a, $ttabela).' WHERE'.sql_subordinacao($a, $ttabela).' id = \''.ai($a, $_GET['editar']).'\'';
$res = mysqli_query_erro($a, $sql);
${$ttabela} = mysqli_fetch_array($res);
$_SESSION['registro_original'] = ${$ttabela};
}
else if($_SESSION[$ttabela]['id_'.$_SESSION['pai']]){
${$ttabela}['id_'.$_SESSION['pai']] = $_SESSION[$ttabela]['id_'.$_SESSION['pai']];
$sql = 'SHOW COLUMNS FROM '.ai($a, $_SESSION['pai']).' WHERE Field LIKE\'id_%\'';
$res = mysqli_query($a, $sql);
while($heranca = mysqli_fetch_array($res)){
${$ttabela}[$heranca['Field']] = sql($a, 'SELECT '.ai($a, $heranca['Field']).' AS valor FROM '.ai($a, $_SESSION['pai']).' WHERE id = \''.ai($a, ${$ttabela}['id_'.$_SESSION['pai']]).'\'');
}
}
$ppasta = str_replace('_', '-', $ttabela);
if(is_file($ppasta.'/'.$_GET['remover']) && $_SESSION['permissao'][$ttabela]['editar']){
unlink($ppasta.'/'.$_GET['remover']);
$remover = explode('/', $_GET['remover']);
$ccampo = str_replace('-', '_', $remover[0]);
$sql = 'UPDATE '.ai($a, $ttabela).' SET '.ai($a, $ccampo).' = \'\' WHERE id = \''.ai($a, $_GET['editar']).'\'';
$res = log_mysqli_query($a, $sql);
$_SESSION['log_arquivos'][] = $ppasta.'/'.$_GET['remover'];
log_arquivos($a, 'DELETE');
unset(${$ttabela}[$ccampo]);
}
?>
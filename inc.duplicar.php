<?php
if($_GET['duplicar'] && $_SESSION['permissao'][$ttabela]['duplicar']){
$sql = 'SELECT * FROM `'.ai($a, $ttabela).'` WHERE'.sql_subordinacao($a, $ttabela).' `id` = \''.ai($a, $_GET['duplicar']).'\'';
$res = mysqli_query_erro($a, $sql);
$_POST = mysqli_fetch_array($res);

for($x=0;$x<conta($_SESSION['subordinacoes']);$x++){
unset($_POST[$_SESSION['subordinacoes'][$x]]);
}

}
?>
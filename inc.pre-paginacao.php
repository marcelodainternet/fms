<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_GET['exibir'] == 'agenda'){
$registros_por_pagina = 800;
}
else {
$registros_por_pagina = 80;
}
if(!$_GET['pagina']){ $pc = 1; } else{ $pc = $_GET['pagina']; }
$inicio = $pc-1;
$inicio = $inicio*$registros_por_pagina;
$sql_pagina = $sql.' LIMIT '.ai($a, $inicio).', '.$registros_por_pagina;
$res = mysqli_query_erro($a, $sql_pagina);

$s = explode('FROM', $sql);
$tr = sql($a, 'SELECT COUNT(*) AS valor FROM '.$s[1]);

$tp = ceil($tr/$registros_por_pagina);
$anterior = $pc-1;
$proximo = $pc+1;
if($tr>0){
?>
<div style="margin:15px;"><?php echo $tr ?> registro(s) encontrado(s).</div>
<?php
}
else {
?>
<div class="alert alert-warning" role="alert" style="margin:15px;">Nenhum registro encontrado.</div>
<?php
}
?>
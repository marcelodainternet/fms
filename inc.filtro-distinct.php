<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_SESSION['permissao'][$_GET['tabela']][$filtrar]['filtrar']){
if(!$limite){ $limite = 10; }
if(!is_array($_GET['distinct_'.$filtrar]) && $_GET['distinct_'.$filtrar]){ $_GET['distinct_'.$filtrar] = [$filtrar => $_GET['distinct_'.$filtrar]]; }
if(is_array($_GET['distinct_'.$filtrar])){ $_GET['distinct_'.$filtrar] = array_filter($_GET['distinct_'.$filtrar]); }
$registros = sql($a, 'SELECT COUNT(DISTINCT('.ai($a, $filtrar).')) AS valor FROM '.$_GET['tabela'].' WHERE'.sql_subordinacao($a, $_GET['tabela']).' 1=1');
if($registros > $limite){
if(!conta($_GET['distinct_'.$filtrar])){
$sql_filtro = ' 1=0 AND';
}
else {
for($x=0;$x<conta($_GET['distinct_'.$filtrar]);$x++){
$propriedades[] = ai($a, $filtrar).' = \''.ai($a, $_GET['distinct_'.$filtrar][$x]).'\'';
}
if(is_array($propriedades)){
$sql_filtro = ' ('.implode(' OR ', $propriedades).') AND';
unset($propriedades);
}
}
}
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<select name="distinct_<?php echo $filtrar ?>[]" class="form-control selectpicker<?php if($registros > $limite){ ?> with-ajax<?php } ?>" data-live-search="true" data-abs-ajax-url="ajax.selecao-dinamica-distinct.php?classe=<?php echo $_GET['tabela'] ?>&propriedade=<?php echo $filtrar ?>" multiple size="1" style="opacity: 0.1">
<option value="" selected="selected">Filtrar por <?php echo $filtrar ?></option>
<?php
$sql = 'SELECT DISTINCT('.ai($a, $filtrar).') AS '.ai($a, $filtrar).' FROM '.ai($a, $_GET['tabela']).' WHERE'.sql_subordinacao($a, $_GET['tabela']).$sql_filtro.' 1=1 GROUP BY '.ai($a, $filtrar).' ORDER BY '.ai($a, $filtrar).' LIMIT 100';
unset($sql_filtro);
$res = mysqli_query_erro($a, $sql);
while($tabela = mysqli_fetch_array($res)){
?>
<option value="<?php echo $tabela[$filtrar] ?>" <?php if(is_array($_GET['distinct_'.$filtrar])){ if(in_array($tabela[$filtrar], $_GET['distinct_'.$filtrar])){ ?>selected<?php } } ?>><?php echo $tabela[$filtrar] ?></option>
<?php
}
?>
</select>
</div>
<?php
}
?>
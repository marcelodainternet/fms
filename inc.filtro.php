<?php
if($_SESSION['permissao'][$ttabela]['id_'.$filtrar]['filtrar']){
if(!$_SESSION['id_'.$filtrar.'_usuarios']){
if(!$limite){ $limite = 100; }
if(!is_array($_GET['id_'.$filtrar]) && $_GET['id_'.$filtrar]){ $_GET['id_'.$filtrar] = ['id_'.$filtrar => $_GET['id_'.$filtrar]]; }
if(is_array($_GET['id_'.$filtrar])){ $_GET['id_'.$filtrar] = array_filter($_GET['id_'.$filtrar]); }
if(!$label){ $label = $filtrar; }
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<?php $registros = sql($a, 'SELECT COUNT(*) AS valor FROM '.$filtrar.' WHERE'.sql_subordinacao($a, $filtrar).' 1=1'); ?>
<select name="id_<?php echo $filtrar ?>[]" class="form-control selectpicker<?php if($registros > $limite){ ?> with-ajax<?php } ?>" data-live-search="true" data-abs-ajax-url="ajax.selecao-dinamica.php?classe=<?php echo $filtrar ?>&propriedade=<?php echo $propriedade ?>" multiple size="1" style="opacity: 0.1" <?php if($_GET['id_'.$filtrar]){ ?>data-style=""<?php } ?> multiple data-done-button="true" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option value="" selected="selected"><?php echo $label ?></option>
<?php
if($registros > $limite){
if(!conta($_GET['id_'.$filtrar])){
$sql_filtro = ' 1=0 AND';
}
else {
$ids = implode(', ', $_GET['id_'.$filtrar]);
if($ids){
$sql_filtro = ' id IN('.ai($a, $ids).') AND';
}
}
}
$sql = 'SELECT id, '.ai($a, $propriedade).' FROM '.ai($a, $filtrar).' WHERE'.sql_subordinacao($a, $filtrar).$sql_filtro.' 1=1 GROUP BY '.ai($a, $propriedade).' ORDER BY '.ai($a, $propriedade);
$res = mysqli_query_erro($a, $sql);
while($tabela = mysqli_fetch_array($res)){
?>
<option value="<?php echo $tabela['id'] ?>" <?php if(is_array($_GET['id_'.$filtrar])){ if(in_array($tabela['id'], $_GET['id_'.$filtrar])){ ?>selected<?php } } ?>><?php echo $tabela[$propriedade] ?></option>
<?php
}
?>
</select>
</div>
<?php
}
}
unset($label);
unset($sql_filtro);
?>
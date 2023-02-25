<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(($_SESSION['permissao'][$ttabela]['ids_'.$cclasse]['cadastrar'] && !$_GET['editar']) || ($_SESSION['permissao'][$ttabela]['ids_'.$cclasse]['editar'] && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-12 col-md-12 col-lg-12'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label style="display:block"><?php echo $llabel ?><?php if($_SESSION['permissao'][$cclasse]['visualizar'] && !$_GET['modal']){ ?> <a href="<?php echo str_replace('_', '-', $cclasse); ?>-listar.php"><i class="fas fa-external-link-alt"></i></a><?php } ?></label>
<?php

$sql = 'SHOW COLUMNS FROM '.ai($a, $cclasse);
$res = mysqli_query($a, $sql);
while($tabela = mysqli_fetch_array($res)){
if(in_array($tabela['Field'], $restringir) && ${$ttabela}[$tabela['Field']]){
$sql_filtro .= ' `'.ai($a, $cclasse).'`.`'.ai($a, $tabela['Field']).'` = \''.ai($a, ${$ttabela}[$tabela['Field']]).'\' AND';
}
}

$sql = 'SELECT * FROM '.ai($a, $cclasse).' WHERE'.sql_subordinacao($a, $cclasse).$sql_filtro.' 1=1 ORDER BY id';
$res = mysqli_query_erro($a, $sql);
while($classe = mysqli_fetch_array($res)){
?>
<span style="white-space: nowrap;"><input type="checkbox" name="<?php echo $cclasse ?>[]" id="<?php echo $cclasse ?><?php echo $classe['id'] ?>" value="<?php echo $classe['id'] ?>" <?php if(is_array(explode(', ', $classe['ids_'.$cclasse]))){ if(in_array($classe['id'], explode(', ', ${$ttabela}['ids_'.$cclasse]))){ ?>checked<?php } } ?> <?php if(!$_SESSION['permissao'][$ttabela]['ids_'.$cclasse]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>> <label for="<?php echo $cclasse ?><?php echo $classe['id'] ?>" style="font-weight:normal; margin-right:10px;"><?php echo $classe[$ppropriedade] ?></label></span>
<?php
}
?>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($sql_filtro);
unset($ppropriedade);
?>
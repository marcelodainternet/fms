<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['editar'] || $_SESSION['permissao'][$ttabela]['id_'.$cclasse]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label style="display:block"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?> <?php if($_SESSION['permissao'][$cclasse]['visualizar'] && !$_GET['modal']){ ?><a href="<?php echo str_replace('_', '-', $cclasse); ?>-listar.php"><i class="fas fa-external-link-alt"></i></a><?php } ?></label>
<?php
$sql = 'SELECT * FROM `'.ai($a, $cclasse).'` WHERE'.sql_subordinacao($a, $cclasse).$sql_filtro.' 1=1 ORDER BY '.ai($a, $ppropriedade);
$res = mysqli_query_erro($a, $sql);
while($classe = mysqli_fetch_array($res)){
?>
<input type="radio" <?php if($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['obrigatorio']){ ?>required="required" <?php } ?>name="id_<?php echo $cclasse ?>" id="id_<?php echo $cclasse ?>_<?php echo $classe['id'] ?>" value="<?php echo $classe['id'] ?>" <?php if(${$ttabela}['id_'.$cclasse] == $classe['id']){ ?>checked<?php } ?> <?php if(!$_SESSION['permissao'][$ttabela]['id_'.$cclasse]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>> <label for="id_<?php echo $cclasse ?>_<?php echo $classe['id'] ?>" style="font-weight:normal; margin-right:10px;"><?php echo $classe[$ppropriedade] ?></label>
<?php
}
?>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
unset($sql_filtro);
?>
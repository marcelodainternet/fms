<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<select name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required <?php } ?><?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option></option>
<?php
$estados = array('AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RO','RS','RR','SC','SE','SP','TO');
for($x=0;$x<count($estados);$x++){
?>
<option value="<?php echo $estados[$x] ?>" <?php if(${$ttabela}[$ppropriedade] == $estados[$x]){ ?>selected<?php } ?>><?php echo $estados[$x] ?></option>
<?php
}
?>
</select>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<div>
<?php
$label_nome = array('Cinza','Azul','Verde','Turquesa','Amarelo','Vermelho');
$label_classe = array('default','primary','success','info','warning','danger');
for($x=0;$x<count($label_classe);$x++){
?>
<label for="<?php echo $ppropriedade ?>_<?php echo $label_classe[$x] ?>"><input type="radio" name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>_<?php echo $label_classe[$x] ?>" value="<?php echo $label_classe[$x] ?>" <?php if(${$ttabela}[$ppropriedade] == $label_classe[$x]){ ?>checked<?php } ?> <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>><span class="label label-<?php echo $label_classe[$x] ?>"><?php echo $label_nome[$x] ?></span></label> 
<?php
}
?>
</div>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
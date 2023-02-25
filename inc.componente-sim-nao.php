<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label style="display: block;"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<input type="radio" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>1" value="Sim" <?php if(${$ttabela}[$ppropriedade] == 'Sim'){ ?>checked<?php } ?> <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>> <label for="<?php echo $ppropriedade ?>1" style="font-weight:normal">Sim</label>
<input type="radio" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>2" value="Não" style="margin-left:10px;" <?php if(${$ttabela}[$ppropriedade] != 'Sim'){ ?>checked<?php } ?> <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>> <label for="<?php echo $ppropriedade ?>2" style="font-weight:normal">Não</label>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
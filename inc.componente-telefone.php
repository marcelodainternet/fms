<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<?php $campos_telefone[] = 'id(\''.$ppropriedade.'\').onkeyup = function(){ mascara(this, mtel); }'; ?>
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-phone"></i></span>
<input autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" type="tel" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>class="form-control" id="<?php echo $ppropriedade ?>" placeholder="(00) 00000-0000" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" value="<?php echo htmlentities(${$ttabela}[$ppropriedade]); ?>" maxlength="15" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?> oninvalid="InvalidMsg(this,'Informe o <?php echo $llabel ?> no padrão a seguir: (00) 00000-0000');"/>
</div>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
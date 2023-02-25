<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<input autocomplete="<?php echo rand(); ?>" type="cnpj" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" value="<?php echo ${$ttabela}[$ppropriedade] ?>" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="00.000.000/0000-00" maxlength="18" onBlur="ValidarCNPJ(form1.<?php echo $ppropriedade ?>);" onkeyup="formatar('##.###.###/####-##', this)" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?> oninvalid="InvalidMsg(this,'Informe o <?php echo $llabel ?> no padrão a seguir: 00.000.000/0000-00');"/>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
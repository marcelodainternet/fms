<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<input autocomplete="<?php echo rand(); ?>" type="cpf" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" value="<?php echo ${$ttabela}[$ppropriedade] ?>" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="000.000.000-00" onBlur="if(this.value!=''){if(ValidarCPF(form1.<?php echo $ppropriedade ?>)==false){this.value='';}}" onKeyup="formatar('###.###.###-##', this)" maxlength="14" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?> oninvalid="InvalidMsg(this,'Informe o <?php echo $llabel ?> no padrão a seguir: 000.000.000-00');"/>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
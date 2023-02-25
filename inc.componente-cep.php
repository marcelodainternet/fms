<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?>  <a href="https://buscacepinter.correios.com.br/app/endereco/index.php?t" target="_blank"><i class="fas fa-link"></i> Correios</a></label>
<input autocomplete="<?php echo rand(); ?>" type="cep" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" value="<?php echo htmlentities(${$ttabela}[$ppropriedade]); ?>" pattern="\d{5}-\d{3}" placeholder="00000-000" maxlength="9" onBlur="busca_endereco(this.value)" onkeyup="formatar('#####-###', this)" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?> oninvalid="InvalidMsg(this,'Informe o <?php echo $llabel ?> no padrão a seguir: 00000-000');"/>
<script>
function busca_endereco(cep){
if(cep){
var url = 'ajax.busca-endereco.php?cep='+cep;
$.get(url, function(dataReturn) {
$('#busca_endereco').html(dataReturn);
});
}
}
</script>
<div id="busca_endereco"></div>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
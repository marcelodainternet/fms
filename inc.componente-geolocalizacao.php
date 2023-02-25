<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<div class="input-group">
<span class="input-group-addon"><i class="fas fa-map-marker-alt"></i></span>
<input type="text" autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required="required" <?php } ?>class="form-control" id="<?php echo $ppropriedade ?>" value="<?php echo htmlentities(${$ttabela}[$ppropriedade]); ?>" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?> readonly="readonly"/>
</div>
</div>
</div>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function(){
navigator.geolocation.getCurrentPosition(function(position) {
localizacao = position.coords.latitude+','+position.coords.longitude;
$('#<?php echo $ppropriedade ?>').val(localizacao);
});
});
</script>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
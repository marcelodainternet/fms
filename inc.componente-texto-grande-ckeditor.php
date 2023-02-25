<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-12 col-md-12 col-lg-12'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<?php if(!$ck){ $ck = true; ?><script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script><?php } ?>
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?></label>
<textarea <?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?>required <?php } ?>name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" style="width:100%" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>><?php echo stripslashes(${$ttabela}[$ppropriedade]); ?></textarea>
<script type="text/javascript">
var editor = CKEDITOR.replace('<?php echo $ppropriedade ?>');
CKEDITOR.config.fullPage = false;
</script>
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
?>
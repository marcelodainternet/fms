<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$ppropriedade){ $ppropriedade = prepara_nome($llabel, '_'); }
$classe = str_replace('_', '-', $ttabela);
$arquivo = str_replace('_', '-', $ppropriedade).'/'.${$ttabela}['id'].'.'.${$ttabela}[$ppropriedade];
$url = $classe.'/'.$arquivo;
if(($_SESSION['permissao'][$ttabela][$ppropriedade]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] || $_SESSION['permissao'][$ttabela][$ppropriedade]['visualizar']) && $_GET['editar'])){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<label for="<?php echo $ppropriedade ?>"><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela][$ppropriedade]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?> 
<?php
if(is_file($url)){
if(strtolower(${$ttabela}[$ppropriedade]) == 'jpg' || strtolower(${$ttabela}[$ppropriedade]) == 'jpeg' || strtolower(${$ttabela}[$ppropriedade]) == 'gif' || strtolower(${$ttabela}[$ppropriedade]) == 'png' || strtolower(${$ttabela}[$ppropriedade]) == 'bmp'){
?>
<img src="<?php echo $url ?>" style="max-height:25px; max-width:25px; margin-top:-5px;"/> 
<?php
}
else {
?>
<a href="<?php echo $url ?>" target="_blank"><?php echo $url ?></a> 
<?php
}
?>
<a href="<?php echo $classe ?>-cadastrar.php?editar=<?php echo strip_tags($_GET['editar']); ?>&remover=<?php echo urlencode($arquivo); ?>" title="Remover" onclick="return confirm('Deseja realmente remover este arquivo?')"><i class="far fa-trash-alt"></i></a>
<?php
}
?>
</label>
<input type="file" name="<?php echo $ppropriedade ?>" id="<?php echo $ppropriedade ?>" class="form-control" <?php if(!$_SESSION['permissao'][$ttabela][$ppropriedade]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> <?php echo implode_if_is_array(' ', $pparametros); ?>/>
<input name="arquivo_<?php echo $ppropriedade ?>" type="hidden" id="arquivo_<?php echo $ppropriedade ?>" value="<?php echo ${$ttabela}[$ppropriedade] ?>">
</div>
</div>
<?php
}
unset($pparametros);
unset($ccol);
unset($ppropriedade);
unset($classe);
unset($arquivo);
unset($url);
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
$propriedade = prepara_nome($filtrar, '_');
if($_SESSION['permissao'][$_GET['tabela']][$propriedade]['filtrar']){
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="input-group">
<span class="input-group-addon"><?php echo $filtrar ?></span>
<input autocomplete="<?php echo rand(); ?>" type="datetime-local" name="filtro_de_<?php echo $propriedade ?>" class="form-control" value="<?php echo $_GET['filtro_de_'.$propriedade] ?>" style="width: 50%" title="De">
<input autocomplete="<?php echo rand(); ?>" type="datetime-local" name="filtro_ate_<?php echo $propriedade ?>" class="form-control" value="<?php echo $_GET['filtro_ate_'.$propriedade] ?>" style="width: 50%; border-left: none;" title="Até">
</div>
</div>
<?php
}
unset($filtrar);
unset($propriedade);
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_SESSION['permissao'][$_GET['tabela']][$p1]['filtrar'] && $_SESSION['permissao'][$_GET['tabela']][$p2]['filtrar']){
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="input-group">
<span class="input-group-addon"><?php echo $filtrar ?></span>
<input autocomplete="<?php echo rand(); ?>" type="date" name="filtro_de_<?php echo $p1 ?>" class="form-control" value="<?php echo $_GET['filtro_de_'.$p1] ?>" style="width: 50%" title="De">
<input autocomplete="<?php echo rand(); ?>" type="date" name="filtro_ate_<?php echo $p2 ?>" class="form-control" value="<?php echo $_GET['filtro_ate_'.$p2] ?>" style="width: 50%; border-left: none;" title="Até">
</div>
</div>
<?php
}
unset($filtrar);
unset($p1);
unset($p2);
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_SESSION['permissao'][$_GET['tabela']][$filtrar]['filtrar']){
if(!$llabel){ $llabel = $filtrar; }
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<select name="sn_<?php echo $filtrar ?>" class="form-control selectpicker" data-live-search="true" size="1" style="opacity: 0.1">
<option value="" selected="selected">Filtrar por <?php echo $llabel ?></option>
<option value="Sim" <?php if($_GET['sn_'.$filtrar] == 'Sim'){ ?>selected<?php } ?>>Sim</option>
<option value="Não" <?php if($_GET['sn_'.$filtrar] == 'Não'){ ?>selected<?php } ?>>Não</option>
</select>
</div>
<?php
unset($llabel);
}
?>
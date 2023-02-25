<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option value="Física" <?php if(${$ttabela}[$ppropriedade] == 'Física'){ ?>selected="selected"<?php } ?>>Física</option>
<option value="Jurídica" <?php if(${$ttabela}[$ppropriedade] == 'Jurídica'){ ?>selected="selected"<?php } ?>>Jurídica</option>
</select>
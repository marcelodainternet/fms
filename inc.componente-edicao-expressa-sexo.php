<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option value="Masculino" <?php if(${$ttabela}[$ppropriedade] == 'Masculino'){ ?>selected="selected"<?php } ?>>Masculino</option>
<option value="Feminino" <?php if(${$ttabela}[$ppropriedade] == 'Feminino'){ ?>selected="selected"<?php } ?>>Feminino</option>
</select>
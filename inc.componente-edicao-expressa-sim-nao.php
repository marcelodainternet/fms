<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option value="Sim" <?php if(${$ttabela}[$ppropriedade] == 'Sim'){ ?>selected="selected"<?php } ?>>Sim</option>
<option value="Não" <?php if(${$ttabela}[$ppropriedade] == 'Não'){ ?>selected="selected"<?php } ?>>Não</option>
</select>
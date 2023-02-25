<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<input type="datetime-local" autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" value="<?php if(${$ttabela}[$ppropriedade] != '0000-00-00 00:00:00'){ echo str_replace(' ', 'T', substr(${$ttabela}[$ppropriedade], 0, 16)); } ?>" maxlength="16" <?php echo implode_if_is_array(' ', $pparametros); ?>/>
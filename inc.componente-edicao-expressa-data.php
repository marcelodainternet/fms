<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<input type="date" autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" value="<?php if(${$ttabela}[$ppropriedade] != '0000-00-00'){ echo ${$ttabela}[$ppropriedade]; } ?>" maxlength="10" <?php echo implode_if_is_array(' ', $pparametros); ?>/>
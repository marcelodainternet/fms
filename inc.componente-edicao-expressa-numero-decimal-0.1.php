<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<input type="number" step="0.1" autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" value="<?php echo htmlentities(${$ttabela}[$ppropriedade]); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>/>
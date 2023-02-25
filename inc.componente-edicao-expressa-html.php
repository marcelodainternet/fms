<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<textarea name="<?php echo $ppropriedade ?>" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" class="form-control input-sm" <?php echo implode_if_is_array(' ', $pparametros); ?>><?php echo htmlentities(${$ttabela}[$ppropriedade]); ?></textarea>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<input type="text" autocomplete="<?php echo rand(); ?>" name="<?php echo $ppropriedade ?>" class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" value="<?php if(${$ttabela}[$ppropriedade] > 0){ echo number_format(${$ttabela}[$ppropriedade], 2, ',', '.'); } ?>" onkeyup="mascara_moeda(this);" <?php echo implode_if_is_array(' ', $pparametros); ?>/>
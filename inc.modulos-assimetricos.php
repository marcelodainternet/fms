<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(!$bloco){ $bloco++; }
if(is_int($bloco/4) && $bloco > 0){ ?>
<div style="clear:both" class="q3"></div>
<?php } if(is_int($bloco/3)){ ?>
<div style="clear:both" class="q4"></div>
<?php } if(is_int($bloco/2)){ ?>
<div style="clear:both" class="q6"></div>
<?php }
$bloco++;
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option></option>
<?php
$estados_civis = array('Solteiro(a)','Casado(a)','Divorciado(a)','Viúvo(a)','União estável');
for($x=0;$x<count($estados_civis);$x++){
?>
<option value="<?php echo $estados_civis[$x] ?>" <?php if(${$ttabela}[$ppropriedade] == $estados_civis[$x]){ ?>selected="selected"<?php } ?>><?php echo $estados_civis[$x] ?></option>
<?php
}
?>
</select>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option></option>
<?php
$estados = array('AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RO','RS','RR','SC','SE','SP','TO');
for($x=0;$x<count($estados);$x++){
?>
<option value="<?php echo $estados[$x] ?>" <?php if(${$ttabela}[$ppropriedade] == $estados[$x]){ ?>selected="selected"<?php } ?>><?php echo $estados[$x] ?></option>
<?php
}
?>
</select>
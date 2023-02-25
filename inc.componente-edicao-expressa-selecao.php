<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
$cclasse = strip_tags($_GET['campo']);
?>
<select class="form-control input-sm" id="<?php echo strip_tags($ppropriedade.$_GET['id']); ?>" <?php echo implode_if_is_array(' ', $pparametros); ?>>
<option></option>
<?php
$sql = 'SELECT id, '.$ppropriedade.' FROM `'.ai($a, $cclasse).'` WHERE'.sql_subordinacao($a, $cclasse).' 1=1 ORDER BY '.ai($a, $ppropriedade);
$res = mysqli_query_erro($a, $sql);
while($classe = mysqli_fetch_array($res)){
?>
<option value="<?php echo $classe['id'] ?>" <?php if(${$ttabela}['id_'.$cclasse] == $classe['id']){ ?>selected<?php } ?>><?php echo $classe[$ppropriedade] ?></option>
<?php
}
?>
</select>
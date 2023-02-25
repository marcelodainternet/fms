<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
require_once('inc.verifica.php'); 
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
if(!$_GET['item']){ $_GET['item'] = 1; }
for($x=0;$x<conta($_GET['propriedade']);$x++){
if($_GET['propriedade'][$x]){ $itens++; }
}
if($itens < 1){ $itens = 1; } else { $itens++; }
for($x=0;$x<$itens;$x++){
$item++;
?>
<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco">
<div class="input-group" title="Filtrar por Propriedade">
<select name="propriedade[]" class="form-control" style="width: 50%">
<option value="" selected="selected">Filtrar por Propriedade</option>
<?php
$sql = 'SHOW COLUMNS FROM '.ai($a, $_GET['tabela']);
$res = mysqli_query($a, $sql);
while($tabela = mysqli_fetch_array($res)){
?>
<option value="<?php echo $tabela['Field'] ?>"<?php if($tabela['Field'] == $_GET['propriedade'][$x]){ ?> selected="selected"<?php } ?>><?php echo $tabela['Field'] ?></option>
<?php
}
?>
</select>
<input type="text" name="de[]" value="<?php echo strip_tags($_GET['de'][$x]); ?>" class="form-control" aria-describedby="basic-addon3" style="width: 25%; border-left: none;" title="De" placeholder="De">
<input type="text" name="ate[]" value="<?php echo strip_tags($_GET['ate'][$x]); ?>" class="form-control" aria-describedby="basic-addon3" style="width: 25%; border-left: none;" title="Até" placeholder="Até">
<span class="input-group-btn">
<button class="btn btn-default" type="button" onclick="filtro_propriedade('<?php echo strip_tags($_GET['tabela']); ?>', <?php echo strip_tags($_GET['item']+1); ?>);"><i class="fas fa-plus"></i></button>
</span>
</div>
</div>
<div id="propriedades<?php echo strip_tags($_GET['item']+1); ?>"></div>
<?php } ?>
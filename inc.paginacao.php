<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($permissao){
$_SESSION['permissao'][$_SESSION['tabela']] = $permissao;
unset($permissao);
}
if($tp>1){
?>
<div style="clear:both"></div>
<div style="margin:15px;">
<div style="height:50px; float:left; margin-right:5px;">
<nav>
<ul class="pagination" style="margin:0px; padding:0px;">
<?php if($pc>1){ ?>
<li><a href="<?php echo $url ?>order=<?php echo strip_tags($_GET['order']); ?>&by=<?php echo strip_tags($_GET['by']); ?>&pagina=<?php echo $anterior ?>" title="Página Anterior"><span aria-hidden="true">&laquo;</span> Anterior</a></li>
<?php } ?>
<li><a href="#"><?php echo $pc ?> / <?php echo $tp ?></a></li>
<?php if($pc<$tp){ ?>
<li><a href="<?php echo $url ?>order=<?php echo strip_tags($_GET['order']); ?>&by=<?php echo strip_tags($_GET['by']); ?>&pagina=<?php echo $proximo ?>" title="Próxima Página">Próxima <span aria-hidden="true">&raquo;</span></a></li>
<?php } ?>
</ul>
</nav>
</div>
<div style="width:190px; height:50px; float:left;">
<form action="" method="get" name="form1" id="form1">
<div class="input-group">
<?php
$v = array_keys($_GET);
for($x=0;$x<conta($v);$x++){
if($v[$x] != 'pagina'){
if(is_array($_GET[$v[$x]])){
for($y=0;$y<=count($_GET[$v[$x]]);$y++){
?>
<input type="hidden" name="<?php echo $v[$x]; ?>[]" value="<?php echo $_GET[$v[$x]][$y]; ?>"> 
<?php
}
}
else {
?>
<input type="hidden" name="<?php echo $v[$x]; ?>" value="<?php echo $_GET[$v[$x]]; ?>"> 
<?php
}
}
}
?>
<input type="number" name="pagina" class="form-control" placeholder="Ir para a página" min="1" max="<?php echo $tp ?>">
<span class="input-group-btn">
<button class="btn btn-default" type="submit">OK</button>
</span>
</div>
</form>
</div>
</div>
<div style="clear:both"></div>
<?php
}
else {
if(is_array($totais)){
?>
<div style="clear:both"></div>
<div style="margin:15px;">
<?php
$totais = array_values(array_unique($totais));
for($x=0;$x<conta($totais);$x++){
?>
<strong><?php echo ucwords($totais[$x]); ?> total R$ <?php echo number_format($total[$totais[$x]], 2, ',', '.'); ?></strong> 
<?php
}
?>
</div>
<?php
}
}
?>
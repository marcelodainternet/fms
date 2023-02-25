<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if($_SESSION[$ttabela]['id_'.$_SESSION['pai']]){
?>
<?php echo $_SESSION[$ttabela]['nome_'.$_SESSION['pai']]; ?> <a href="<?php echo str_replace('_', '-', $ttabela); ?>-listar.php?todos=true" style="margin-left:10px;"><i class="fas fa-times-circle"></i></a>
<?php
}
else {
?>
<a href="graficos.php?tabela=<?php echo $ttabela ?>" style="margin-left:10px;"><i class="fas fa-chart-area"></i> Gráficos</a>
<?php
}
?>
<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
?>
<div style="text-align:right; margin-bottom:15px;">
<?php if($_SESSION['permissao'][$ttabela]['importar']){ ?>
<a href="importar-registros.php?tabela=<?php echo $ttabela ?>" title="Importar CSV" class="btn btn-primary btn-xs" style="margin-top:15px;"><i class="far fa-file-excel"></i> Importar</a> 
<?php } ?>
<?php if($_SESSION['permissao'][$ttabela]['exportar']){ ?>
<a href="exportar-registros.php" title="Exportar CSV" class="btn btn-primary btn-xs" target="_blank" style="margin-top:15px;"><i class="far fa-file-excel"></i> Exportar</a> 
<?php } ?>
<?php if($_SESSION['permissao'][$ttabela]['imprimir']){ ?>
<a href="imprimir-registros.php" title="Imprimir" class="btn btn-primary btn-xs" target="_blank" style="margin-top:15px;"><i class="fas fa-print"></i> Imprimir</a>
<?php } ?>
<?php if($_SESSION['permissao'][$ttabela]['pdf']){ ?>
<a href="imprimir-registros.php?pdf=true" title="Gerar PDF" class="btn btn-primary btn-xs" target="_blank" style="margin-top:15px;"><i class="far fa-file-pdf"></i> PDF</a>
<?php } ?>
</div>
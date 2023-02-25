<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
$modal = $_GET['modal'].$_POST['modal'];	
?>
<ol class="breadcrumb">
<li><a href="<?php if($modal){ echo '#'; } else { echo 'inicial.php'; } ?>">Inicial</a></li>
<?php
$voltar = conta($_SESSION['voltar_arquivo'])-2;
if($_SESSION['voltar_arquivo'][$voltar]){
?>
<li><a href="<?php if($modal){ echo '#'; } else { echo $_SESSION['voltar_arquivo'][$voltar]; } ?>">Voltar Para <strong><?php echo $_SESSION['voltar_classe'][$voltar] ?></strong></a></li>
<?php
}
?>
<li class="active">Cadastro de "<?php echo $cclasse ?>"</li>
</ol>
<ul class="nav nav-tabs">
<?php if($_SESSION['permissao'][$ttabela]['cadastrar']){ ?>
<li role="presentation" <?php if($aambiente == 'cadastrar'){ ?>class="active"<?php } ?>><a href="<?php if($modal){ echo '#'; } else { echo $aarquivo.'-cadastrar.php'; } ?>" id="cadastrar">Cadastrar</a></li>
<?php } ?>
<li role="presentation" <?php if($aambiente == 'listar' && $_GET['exibir'] == 'tabular'){ ?>class="active"<?php } ?>><a href="<?php if($modal){ echo '#'; } else { echo $aarquivo.'-listar.php?exibir=tabular'; } ?>" title="Tabular"><i class="fas fa-th-list"></i> Listar</a></li>
<li role="presentation" <?php if($aambiente == 'listar' && $_GET['exibir'] == 'modular'){ ?>class="active"<?php } ?>><a href="<?php if($modal){ echo '#'; } else { echo $aarquivo.'-listar.php'; } ?>" title="Modular"><i class="fas fa-th-large"></i> Listar</a></li>
<?php if(primeiro_campo_data($a, $ttabela)){ ?>
<li role="presentation"<?php if($aambiente == 'listar' && $_GET['exibir'] == 'agenda'){ ?> class="active"<?php } ?>><a href="<?php if($modal){ echo '#'; } else { echo $aarquivo.'-listar.php?exibir=agenda'; } ?>" title="Agenda"><i class="far fa-calendar-alt"></i></a></li>
<?php } ?>
</ul>
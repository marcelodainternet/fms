<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
if(($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['cadastrar'] && !$_GET['editar']) || (($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['editar'] || $_SESSION['permissao'][$ttabela]['id_'.$cclasse]['visualizar']) && $_GET['editar'])){ ?>
<?php if(!$_SESSION['id_'.$cclasse.'_usuarios'] && (${$ttabela}['id_'.$cclasse] || !$_SESSION['permissao'][$ttabela]['id_'.$cclasse]['ocultar'] || $_SESSION['pai'] == $cclasse || $_SESSION['id_pperfis'] == 1)){
if(!$ccol){ $ccol = 'col-xs-12 col-sm-6 col-md-4 col-lg-3'; }
?>
<div class="<?php echo $ccol ?> bloco">
<div class="well">
<?php
if(!$llimite){ $llimite = 10; }
$registros = sql($a, 'SELECT COUNT(*) AS valor FROM '.$cclasse.' WHERE'.sql_subordinacao($a, $cclasse).' 1=1');
?>
<label><?php echo $llabel ?><?php if($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['obrigatorio']){ ?> <i class="fas fa-asterisk"></i><?php } ?> <?php if($_SESSION['permissao'][$cclasse]['cadastrar']){ ?><a href="#" data-toggle="modal" data-target="#myModal<?php echo $cclasse ?>" onclick="$('#iframe_<?php echo str_replace('_', '-', $cclasse); ?>').attr('src', '<?php echo str_replace('_', '-', $cclasse); ?>-cadastrar.php?modal=true');"><i class="fas fa-external-link-square-alt"></i> Novo</a><?php } ?></label>
<select name="id_<?php echo $cclasse ?>" id="id_<?php echo $cclasse ?>" class="form-control selectpicker<?php if($registros > $llimite){ ?> with-ajax<?php } ?>" data-live-search="true" <?php if($_SESSION['permissao'][$ttabela]['id_'.$cclasse]['obrigatorio']){ ?>required <?php } ?><?php if(!$_SESSION['permissao'][$ttabela]['id_'.$cclasse]['editar'] && $_GET['editar']){ ?>disabled <?php } ?> data-abs-ajax-url="ajax.selecao-dinamica<?php echo $url_especifica ?>.php?classe=<?php echo $cclasse ?>&propriedade=<?php echo $ppropriedade ?>" <?php echo implode_if_is_array(' ', $pparametros); ?> data-dropup-auto="false">
<option></option>
<?php
if($registros > $llimite){
$sql_filtro = ' `'.ai($a, $cclasse).'`.`id` = \''.ai($a, ${$ttabela}['id_'.$cclasse]).'\' AND';
}

$sql = 'SHOW COLUMNS FROM '.ai($a, $cclasse);
$res = mysqli_query($a, $sql);
while($tabela = mysqli_fetch_array($res)){
if(in_array($tabela['Field'], $restringir) && ${$ttabela}[$tabela['Field']]){
$sql_filtro .= ' `'.ai($a, $cclasse).'`.`'.ai($a, $tabela['Field']).'` = \''.ai($a, ${$ttabela}[$tabela['Field']]).'\' AND';
}
}

if(!$sql_campos){ $sql_campos = '`'.ai($a, $cclasse).'`.`id`, '.$ppropriedade; }
if(!$order_by){ $order_by = '`'.ai($a, $cclasse).'`.`'.ai($a, $ppropriedade).'`'; }
$sql = 'SELECT '.$sql_campos.' FROM `'.ai($a, $cclasse).'` '.$sql_left_join.' WHERE'.sql_subordinacao($a, $cclasse).$sql_filtro.' 1=1 ORDER BY '.$order_by;
$res = mysqli_query_erro($a, $sql);
while($classe = mysqli_fetch_array($res)){
?>
<option value="<?php echo $classe['id'] ?>" <?php if(${$ttabela}['id_'.$cclasse] == $classe['id']){ ?>selected<?php } ?> style="white-space: normal;"><?php echo $classe[$ppropriedade] ?></option>
<?php
}
?>
</select>
<?php if($_SESSION['permissao'][$cclasse]['cadastrar']){ ?>
<div class="modal fade" id="myModal<?php echo $cclasse ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Cadastro Expresso</h4>
</div>
<div class="modal-body" style="padding-left: 0px; padding-right: 0px; ">
<iframe id="iframe_<?php echo str_replace('_', '-', $cclasse); ?>" src="" frameborder="0" style="width: 100%; height: 650px;"></iframe>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<?php
}
}
unset($pparametros);
unset($ccol);
unset($llimite);
unset($sql_filtro);
unset($url_especifica);
unset($sql_campos);
unset($ppropriedade);
unset($order_by);
unset($sql_left_join);
?>
<?php// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria... require_once('inc.verifica.php');require_once('inc.iconnect.php');require_once('inc.funcoes.php');if(!$_SESSION['permissao'][$_GET['tabela']]['visualizar']){header('Location: ./?sair=true');exit;}$tipos[] = 'Linhas';$tipos[] = 'Barras';$tipos[] = 'Area';if(!$_GET['tipo']){$_GET['tipo'] = $tipos[rand(0,2)];}$frequencia[] = 'Diário';$frequencia[] = 'Mensal';$frequencia[] = 'Anual';if(!$_GET['frequencia']){$_GET['frequencia'] = $frequencia[rand(0,2)];}if(!$_GET['filtro_de'] && !$_GET['filtro_ate']){if($_GET['frequencia'] == 'Diário'){$_GET['filtro_de'] = date('Y-m-d', mktime(0,0,0,date('n'),date('j')-10,date('Y')));$_GET['filtro_ate'] = date('Y-m-d', mktime(0,0,0,date('n'),date('j'),date('Y')));}else if($_GET['frequencia'] == 'Mensal'){$_GET['filtro_de'] = date('Y-m-d', mktime(0,0,0,date('n')-6,date('j'),date('Y')));$_GET['filtro_ate'] = date('Y-m-d', mktime(0,0,0,date('n'),date('j'),date('Y')));}else if($_GET['frequencia'] == 'Anual'){$_GET['filtro_de'] = date('Y-m-d', mktime(0,0,0,date('n'),date('j'),date('Y')-5));$_GET['filtro_ate'] = date('Y-m-d', mktime(0,0,0,date('n'),date('j'),date('Y')));}}if(is_array($_GET['r'])){ $_GET['r'] = array_values(array_filter($_GET['r'])); }if(!$_GET['r']){$sql = 'SHOW COLUMNS FROM '.ai($a, $_GET['tabela']).' WHERE TYPE = \'date\' OR TYPE = \'timestamp\' OR TYPE = \'datetime\'';$res = mysqli_query_erro($a, $sql);while($c = mysqli_fetch_array($res)){$_GET['r'][] = $_GET['tabela'].'.'.$c['Field'];}$sql = 'SHOW TABLES';$res = mysqli_query($a, $sql);while($t = mysqli_fetch_array($res)){$sql2 = 'SHOW COLUMNS FROM '.ai($a, $t['Tables_in_'.$base]).' WHERE Field LIKE\'id_%\'';$res2 = mysqli_query($a, $sql2);while($c = mysqli_fetch_array($res2)){if($c['Field'] == 'id_'.$_GET['tabela']){$sql3 = 'SHOW COLUMNS FROM '.ai($a, $t['Tables_in_'.$base]).' WHERE TYPE = \'date\' OR TYPE = \'timestamp\' OR TYPE = \'datetime\'';$res3 = mysqli_query_erro($a, $sql3);while($c = mysqli_fetch_array($res3)){$_GET['r'][] = $t['Tables_in_'.$base].'.'.$c['Field'];}}}}}$de = explode('-', $_GET['filtro_de']);$ate = explode('-', $_GET['filtro_ate']);$_SESSION['tabela'] = $_GET['tabela'];include('inc.sql-filtro.php');$sql_filtro = str_replace('`'.ai($a, $_GET['tabela']).'`.`', '', $sql_filtro);$sql_filtro = str_replace('`', '', $sql_filtro);if($_GET['frequencia'] == 'Diário'){$valores1[0][] = 'Dias';for($x=0;$x<conta($_GET['r']);$x++){$valores1[0][] = $_GET['r'][$x];}$diferenca = ceil((mktime(0,0,0,$ate[1],$ate[2],$ate[0])-mktime(0,0,0,$de[1],$de[2],$de[0]))/60/60/24);for($x=$diferenca;$x>0;$x--){$dia = date('Y-m-d', mktime(0,0,0,$ate[1],$ate[2]-$x,$ate[0]));$linha++;$valores1[$linha][] = '\''.data_brasil($dia).'\'';for($y=1;$y<conta($valores1[0]);$y++){$t = explode('.', $valores1[0][$y]);$valores1[$linha][] = sql($a, 'SELECT COUNT(*) AS valor FROM '.ai($a, $t[0]).' WHERE'.$sql_filtro.' '.ai($a, $t[1]).' LIKE\''.$dia.'%\'');}}}else if($_GET['frequencia'] == 'Mensal'){$valores1[0][] = 'Meses';for($x=0;$x<conta($_GET['r']);$x++){$valores1[0][] = $_GET['r'][$x];}$diferenca = ceil((mktime(0,0,0,$ate[1],$ate[2],$ate[0])-mktime(0,0,0,$de[1],$de[2],$de[0]))/60/60/24/30);for($x=$diferenca;$x>0;$x--){$mes_mysql = date('Y-m', mktime(0,0,0,$ate[1]-$x,$ate[2],$ate[0]));$mes_brasil = date('m/Y', mktime(0,0,0,$ate[1]-$x,$ate[2],$ate[0]));$linha++;$valores1[$linha][] = '\''.$mes_brasil.'\'';for($y=1;$y<conta($valores1[0]);$y++){$t = explode('.', $valores1[0][$y]);$valores1[$linha][] = sql($a, 'SELECT COUNT(*) AS valor FROM '.ai($a, $t[0]).' WHERE'.$sql_filtro.' '.ai($a, $t[1]).' LIKE\''.$mes_mysql.'%\'');}}}else if($_GET['frequencia'] == 'Anual'){unset($linha);$valores1[0][] = 'Anos';for($x=0;$x<conta($_GET['r']);$x++){$valores1[0][] = $_GET['r'][$x];}$diferenca = ceil((mktime(0,0,0,$ate[1],$ate[2],$ate[0])-mktime(0,0,0,$de[1],$de[2],$de[0]))/60/60/24/30/12);for($x=$diferenca;$x>0;$x--){$ano = date('Y', mktime(0,0,0,$ate[1],$ate[2],$ate[0]-$x));$linha++;$valores1[$linha][] = '\''.$ano.'\'';for($y=1;$y<conta($valores1[0]);$y++){$t = explode('.', $valores1[0][$y]);$valores1[$linha][] = sql($a, 'SELECT COUNT(*) AS valor FROM '.ai($a, $t[0]).' WHERE'.$sql_filtro.' '.ai($a, $t[1]).' LIKE\''.$ano.'%\'');}}}?><!doctype html><html><head><?php$ttitulo = 'Gráficos';include('inc.head.php');?><script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script></head><body><?phpinclude('inc.menu.php');?><div class="jumbotron"><div class="container"><h1>Gráficos</h1><p><a href="graficos.php?tabela=<?php echo strip_tags($_GET['tabela']); ?>"><i class="fas fa-sync"></i> Aleatório</a></p></div></div><div class="container"><ol class="breadcrumb"><li><a href="inicial.php">Inicial</a></li><li class="active">Gráficos</li></ol><div class="row"><form id="form1" name="form1" method="get" action="graficos.php"><input type="hidden" name="tabela" value="<?php echo strip_tags($_GET['tabela']); ?>"><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><select name="tipo" id="tipo" class="form-control"><option value="" selected="selected">Tipo de Gráfico</option><?phpfor($x=0;$x<conta($tipos);$x++){?><option value="<?php echo $tipos[$x] ?>" <?php if($_GET['tipo'] == $tipos[$x]){ ?>selected<?php } ?>><?php echo $tipos[$x] ?></option><?php}?></select></div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><select name="frequencia" id="tipo" class="form-control"><option value="" selected="selected">Frequência</option><option value="Diário" <?php if($_GET['frequencia'] == 'Diário'){ ?>selected<?php } ?>>Diário</option><option value="Mensal" <?php if($_GET['frequencia'] == 'Mensal'){ ?>selected<?php } ?>>Mensal</option><option value="Anual" <?php if($_GET['frequencia'] == 'Anual'){ ?>selected<?php } ?>>Anual</option></select></div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><div class="input-group" title="De"><span class="input-group-addon" id="basic-addon3"><i class="far fa-calendar-alt"></i> de</span><input type="date" name="filtro_de" class="form-control" value="<?php echo $_GET['filtro_de'] ?>" aria-describedby="basic-addon3"></div></div><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><div class="input-group" title="Até"><span class="input-group-addon" id="basic-addon3"><i class="far fa-calendar-alt"></i> até</span><input type="date" name="filtro_ate" class="form-control" value="<?php echo $_GET['filtro_ate'] ?>" aria-describedby="basic-addon3"></div></div><?phpfor($x=0;$x<conta($_GET['r']);$x++){?><div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 bloco"><div class="input-group"><select name="r[]" class="form-control"><option></option><option value="<?php echo $_GET['r'][$x] ?>" <?php if(in_array($_GET['r'][$x], $_GET['r'])){ ?>selected<?php } ?>><?php echo $_GET['r'][$x] ?></option></select><span class="input-group-btn"><button class="btn btn-default" type="submit"><i class="fas fa-check"></i></button></span></div></div><?php}?><div style="clear:both"></div></form></div><?php if($_GET['tipo'] == 'Linhas'){ ?><script type="text/javascript">google.charts.load('current', {'packages':['corechart']});google.charts.setOnLoadCallback(drawChart);function drawChart() {var data = google.visualization.arrayToDataTable([<?phpunset($linhas);for($x=0;$x<conta($valores1);$x++){if($x==0){$linhas[] = '[\''.implode('\', \'', $valores1[$x]).'\']';}else {$linhas[] = '['.implode(', ', $valores1[$x]).']';}}echo implode(',', $linhas).']);';?>var options = {curveType: 'function',legend: { position: 'bottom' }};var chart = new google.visualization.LineChart(document.getElementById('g1'));chart.draw(data, options);}</script><?php } else if($_GET['tipo'] == 'Barras'){ ?><script type="text/javascript">google.charts.load('current', {packages: ['corechart', 'bar']});google.charts.setOnLoadCallback(drawTitleSubtitle);function drawTitleSubtitle() {var data = google.visualization.arrayToDataTable([<?phpunset($linhas);for($x=0;$x<conta($valores1);$x++){if($x==0){$linhas[] = '[\''.implode('\', \'', $valores1[$x]).'\']';}else {$linhas[] = '['.implode(', ', $valores1[$x]).']';}}echo implode(',', $linhas).']);';?>var options = {bars: 'horizontal'};var material = new google.charts.Bar(document.getElementById('g1'));material.draw(data, options);}</script><?php } else if($_GET['tipo'] == 'Area'){ ?><script type="text/javascript">google.charts.load('current', {'packages':['corechart']});google.charts.setOnLoadCallback(drawChart);function drawChart() {var data = google.visualization.arrayToDataTable([<?phpunset($linhas);for($x=0;$x<conta($valores1);$x++){if($x==0){$linhas[] = '[\''.implode('\', \'', $valores1[$x]).'\']';}else {$linhas[] = '['.implode(', ', $valores1[$x]).']';}}echo implode(',', $linhas).']);';?>var options = {};var chart = new google.visualization.AreaChart(document.getElementById('g1'));chart.draw(data, options);}</script><?php } ?><div style="height:20px;"></div><div id="g1" style="width:100%; height:600px"></div><div style="clear:both"></div> <?php include('inc.rodape.php'); ?></div></body></html>
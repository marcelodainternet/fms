<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
function primeiro_campo_nativo($a, $tabela){
if(!$_SESSION['primeiro_campo'][$tabela]){
$sql = 'SHOW COLUMNS FROM '.ai($a, $tabela).' WHERE Field <> \'id\' AND Field NOT LIKE \'id\_%\' AND Type IN(\'varchar(255)\', \'varchar(256)\', \'int(11)\', \'date\', \'longtext\')';
$res = mysqli_query($a, $sql);
while($t = mysqli_fetch_array($res)){
if($t['Type'] == 'varchar(255)' || $t['Type'] == 'varchar(256)'){
$campo[] = $t['Field'];
}
if($t['Type'] == 'int(11)'){
$campo[] = $t['Field'];
}
if($t['Type'] == 'date'){
$campo[] = $t['Field'];
}
if($t['Type'] == 'longtext'){
$campo[] = $t['Field'];
}
}
$_SESSION['primeiro_campo'][$tabela] = $campo[0];
}
return $_SESSION['primeiro_campo'][$tabela];
}
function conta($var){
if(is_array($var)){
return count($var);
}
else {
return false;
}
}
function coordenadas($endereco, $key){
$url = 'https://maps.googleapis.com/maps/api/geocode/json?key='.$key.'&address='.urlencode($endereco);
$json = file_get_contents($url);
$json = json_decode($json);
$coordenadas['latitude'] = $json->results[0]->geometry->location->lat;
$coordenadas['longitude'] = $json->results[0]->geometry->location->lng;
return $coordenadas;
}
function data_para_mktime($data){
$d = explode('-', $data);
$mktime = mktime(0,0,0,$d[1],$d[2],$d[0]);
return $mktime;
}
function capturar_cnpj($cnpj){
$cnpj = preg_replace('/\D/', '', $cnpj);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$cnpj);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$dados = curl_exec($ch);
curl_close($ch);
$dados = json_decode($dados);
return $dados;
}
function edicao_expressa_relacionamento($tabela,$campo,$componente,$registro,$nome,$primeiro_campo,$busca=''){
if(!$busca){ $busca = $registro[$nome]; }
if($_SESSION['permissao'][$tabela]['id_'.$campo]['edicaoexpressa']){
echo '<span id="'.$campo.'_'.$registro['id'].'" ondblclick="carrega_edicao_expressa_relacionamento(\''.$tabela.'\',\''.$campo.'\',\''.$componente.'\','.$registro['id'].',\''.$nome.'\',\''.$primeiro_campo.'\');">'.$registro[$nome];
if($_SESSION['permissao'][$campo]['visualizar']){
echo ' <a href="'.str_replace('_', '-', $campo).'-listar.php?busca='.urlencode($busca).'"><i class="fas fa-external-link-alt"></i></a>';
}
echo '</span>';
}
else {
echo $registro[$nome];
if($_SESSION['permissao'][$campo]['visualizar']){
echo ' <a href="'.str_replace('_', '-', $campo).'-listar.php?busca='.urlencode($busca).'"><i class="fas fa-external-link-alt"></i></a>';
}
}
}
function log_mysqli_query($base, $sql){
$sql = str_replace('\r\n', '
', $sql);
$parametros = '$_GET: '.serialize($_GET).PHP_EOL;
$parametros .= '$_POST: '.serialize($_POST).PHP_EOL;
$session = $_SESSION; unset($session['swp_permissao']); unset($session['permissao']); unset($session['sql']);
$parametros .= '$_SESSION: '.serialize($session).PHP_EOL;
$parametros .= '$_COOKIE: '.serialize($_COOKIE).PHP_EOL;
$parametros .= '$_FILES: '.serialize($_FILES).PHP_EOL;
$res = mysqli_query_erro($base, 'INSERT INTO llogs SET id_usuarios = \''.ai($base, $_SESSION['id_usuarios']).'\', ip = \''.ai($base, $_SERVER['REMOTE_ADDR']).'\', url = \''.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'\', arquivos = \'\', data_hora = CURRENT_TIMESTAMP(3), sql_executado = \''.ai($base, $sql, true).'\', parametros = \''.ai($base, $parametros, true).'\'');
$_SESSION['id_logs'] = mysqli_insert_id($base);
return mysqli_query_erro($base, $sql);
}
function arquivos_em_ordem($pasta){
$Dir = opendir($pasta);
while(false !== ($Arq = readdir($Dir))) {
if($Arq != '.' && $Arq != '..'){
$arquivos[] = $Arq;
}
}
closedir($Dir);
sort($arquivos);
return $arquivos;
}
function sql_subordinacao($a, $tabela){
for($x=0;$x<conta($_SESSION['subordinacoes']);$x++){
$sql = 'SHOW COLUMNS FROM '.ai($a, $tabela).' WHERE Field = \''.$_SESSION['subordinacoes'][$x].'\'';
$res = mysqli_query($a, $sql);
if(mysqli_num_rows($res)){
$sql_filtro .= ' `'.$tabela.'`.`'.$_SESSION['subordinacoes'][$x].'` = \''.ai($a, $_SESSION[$_SESSION['subordinacoes'][$x].'_usuarios']).'\' AND';
}
}
return $sql_filtro;
}
function apaga_arquivos($a, $classe, $id, $salt=''){
$sql = 'DESC '.ai($a, prepara_nome($classe, '_'));
$res = mysqli_query($a, $sql);
while($desc = mysqli_fetch_array($res)){
if($desc['Type'] == 'char(4)'){
$arquivo = sql($a, 'SELECT '.$desc['Field'].' AS valor FROM '.ai($a, prepara_nome($classe, '_')).' WHERE id = \''.ai($a, $id).'\'');
$apagar = prepara_nome($classe, '-').'/'.str_replace('_', '-', $desc['Field']).'/'.$id.'.'.$arquivo;
if(is_file($apagar)){ unlink($apagar); $_SESSION['log_arquivos'][] = $apagar; }
$apagar = prepara_nome($classe, '-').'/'.str_replace('_', '-', $desc['Field']).'/'.$id.'-'.hash('sha512', $salt.$id).'.'.$arquivo;
if(is_file($apagar)){ unlink($apagar); $_SESSION['log_arquivos'][] = $apagar; }
}
}
}
function grava_e_redimensiona_arquivo($origem, $destino, $maximo){
if(is_file($destino)){
unlink($destino);
}
$pastas = explode('/', $destino);
for($x=0;$x<conta($pastas)-1;$x++){
if(!is_dir($base.$pastas[$x])){ mkdir($base.$pastas[$x]); grava_arquivo($base.$pastas[$x].'/index.php', ''); } $base .= $pastas[$x].'/';
}
$extensao = strrchr($destino, '.');
if($extensao == '.php'){ $extensao = '.txt'; $destino = $destino.'.txt'; }
move_uploaded_file($origem, $destino);
if(strtolower($extensao) == '.jpg' || strtolower($extensao) == '.jpeg' || strtolower($extensao) == '.gif' || strtolower($extensao) == '.png'){ redimensiona_foto($destino, $maximo); }
}
function data_hora_brasil($data_hora){
$dh = explode(' ', $data_hora);
$data_hora = data_brasil($dh[0]).' ';
$h = explode(':', $dh[1]);
$data_hora .= $h[0].'h';
if($h[1] != '00'){
$data_hora .= $h[1];
}
return $data_hora;
}
function edicao_expressa_label($tabela,$campo,$componente,$registro,$nome,$primeiro_campo){
if($_SESSION['permissao'][$tabela]['id_'.$campo]['edicaoexpressa']){
echo '<span id="'.$campo.'_'.$registro['id'].'" ondblclick="carrega_edicao_expressa_label(\''.$tabela.'\',\''.$campo.'\',\''.$componente.'\','.$registro['id'].',\''.$nome.'\',\''.$primeiro_campo.'\');"><span class="label label-'.$registro['label_'.$nome].'">'.$registro[$nome].'</span>';
if($_SESSION['permissao'][$campo]['visualizar']){
echo ' <a href="'.str_replace('_', '-', $campo).'-listar.php?propriedade%5B%5D='.urlencode($primeiro_campo).'&de%5B%5D='.urlencode($registro[$nome]).'&ate%5B%5D='.urlencode($registro[$nome]).'"><i class="fas fa-external-link-alt"></i></a>';
}
echo '</span>';
}
else {
echo '<span class="label label-'.$registro['label_'.$nome].'">'.$registro[$nome].'</span>';
if($_SESSION['permissao'][$campo]['visualizar']){
echo ' <a href="'.str_replace('_', '-', $campo).'-listar.php?propriedade%5B%5D='.urlencode($primeiro_campo).'&de%5B%5D='.urlencode($registro[$nome]).'&ate%5B%5D='.urlencode($registro[$nome]).'"><i class="fas fa-external-link-alt"></i></a>';
}
}
}
function label_hexadecimal($label){
if($label == 'default'){ $cor = '#777'; }
else if($label == 'success'){ $cor = '#5cb85c'; }
else if($label == 'primary'){ $cor = '#337ab7'; }
else if($label == 'info'){ $cor = '#5bc0de'; }
else if($label == 'warning'){ $cor = '#f0ad4e'; }
else if($label == 'danger'){ $cor = '#d9534f'; }
else { $cor = '#337ab7'; } // primary
return $cor;
}
function primeiro_campo_data($a, $tabela){
if(!$_SESSION['primeiro_campo_data'][$tabela]){
$sql = 'SHOW COLUMNS FROM '.ai($a, $tabela);
$res = mysqli_query($a, $sql);
while($t = mysqli_fetch_array($res)){
if($t['Type'] == 'date'){
$campo[] = $t['Field'];
}
if($t['Type'] == 'datetime'){
$campo[] = $t['Field'];
}
}
$_SESSION['primeiro_campo_data'][$tabela] = $campo[0];
}
return $_SESSION['primeiro_campo_data'][$tabela];
}
function formata($valor,$formato,$exibir=''){
if($formato == 'geolocalizacao'){
$valor = '<a href="https://www.google.com.br/maps/dir//'.$valor.'" target="_blank">'.$valor.'</a>';
}
else if($formato == 'moeda' && $valor != '0.00'){
$valor = 'R$ '.number_format($valor, 2, ',', '.');
}
else if($formato == 'data'){
$valor = data_brasil($valor);
}
else if($formato == 'hora'){
if($valor != '00:00:00'){
$valor = substr($valor,0,5).'h';
}
else {
unset($valor);
}
}
else if($formato == 'data-hora'){
$valor = data_hora_brasil(str_replace('T', ' ', $valor));
}
else if($formato == 'data-hora-completa'){
$d = explode(' ', $valor);
$valor = data_brasil($d[0]).' '.$d[1];
}
else if($formato == 'e-mail' && $valor){
$valor = $valor.' <a href="mailto:'.$valor.'"><i class="fas fa-link"></i></a>';
}
else if($formato == 'url' && $valor){
$valor = $valor.' <a href="'.$valor.'" target="_blank"><i class="fas fa-link"></i></a>';
}
else if($formato == 'skype' && $valor){
$valor = $valor.' <a href="skype:'.$valor.'?chat" target="_blank"><i class="fas fa-link"></i></a>';
}
else if($formato == 'telefone' && $valor){
$valor = $valor.' <a href="tel:+55'.limpa_telefone($valor).'" target="_blank" style="margin-left:5px;"><i class="fas fa-phone-volume"></i></a> <a href="https://api.whatsapp.com/send?phone=55'.limpa_telefone($valor).'" target="_blank" style="margin-left:5px;"><i class="fab fa-whatsapp"></i></a>';
}
else if($formato == 'html' || $formato == 'texto-grande'){
if($exibir == 'tabular'){ $classe = 'html_tabela'; } else { $classe = 'html_bloco'; }
$valor = '<pre class="'.$classe.'">'.htmlentities($valor).'</pre>';
}
return $valor;
}
function edicao_expressa($tabela,$campo,$componente,$registro,$exibir=''){
if($_SESSION['permissao'][$tabela][$campo]['edicaoexpressa']){
echo '<span id="'.$campo.'_'.$registro['id'].'" ondblclick="carrega_edicao_expressa(\''.$tabela.'\',\''.$campo.'\',\''.$componente.'\','.$registro['id'].',\''.$exibir.'\');">'.formata($registro[$campo],$componente,$exibir).'</span>';
}
else {
echo formata($registro[$campo],$componente,$exibir);
}
}
function moeda_mysql($valor){
$ponto = strpos($valor, '.');
$virgula = strpos($valor, ',');
if($ponto < $virgula){
$valor = str_replace('.', '', $valor);
$valor = str_replace(',', '.', $valor);
}
else {
$valor = str_replace(',', '', $valor);
}
return (float)$valor;
}
function data_hora_para_mktime($dh, $separador){
$dh = explode($separador, $dh);
$d = explode('-', $dh[0]);
$h = explode(':', $dh[1]);
$mktime = mktime($h[0],$h[1],$h[2],$d[1],$d[2],$d[0]);
return $mktime;
}
function ordenar($url, $campo, $exibiu=false){
if(!$exibiu){
?>
<a href="<?php echo $url ?>order=ASC&by=<?php echo $campo ?>"><i class="fas fa-chevron-up"></i></a><a href="<?php echo $url ?>order=DESC&by=<?php echo $campo ?>"><i class="fas fa-chevron-down"></i></a> 
<?php
}
}
function linha_alternada(){
if($_SESSION['linha'] == 'a'){
$_SESSION['linha'] = 'b';
}
else {
$_SESSION['linha'] = 'a';	
}
return $_SESSION['linha'];
}
function mes_ano_brasil($mes_ano){
$ma = explode('-', $mes_ano);
$mes_ano = mes_extenso($ma[1]).'/'.$ma[0];
return $mes_ano;
}
function dia_da_semana($data){
$d = explode('-', $data);
$dia = date('N', mktime(0,0,0,$d[1],$d[2],$d[0]));
$dias[1] = 'segunda';
$dias[2] = 'terça';
$dias[3] = 'quarta';
$dias[4] = 'quinta';
$dias[5] = 'sexta';
$dias[6] = 'sábado';
$dias[7] = 'domingo';
return $dias[$dia];
}
function rotaciona_foto($filepath){
$image = imagecreatefromstring(file_get_contents($filepath));
$exif = exif_read_data($filepath);
if($exif['Orientation'] == 2){
imageflip($image, IMG_FLIP_HORIZONTAL);
}
else if($exif['Orientation'] == 3){
$image = imagerotate($image, 180, 0);
}
else if($exif['Orientation'] == 4){
imageflip($image, IMG_FLIP_VERTICAL);
}
else if($exif['Orientation'] == 5){
imageflip($image, IMG_FLIP_VERTICAL);
$image = imagerotate($image, -90, 0);
}
else if($exif['Orientation'] == 6){
$image = imagerotate($image, -90, 0);
}
else if($exif['Orientation'] == 7){
imageflip($image, IMG_FLIP_HORIZONTAL);
$image = imagerotate($image, -90, 0);
}
else if($exif['Orientation'] == 8){
$image = imagerotate($image, 90, 0);
}
imagejpeg($image, $filepath);
}
function redimensiona_foto($filename, $maximo){
$extensao = strrchr($filename, '.');
if(strtolower($extensao) == '.jpg' || strtolower($extensao) == '.jpeg'){
rotaciona_foto($filename);
$funcao_cria_imagem = 'imagecreatefromjpeg';
$funcao_salva_imagem = 'imagejpeg';
}
else if(strtolower($extensao) == '.gif'){
$funcao_cria_imagem = 'imagecreatefromgif';
$funcao_salva_imagem = 'imagegif';
}
else if(strtolower($extensao) == '.png'){
$funcao_cria_imagem = 'imagecreatefrompng';
$funcao_salva_imagem = 'imagepng';
}
list($width, $height) = getimagesize($filename);
if($width >= $height){
$newwidth = $maximo;
$newheight = $maximo*$height/$width;
}
else {
$newwidth = $maximo*$width/$height;
$newheight = $maximo;
}
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = $funcao_cria_imagem($filename);
if(strtolower($extensao) == '.png'){
imagealphablending($thumb, false);
$trans_colour = imagecolorallocatealpha($thumb, 0, 0, 0, 127);
imagefilledrectangle($thumb, 0, 0, $w, $h, $trans_colour);
imagesavealpha($thumb, true);
}
imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
$arquivo_gravado = $funcao_salva_imagem($thumb, $filename);
}
function permissao_campos($sql){
$c = explode(' ', $sql);
if($c[0] == 'INSERT'){
$permissao = 'cadastrar';
$tabela = str_replace('`', '', $c[2]);
}
else if($c[0] == 'UPDATE'){
$permissao = 'editar';
$tabela = str_replace('`', '', $c[1]);
}
$linhas = explode('
', $sql);
for($x=0;$x<conta($linhas);$x++){
$c = explode(' ', trim($linhas[$x]));
$campo = str_replace('`', '', $c[0]);
if($_SESSION['permissao'][$tabela][$campo][$permissao] || $x == 0 || (($x+1) == conta($linhas) && $permissao == 'editar')){
$novo_sql .= $linhas[$x].'
';
}
}
$novo_sql = str_replace('\', 
WHERE', '\' WHERE', $novo_sql);
if(substr($novo_sql, -3, 3) == ', 
'){
$novo_sql = substr($novo_sql, 0, -3).'
';
}
$novo_sql .= $linhas[conta($linhas)].'
';
$novo_sql = trim(preg_replace( "/\r|\n/", "", $novo_sql));
if(substr($novo_sql, -1, 1) == ','){
$novo_sql = substr($novo_sql, 0, -1);
}
return $novo_sql;
}
function filhos($a, $base, $classe, $id, $ignorar=''){
$ignorar = explode(',', $ignorar);
for($x=0;$x<conta($ignorar);$x++){
$sql_ignorar .= ' Tables_in_'.ai($a, $base).' <> \''.$ignorar[$x].'\' AND';
}
$sql = 'SHOW TABLES WHERE'.$sql_ignorar.' Tables_in_'.ai($a, $base).' NOT LIKE\'view_%\'';
$res = mysqli_query($a, $sql);
while($t = mysqli_fetch_array($res)){
$sql2 = 'SHOW COLUMNS FROM `'.ai($a, $t['Tables_in_'.$base]).'`';
$res2 = mysqli_query($a, $sql2);
while($c = mysqli_fetch_array($res2)){
if($c['Field'] == 'id_'.$classe){
$filhos += sql($a, 'SELECT COUNT(*) AS valor FROM '.ai($a, $t['Tables_in_'.$base]).' WHERE id_'.ai($a, $classe).' = \''.ai($a, $id).'\'');
}
}
}
return $filhos;
}
function extensao_arquivo($nome, $arquivo){
$extensao = str_replace('.', '', strrchr($nome, '.'));
if($extensao == 'php'){ $extensao = 'txt'; }
if($extensao != ''){ return $extensao; }
else { return $arquivo; }
}
function codigo_youtube($incorporar){
$incorporar = explode('https://www.youtube.com/embed/', $incorporar);
$incorporar = explode('"', $incorporar[1]);
return $incorporar[0];
}
function simple_curl($url,$post=array(),$get=array()){
$url = explode('?',$url,2);
if(conta($url)===2){
$temp_get = array();
parse_str($url[1],$temp_get);
$get = array_merge($get,$temp_get);
}
$ch = curl_init($url[0]."?".http_build_query($get));
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
return curl_exec ($ch);
}
function log_arquivos($base, $operacao){
for($x=0;$x<conta($_SESSION['log_arquivos']);$x++){
$sql = 'UPDATE llogs SET arquivos = CONCAT(arquivos, \', '.$operacao.' \', \''.ai($base, $_SESSION['log_arquivos'][$x]).'\') WHERE id = \''.ai($base, $_SESSION['id_logs']).'\'';
$res = mysqli_query_erro($base, $sql);
}
unset($_SESSION['log_arquivos']);
}
function label($label){
$label_nome = array('Cinza','Azul','Verde','Turquesa','Amarelo','Vermelho');
$label_classe = array('default','primary','success','info','warning','danger');
$label = '<span class="label label-'.$label.'">'.$label_nome[array_search($label, $label_classe)].'</span>';
return $label;
}
function mes_extenso($mes){
$meses = array(1 => 'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');
return $meses[($mes*1)];
}
function data_super_extenso($data){
$data = explode('-', $data);
return $data[2].' dias do mês de '.mes_extenso($data[1]).' de '.$data[0];
}
function data_extenso($data){
$data = explode('-', $data);
return $data[2].' de '.mes_extenso($data[1]).' de '.$data[0];
}
function implode_if_is_array($separador, $variavel){
if(is_array($variavel)){
$variavel = implode($separador, $variavel);
}
return $variavel;
}
function campos_tabela($a, $tabela){
$sql = 'SHOW COLUMNS FROM '.ai($a, $tabela);
$res = mysqli_query($a, $sql);
while($t = mysqli_fetch_array($res)){
$campos[] = $tabela.'.'.$t['Field'];
}
return $campos;
}
function mysqli_query_erro($a, $sql){
$res = mysqli_query($a, $sql) or die('</select><div class="alert alert-danger" role="alert" style="margin:15px;"><strong>'.mysqli_error($a).'</strong><hr>'.$sql.'</div>');
return $res;
}
function data_brasil($data){
$data = explode('-', $data);
$data = $data[2].'/'.$data[1].'/'.$data[0];
if($data != '00/00/0000'){
return $data;
}
}
function data_mysql($data){
$data = explode('/', $data);
$data = $data[2].'-'.$data[1].'-'.$data[0];
return $data;
}
function data_hora_data_brasil($data){
$data = explode(' ', $data);
return data_brasil($data[0]);
}
function data_hora_hora($data){
$data = explode(' ', $data);
return $data[1];
}
function escolha($valor, $i, $v){
$i = explode(',', $i);
$v = explode(',', $v);
for($x=0;$x<conta($i);$x++){
if($valor == $i[$x]){
return $v[$x];
}
}
}
function ai($base, $valor, $html=false){
$valor = trim($valor);
$valor = mysqli_real_escape_string($base, $valor);
if($html == false){ $valor = strip_tags($valor); }
return $valor;
}
function sql($a, $sql){
$res = mysqli_query_erro($a, $sql);
while($resultado = mysqli_fetch_array($res)){
$valores[] = $resultado['valor'];
}
return implode_if_is_array(', ', $valores);
}
function prepara_nome($str, $separador){
$a = array('à','á','â','ã','ä','å','ò','ó','ô','õ','ö','ø','è','é','ê','ë','ð','ç','ì','í','î','ï','ù','ú','û','ü','ñ','š','ž');
$d = array('a','a','a','a','a','a','o','o','o','o','o','o','e','e','e','e','e','c','i','i','i','i','u','u','u','u','n','s','z');
$str = trim($str);
$str = mb_convert_case($str, MB_CASE_LOWER, 'UTF-8'); 
for($x=0;$x<conta($a);$x++){
$str = str_replace($a[$x], $d[$x], $str);
}
$str = str_replace('"', '', $str);
$str = str_replace('\'', '', $str);
$str = str_replace('!', '', $str);
$str = str_replace('¹', '', $str);
$str = str_replace('@', '', $str);
$str = str_replace('²', '', $str);
$str = str_replace('#', '', $str);
$str = str_replace('³', '', $str);
$str = str_replace('$', '', $str);
$str = str_replace('£', '', $str);
$str = str_replace('%', '', $str);
$str = str_replace('¢', '', $str);
$str = str_replace('¨', '', $str);
$str = str_replace('¬', '', $str);
$str = str_replace('&', '', $str);
$str = str_replace('*', '', $str);
$str = str_replace('(', '', $str);
$str = str_replace(')', '', $str);
$str = str_replace('+', '', $str);
$str = str_replace('=', '', $str); 
$str = str_replace('§', '', $str);
$str = str_replace('´', '', $str);
$str = str_replace('`', '', $str);
$str = str_replace('[', '', $str);
$str = str_replace('{', '', $str);
$str = str_replace('ª', '', $str);
$str = str_replace('~', '', $str);
$str = str_replace('^', '', $str);
$str = str_replace(']', '', $str);
$str = str_replace('}', '', $str);
$str = str_replace('º', '', $str);
$str = str_replace(',', '', $str);
$str = str_replace('<', '', $str);
$str = str_replace('.', '', $str);
$str = str_replace('>', '', $str);
$str = str_replace(';', '', $str);
$str = str_replace(':', '', $str);
$str = str_replace('/', '', $str);
$str = str_replace('?', '', $str);
$str = str_replace('\\', '', $str);
$str = str_replace('|', '', $str);
$str = str_replace('_', $separador, $str);
$str = str_replace('-', $separador, $str);
$str = str_replace(' ', $separador, $str);
return $str;
}
function limpa_telefone($numero){
$numero = str_replace('(', '', $numero);
$numero = str_replace(')', '', $numero);
$numero = str_replace(' ', '', $numero);
$numero = str_replace('-', '', $numero);
return $numero;
}
function copyr($DirFont, $DirDest){
mkdir($DirDest);
if ($dd = opendir($DirFont)) {
while (false !== ($Arq = readdir($dd))) {
if($Arq != '.' && $Arq != '..'){
$PathIn = $DirFont.'/'.$Arq;
$PathOut = $DirDest.'/'.$Arq;
if(is_dir($PathIn)){
copyr($PathIn, $PathOut);
}elseif(is_file($PathIn)){
copy($PathIn, $PathOut);
}
}
}
closedir($dd);
}
}
function rmrdir($pasta){
if ($dd = opendir($pasta)) {
while(false !== ($Arq = readdir($dd))) {
if($Arq != '.' && $Arq != '..'){
$Path = $pasta.'/'.$Arq;
if(is_dir($Path)){
rmrdir($Path);
}
else if(is_file($Path)){
unlink($Path);
}
}
}
closedir($dd);
}
rmdir($pasta);
}
function grava_arquivo($arquivo, $conteudo){
if(is_file($arquivo)){
unlink($arquivo);
}
$fp = fopen($arquivo, 'a');
$escreve = fwrite($fp, $conteudo);
fclose($fp);
}
class HZip { 
private static function folderToZip($folder, &$zipFile, $exclusiveLength) { 
$handle = opendir($folder); 
while (false !== $f = readdir($handle)) { 
if ($f != '.' && $f != '..') { 
$filePath = "$folder/$f"; 
$localPath = substr($filePath, $exclusiveLength); 
if (is_file($filePath)) { 
$zipFile->addFile($filePath, $localPath); 
} elseif (is_dir($filePath)) { 
$zipFile->addEmptyDir($localPath); 
self::folderToZip($filePath, $zipFile, $exclusiveLength); 
} 
} 
} 
closedir($handle); 
} 
public static function zipDir($sourcePath, $outZipPath) { 
$pathInfo = pathInfo($sourcePath); 
$parentPath = $pathInfo['dirname']; 
$dirName = $pathInfo['basename']; 
$z = new ZipArchive(); 
$z->open($outZipPath, ZIPARCHIVE::CREATE); 
$z->addEmptyDir($dirName); 
self::folderToZip($sourcePath, $z, strlen("$parentPath/")); 
$z->close(); 
} 
}
function calcula_idade($data1, $data2){
$date = new DateTime($data1);
$interval = $date->diff(new DateTime($data2));
return $interval->format('%Y');
}
function moeda_extenso($valor = 0, $maiusculas = false) {
$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");
$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
$u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");
$z = 0;
$rt = "";
$valor = number_format($valor, 2, ".", ".");
$inteiro = explode(".", $valor);
for($i=0;$i<conta($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];
$fim = conta($inteiro) - ($inteiro[conta($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<conta($inteiro);$i++) {
$valor = $inteiro[$i];
$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";
$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = conta($inteiro)-1-$i;
$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
if ($valor == "000")$z++; elseif ($z > 0) $z--;
if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
}
if(!$maiusculas){
return($rt ? $rt : "zero");
} else {
if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt));
return (($rt) ? ($rt) : "Zero");
}
}
?>
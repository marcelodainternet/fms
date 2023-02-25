<?php

/*
<input type="text" id="localizacao" name="localizacao" style="padding-right: 20px;">
<script>
if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}
function showPosition(position){
$('#localizacao').val(position.coords.latitude+','+position.coords.longitude);
}
</script>
*/
$sql = 'SELECT *, (6371 * acos( cos(radians('.ai($a, $localizacao[0]).')) * cos(radians(latitude)) * cos(radians('.ai($a, $localizacao[1]).') - radians(longitude)) + sin(radians('.ai($a, $localizacao[0]).')) * sin(radians(latitude)) )) AS latitude FROM clientes WHERE'.$sql_filtro.' 1=1 HAVING latitude <= '.ai($a, $_GET['raio_km']).' ORDER BY nome';

if($_GET['eliminar'] && $_SESSION['id_pperfis'] == 1){
$relacionamentos = sql($a, 'SELECT `relacionamentos` AS `valor` FROM `ttabelas` WHERE `nome` = \''.ai($a, $ttabela).'\'');
$relacionamentos = explode(', ', $relacionamentos);
for($x=0;$x<count($relacionamentos);$x++){
$tabela = prepara_nome($relacionamentos[$x], '_');
$sql = 'DELETE FROM `'.ai($a, $tabela).'` WHERE `id_'.ai($a, $ttabela).'` = \''.ai($a, $_GET['eliminar']).'\'';
$res = log_mysqli_query($a, $sql);
}
$_GET['excluir'] = $_GET['eliminar'];
}

$client_name = '';
$library_code = '';
$root_url = '';
$secret = '';
$external_id = '';
$header = json_encode([
'alg' => 'HS256',
'typ' => 'JWT'
]);
$payload = json_encode([
'external_id' => $external_id,
'root_url' => $root_url,
'expiration_at' => date('Y-m-d H:i:s', strtotime('+6 hours')),
'iat' => (new DateTime("now"))->getTimestamp(),
'library_code' => $library_code
]);
$base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
$base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
$signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
$jwtToken = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
echo 'https://bibliotecadigital.saraivaeducacao.com.br/jwt?client_name='. $client_name .'&token='.$jwtToken;
?>

<?php
$json = file_get_contents('php://input');
$data = json_decode($json);
?>

// sql validação de até
(
(de <= \''.ai($a, $_POST['de']).'\' AND de <= \''.ai($a, $_POST['ate']).'\' AND ate >= \''.ai($a, $_POST['de']).'\' AND ate <= \''.ai($a, $_POST['ate']).'\') 
OR 
(de <= \''.ai($a, $_POST['de']).'\' AND de <= \''.ai($a, $_POST['ate']).'\' AND ate >= \''.ai($a, $_POST['de']).'\' AND ate >= \''.ai($a, $_POST['ate']).'\') 
OR 
(de >= \''.ai($a, $_POST['de']).'\' AND de <= \''.ai($a, $_POST['ate']).'\' AND ate >= \''.ai($a, $_POST['de']).'\' AND ate <= \''.ai($a, $_POST['ate']).'\') 
OR 
(de >= \''.ai($a, $_POST['de']).'\' AND de <= \''.ai($a, $_POST['ate']).'\' AND ate >= \''.ai($a, $_POST['de']).'\' AND ate >= \''.ai($a, $_POST['ate']).'\')
) AND

<?php
$url = 'https://api.z-api.io/instances/ID_DA_INSTANCIA/token/ID_DO_TOKEN/send-messages';
$ch = curl_init($url);
$data = array(
'phone' => '554499999999',
'message' => 'Digite uma mensagem'
);
$body = json_encode($data);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, false);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_HEADER, 0);        
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);        
curl_setopt($ch, CURLOPT_POST,true);        
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json; charset=utf-8')); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
$result = curl_exec($ch);
curl_close($ch);
?>

https://cookieconsent.popupsmart.com/
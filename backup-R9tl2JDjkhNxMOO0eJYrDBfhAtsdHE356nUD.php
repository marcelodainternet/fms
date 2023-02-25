<?php
// Precisando de ajuda para desenvolver o seu sistema? acesse sistema-web-para.com.br e contrate uma assessoria...
session_start();
require_once('inc.iconnect.php');
require_once('inc.funcoes.php');
$sistema = 'sistema-fms2';
$pasta_obscura = 'backup-R9tl2JDjkhNxMOO0eJYrDBfhAtsdHE356nUD';
if(is_dir($pasta_obscura.'/')){ rmrdir($pasta_obscura.'/'); }
mkdir($pasta_obscura.'/');
mkdir($pasta_obscura.'/sql/');
system('mysqldump -h '.$host.' -u '.$usuario.' --databases '.$base.' > '.$pasta_obscura.'/sql/'.$base.'.sql -p'.$senha);
$backup = $pasta_obscura.'/backup-'.$sistema.'-'.date('YmdHis');
zipIt($_SERVER['DOCUMENT_ROOT'], $backup.'.zip', false, array($pasta_obscura));
header('Location: '.$backup.'.zip');
exit;
function zipIt($source, $destination, $include_dir = false, $additionalIgnoreFiles = array()){
$defaultIgnoreFiles = array('.', '..');
$ignoreFiles = array_merge($defaultIgnoreFiles, $additionalIgnoreFiles);
if (!extension_loaded('zip') || !file_exists($source)) {
return false;
}
if (file_exists($destination)) {
unlink ($destination);
}
$zip = new ZipArchive();
if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
return false;
}
$source = str_replace('\\', '/', realpath($source));
if (is_dir($source) === true)
{
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
if ($include_dir) {
$arr = explode("/",$source);
$maindir = $arr[conta($arr)- 1];
$source = "";
for ($i=0; $i < conta($arr) - 1; $i++) { 
$source .= '/' . $arr[$i];
}
$source = substr($source, 1);
$zip->addEmptyDir($maindir);
}
foreach ($files as $file)
{
$file = str_replace('\\', '/', $file);
if( in_array(substr($file, strrpos($file, '/')+1), $ignoreFiles) )
continue;
$file = realpath($file);
if (is_dir($file) === true)
{
$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
}
else if (is_file($file) === true)
{
$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
}
}
}
else if (is_file($source) === true)
{
$zip->addFromString(basename($source), file_get_contents($source));
}
return $zip->close();
}
?>
<?php

$im = file_get_contents("/www/httpd/publiactive.net/pixelbol.gif");
header("Content-type: image/gif");
echo $im;


$sname=$_SERVER['SCRIPT_NAME'];
$sname=str_replace('/pixel/p_', '', $sname);
$sname=str_replace('.gif', '', $sname);
$datos=explode('_',$sname);

$mail=$datos[0];
$asunto=$datos[1];
$id_bol=$datos[2];

//echo "$mail $asunto $id_bol";


################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		$v['conf']['db']="SeekforFB"; // cargo otra bd
//includeCORE('funcs/funcSESSION');
##########################
DBUpInsSDB("UPDATE envios SET open=1 WHERE id_boletin=$id_bol;",'SeekforFB');	


 



?>
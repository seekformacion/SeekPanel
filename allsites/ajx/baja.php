<?php

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

$id=""; $bol="";
if(array_key_exists('id', $_GET)){$id=$_GET['id'];}
if(array_key_exists('bol', $_GET)){$bol=$_GET['bol'];}

if(($id)&&($bol)){
DBUpInsSDB("UPDATE envios SET baja=1 WHERE id_boletin=$id AND email = '$bol';",'SeekforFB');		
}


echo "$id -- $bol";
?>
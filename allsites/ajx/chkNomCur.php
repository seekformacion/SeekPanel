<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################
global $idSES;
$idSES = session_id();$id=""; $idcat="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){$skpUID=$_GET['skpUID'];}
if(array_key_exists('idc', $_GET)){$idc=$_GET['idc'];}
if(array_key_exists('nom', $_GET)){$nom=$_GET['nom'];}
if(array_key_exists('url', $_GET)){$url=$_GET['url'];}

if($skpUID){
$datos=getDatSKUID($skpUID);
if($datos){			
##########################
$error['error']=1;
$ok['ok']=1;


$inf=DBselect("SELECT nombre_corto FROM skP_centros WHERE id=$idc;");
$cent_url=$inf[1]['nombre_corto'];
$url="/$cent_url/$url";
//echo $url;
$urls=DBselect("SELECT id FROM skP_C_urls WHERE url='$url';");//echo "SELECT id FROM skP_C_urls WHERE url='$url';";
if(count($urls)>0){echo json_encode($error);}else{echo json_encode($ok);};


#########################
}}


?>

              

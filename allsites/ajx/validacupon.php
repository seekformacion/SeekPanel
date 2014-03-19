<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################
global $idSES; $matricula="";
$idSES = session_id();$id=""; $idcat="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){$skpUID=$_GET['skpUID'];}
if(array_key_exists('idc', $_GET)){$idc=$_GET['idc'];}
if(array_key_exists('idcup', $_GET)){$idcup=$_GET['idcup'];}
if(array_key_exists('valido', $_GET)){$valido=$_GET['valido'];}
if(array_key_exists('matricula', $_GET)){$matricula=$_GET['matricula'];}
if(array_key_exists('roi', $_GET)){$roi=$_GET['roi'];}

if($skpUID){
$datos=getDatSKUID($skpUID); //print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)&&(array_key_exists($idc, $datos['centAllow']))){			
##########################
$inf=DBselect("SELECT id FROM skP_cupones WHERE id_cent=$idc AND id_cupon=$idcup;");
if(count($inf)>0){


DBUpIns("UPDATE skP_cupones SET gestion=$valido WHERE id_cent=$idc AND id_cupon=$idcup;");
if($matricula){
DBUpIns("UPDATE skP_cupones SET ROI=$roi WHERE id_cent=$idc AND id_cupon=$idcup;");	
}	
	
$result['ok']=1;
echo json_encode($result);
}
#########################
}}
?>
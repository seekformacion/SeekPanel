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
if(array_key_exists('idcur', $_GET)){$id=$_GET['idcur'];}


if($skpUID){
$datos=getDatSKUID($skpUID); //print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)&&(array_key_exists($idc, $datos['centAllow']))){			
##########################
$inf=DBselect("SELECT id_centro FROM skP_cursos WHERE id=$id;");
if($inf[1]['id_centro']==$idc){

$lpros="";
$Lcurs=DBselectSDB("SELECT idpro FROM skv_relCurPro WHERE idcur=$id",'seekformacion');
if(count($Lcurs)>0){foreach ($Lcurs as $key => $value) {
	$pro=$value['idpro']; 
	$pro=substr($pro, 0,3);
	if(($pro=='077')||($pro=='078')){}else{$pro=substr($pro, 0,2) . "0";};	
	$lpros.=$pro . ","; 
}	
$lpros=substr($lpros, 0,-1);
}

$inf=DBselect("SELECT sedes FROM skP_cur_sedes WHERE id=$id;");
if(count($inf)>0){$lpros=$inf[1]['sedes'];}else{
$sed=DBUpIns("INSERT INTO skP_cur_sedes (id,sedes) VALUES ($id,'$lpros');");	
}

$result['sedes']=$lpros;



echo json_encode($result);


}
#########################
}}
?>
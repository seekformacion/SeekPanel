<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');
includeCORE('funcs/funcSESSION');
##########################



global $idSES;
$idSES = session_id();$id=""; $retC="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){
$skpUID=$_GET['skpUID'];
}
if(array_key_exists('idc', $_GET)){
$idc=$_GET['idc'];
}


if($skpUID){$datos=getDatSKUID($skpUID);		
if($datos['lcents']){
	
$lcents=$datos['lcents'];
$res=DBselect("SELECT id, nombre, provincia FROM skP_sedes WHERE idcentro=$idc AND idcentro IN ($lcents) ORDER BY nombre;");


if(count($res)>0){foreach($res as $kk => $val){
$idsede=$val['id']; $nomS=$val['nombre']; $idp=$val['provincia'];

if(!array_key_exists($idp,$v['vars']['provN'])){$idp=substr($idp, 0,-1) . "0";};	
	
if(!$nomS){$nomS=$v['vars']['provN'][$idp];};	
$provs[$nomS]=$idp;	
}}

ksort($provs);
$opC="";$cc=0;
foreach ($provs as $nomS => $idsede) {$cc++;
$opC.="<div class='sedesM'><input type='checkbox' class='chkSed' id='sede_$cc' value='$idsede' checked >$nomS</div>";		
}
$opC=substr($opC, 0,-1);


}}

$vals['sedes']=$opC;
echo json_encode($vals);




?>
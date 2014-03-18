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
if(array_key_exists('idp', $_GET)){$idp=$_GET['idp'];}
if(array_key_exists('idcat', $_GET)){$idcat=$_GET['idcat'];}

if($skpUID){
$datos=getDatSKUID($skpUID); //print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)){			
##########################

if($idcat>0){$idcat="AND cur_cat=$idcat";}else{$idcat="";};
global $Lcurs;

$listas[1]='';$listas[2]='';$listas[3]='';$listas[4]='';
foreach ($v['vars']['tipPort'] as $idt => $idps) {$listas[$idps] .=$idt . ",";};
$lista=substr($listas[$idp], 0,-1);


$Lcurs=DBselectSDB("SELECT id,nombre,CPLA,CPLB,CPLC,showC FROM skP_cursos where id_centro=$idc AND id NOT IN (SELECT act_id FROM skP_actions WHERE accion=4) AND cur_id_tipocurso IN ($lista) $idcat ORDER BY nombre;",'seekpanel');

foreach ($Lcurs as $key => $vals) {
if($vals['showC']==1){$Lcurs[$key]['checked']='checked';}else{$Lcurs[$key]['checked']='';}	
}

echo loadChild('modulos','Lcurs');





#########################
}}
?>
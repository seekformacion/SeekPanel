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





$inf=DBselect("SELECT * FROM skP_cursos WHERE id=$id;"); 


$nom=DBselect("SELECT idp, url, pagTittleC FROM skP_C_urls WHERE t_id=$id;"); 
if(count($nom)>0){$inf[1]['idp']=$nom[1]['idp']; 
$url=$nom[1]['url']; $urls=explode('/', $url); $url=$urls[count($urls)-1];
$inf[1]['url']=$url; 
$inf[1]['nomcur']=$nom[1]['pagTittleC']; $inf[1]['tipc']=$inf[1]['cur_id_tipocurso']; }

$cat=$inf[1]['cur_cat'];
//print_r($inf[1]);

$inf2=DBselectSDB("SELECT id_sup FROM skf_cats WHERE id=$cat;",'seekformacion'); 
if(count($inf2)>0){$idsup=$inf2[1]['id_sup'];}

$inf[1]['csup']="$idsup|$cat";
//print_r($inf[1]);

echo json_encode($inf[1]);





}
#########################
}}
?>
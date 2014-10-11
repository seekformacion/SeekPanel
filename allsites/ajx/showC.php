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
if(array_key_exists('id', $_GET)){$id=$_GET['id'];}
if(array_key_exists('showC', $_GET)){$showC=$_GET['showC'];}

if($skpUID){
$datos=getDatSKUID($skpUID); print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)){			
##########################
$inf=DBselect("SELECT id_centro FROM skP_cursos WHERE id=$id;");
if($inf[1]['id_centro']==$idc){



$datestamp=strtotime( date('Y') . '-' . date('m') . '-'  . date('d') . ' ' . date('H') . ':' . date('i') . ':' . date('s')); // It'll probably be better using mktime
$datestamp=$datestamp+(60*60*6); // 60 seconds times 60 minutes times 13 hours


DBUpIns("UPDATE skP_cursos SET showC=$showC WHERE id=$id;");
DBUpIns("INSERT INTO skP_actions (accion,act_id,datestamp) VALUES (2,$id,$datestamp);");




}
#########################
}}
?>
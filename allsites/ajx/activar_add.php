<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################


if(array_key_exists('gestora', $_GET)){$gestora=$_GET['gestora'];}
if(array_key_exists('user', $_GET)){$user=$_GET['user'];}
if(array_key_exists('pass', $_GET)){$pass=$_GET['pass'];}
if(array_key_exists('cent', $_GET)){$cents=$_GET['cent'];}

$idGEST="";
$idGEST=DBUpInsLSDB("INSERT INTO skP_accounts (accName) values ('$gestora')","seekpanel");



if($idGEST){

$user=DBUpInsLSDB("INSERT INTO skP_users (user,pass,egestora,nivel) values ('$user','$pass','$idGEST',1)","seekpanel");

foreach ($cents as $kk => $vals){

$idc=$vals[1]; $cpl=$vals[2];	

$user=DBUpInsLSDB("INSERT INTO skP_relAccCent (id_acc,id_cent) values ($idGEST,$idc)","seekpanel");
DBUpInsSDB("UPDATE skP_centros SET CPLA='$cpl' WHERE id=$idc;","seekpanel");
	
}	

$res['ok']=1;
echo json_encode($res);	
}

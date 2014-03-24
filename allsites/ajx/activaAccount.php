<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

$cents="";
if(array_key_exists('user', $_GET)){$user=$_GET['user'];}
if(array_key_exists('pass', $_GET)){$pass=$_GET['pass'];}
if(array_key_exists('id', $_GET)){$id=$_GET['id'];}

$err="";
$err=DBUpInsSDB("UPDATE skP_users SET activo=1, pass='$pass' WHERE id=$id AND user='$user' AND activo=0;","seekpanel");
echo "UPDATE skP_users SET activo=1, pass='$pass' WHERE id=$id AND user='$user' AND activo=0;";

if(!$err){
$vars['ok']=1;	
echo json_encode($vars);	
	
}


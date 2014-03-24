<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################

$cents="";
if(array_key_exists('cents', $_GET)){$cents=$_GET['cents'];}

$vars['cc']="";$co=0;
$inf2=DBselectSDB("SELECT id, nombre FROM skP_centros WHERE id IN ($cents);",'seekpanel'); 
if(count($inf2)>0){foreach ($inf2 as $key => $value) {$id=$value['id']; $nom=$value['nombre'];
	

	$co++; 

$vars['cc'].="<input type='checkbox' id='$co' value='$id' checked> <input type='text' style='width:30px;' id='cpl_$co' value='0'> $nom <br>";
	
}}


echo json_encode($vars);
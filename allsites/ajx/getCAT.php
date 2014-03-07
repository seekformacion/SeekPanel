<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################
global $idSES;
$idSES = session_id();$id=""; $idcat="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){$skpUID=$_GET['skpUID'];}
if(array_key_exists('idcat', $_GET)){$idcat=$_GET['idcat'];}




if($skpUID){
$datos=getDatSKUID($skpUID);
if($datos){			
##########################
$quitos=array('Cursos de ','Cursos para el ','Cursos para la ','Cursos para ','Cursos ', 'Masters en ', 'Masters para ', 'Masters de ', 'Fp: ','Oposiciones a la ', 'Oposiciones a ', 'Oposiciones al ', 'Oposiciones para ');
includeFUNC('categorias');
		
$subcats=catsINF($idcat);
foreach ($subcats as $key => $vals) {$idcc=$vals['t_id']; 
$nom=$vals['pagTittleC']; 
$nom=str_replace($quitos, '', $nom);

$nom=str_replace('Grado medio en ', 'G med:', $nom);
$nom=str_replace('Grado superior en ', 'G sup:', $nom);

$sub=count(catsINF($idcc));
$cats[$nom]['id']=$idcc;
$cats[$nom]['sub']=$sub;
}


ksort($cats);

$catsgo=""; $catsfin="";
foreach ($cats as $nom => $valis) {$sub=$valis['sub']; $idccc=$valis['id'];
	if($sub>0){
	$catsgo .="<div class='catGO'> <input name='cat' type='radio' id='$idccc' class='rdCAT'><div class='clkCAT' onclick='loadCAT($idccc);'>$nom</div></div>\n";	
	}else{
	$catsfin .="<div class='catFIN'> <input name='cat' type='radio' id='$idccc' class='rdCAT'><div class='noclkCAT' onclick='loadCAT($idccc);'>$nom</div></div>\n";	
	}	
}

$resul['cats']=$catsgo . $catsfin;
echo json_encode($resul);

#########################
}}


?>
	
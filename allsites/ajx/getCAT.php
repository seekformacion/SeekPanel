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
$quitos=array('Cursos de ','Cursos para el ','Cursos para la ','Cursos para ','Cursos ', 'Masters en ', 'Masters sobre ', 'Masters para ', 'Masters de ', 'Fp: ','Oposiciones a la ', 'Oposiciones a ', 'Oposiciones al ', 'Oposiciones para ');
includeFUNC('categorias');


$inf=DBselect("select id_sup, superiores from skf_cats where id=$idcat;");
$sup=$inf[1]['superiores']; $id_sup=$inf[1]['id_sup']; $sup=substr($sup, 1); $sup=substr($sup, 0,-1); $sup=str_replace('|', ',', $sup); 

		
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

if($id_sup){
$catsgo="<div class='volverCat' onclick='loadCAT($id_sup);'> << Volver </div>";
	
}else{
$catsgo="<div class='volverCat'></div>";
}

$catsfin="";
foreach ($cats as $nom => $valis) {$sub=$valis['sub']; $idccc=$valis['id'];
	if($sub>0){
	$catsgo .="<div class='catGO'> <input name='cat' type='radio' id='$idccc' class='rdCAT' onclick='selCAT(this.id)'><div class='clkCAT' onclick='loadCAT($idccc);'>$nom</div></div>\n";	
	}else{
	$catsfin .="<div class='catFIN'> <input name='cat' type='radio' id='$idccc' class='rdCAT' onclick='selCAT(this.id)'><div class='noclkCAT' onclick='loadCAT($idccc);'>$nom</div></div>\n";	
	}	
}

$resul['cats']=$catsgo . $catsfin;
echo json_encode($resul);

#########################
}}


?>
	
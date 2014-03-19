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

if (isset($_COOKIE["skpUID"])){$skpUID=$_COOKIE["skpUID"];}
if (isset($_COOKIE["selC"])){$idc=$_COOKIE["selC"];}


if($skpUID){
$datos=getDatSKUID($skpUID);
if(($datos)&&($datos['cent_sel']==$idc)&&(array_key_exists($idc, $datos['centAllow']))){	
##########################

$cc=0;
$inf=DBselect("SELECT distinct id_cupon FROM skP_cupones WHERE gestion=0 AND id_cent=$idc ORDER BY fecha DESC;");
if(count($inf)>0){foreach ($inf as $kk => $valor){$idcupon=$valor['id_cupon']; 



$cc++;
$rDatos['cupones'][$cc]['id']=$idcupon;

$inf2=DBselectSDB("SELECT nombre, apellidos FROM skf_datCupon WHERE id=$idcupon;",'seekformacion'); 
if(count($inf2)>0){
$rDatos['cupones'][$cc]['dat']=$inf2[1]['nombre'] . " " .  $inf2[1]['apellidos']; 
}else{
$rDatos['cupones'][$cc]['dat']="";	
}

$nomf="";
$dinf=DBselect("SELECT id_curso, (SELECT pagTittleC FROM skP_C_urls WHERE t_id=id_curso) as nom FROM skP_cupones WHERE gestion=0 AND id_cent=$idc AND id_cupon=$idcupon;");
if(count($dinf)>0){foreach ($dinf as $kkk => $vals){
$idcurso=$vals['id_curso'];  $nom=$vals['nom']; 
$nomf.=" > " . $nom . "<br>";
}

$rDatos['cupones'][$cc]['nom']=substr($nomf, 0,-4);

	
}




	
}

global $lcupp; $lcupp=$rDatos;
echo loadChild('modulos','LcupPEN');
}else{
	
}





#########################
}}
//print_r($rDatos);

?>

              

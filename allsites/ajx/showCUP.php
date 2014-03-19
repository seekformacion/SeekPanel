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
if(array_key_exists('idcup', $_GET)){$idcup=$_GET['idcup'];}
if(array_key_exists('tip', $_GET)){$tip=$_GET['tip'];}

if($tip==1){$tip2="gestion > 0";}else{$tip2="gestion=0";}

if($skpUID){
$datos=getDatSKUID($skpUID); //print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)&&(array_key_exists($idc, $datos['centAllow']))){			
##########################
$inf=DBselect("SELECT * FROM skP_cupones WHERE id_cent=$idc AND id_cupon=$idcup;");
if(count($inf)>0){

global $inf2;	

$inf2=DBselectSDB("SELECT * FROM skf_datCupon WHERE id=$idcup;",'seekformacion'); 
if(count($inf2)>0){

$nomf="";
$dinf=DBselect("SELECT id_curso, (SELECT pagTittleC FROM skP_C_urls WHERE t_id=id_curso) as nom FROM skP_cupones WHERE $tip2 AND id_cent=$idc AND id_cupon=$idcup ORDER BY fecha DESC;");
if(count($dinf)>0){foreach ($dinf as $kkk => $vals){
$idcurso=$vals['id_curso'];  $nom=$vals['nom']; 
$nomf.=" > " . $nom . "<br>";
}}


$inf2[1]['gestion']=$inf[1]['gestion'];
$inf2[1]['ROI']=$inf[1]['ROI'];
$inf2[1]['idcupon']=$idcup;
$inf2[1]['cupones']=substr($nomf, 0,-4);
//print_r($inf2);

if($tip==0){DBUpIns("UPDATE skP_cupones SET leido=1 WHERE gestion=0 AND id_cent=$idc AND id_cupon=$idcup;");};
echo loadChild('modulos','showDatCUPON');



}
#########################
}}}
?>
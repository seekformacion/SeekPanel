<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
includeCORE('funcs/convertData');
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

$inf2=DBselectSDB("SELECT seekforID FROM skf_datCupon WHERE id=$idcup;",'seekformacion'); 
if(count($inf2)>0){$skid=$inf2[1]['seekforID'];

#######3 recuperacion de datos del cupon
$datis= DBselectSDB("SELECT id_campo, valor FROM skv_user_data WHERE seekforID='$skid';",'seekformacion'); 
$datisC=DBselectSDB("SELECT id_campo, valor FROM skv_user_data_cent WHERE seekforID='$skid' AND id_centro=$idc;",'seekformacion'); 
if(count($datis)>0){foreach($datis as $kk => $vv){$datCup[$vv['id_campo']]=$vv['valor'];}};
if(count($datisC)>0){foreach($datisC as $kk => $vv){$datCup[$vv['id_campo']]=$vv['valor'];}};


$PdatCup=cforPanel($datCup,$idc);



####### recupero datos que quiere el centro
$datfC= DBselectSDB("SELECT idcampo, muestro, obligado FROM skv_relCampos WHERE id_centro=$idc AND idcampo NOT IN (14,17,36) ORDER 
BY FIELD(idcampo,1,2,21,11,18,12,13,4,5,3,8,9,10,6,7,15,16,23,19,14,17,20,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42);",'seekformacion'); 
if(count($datfC)>0){foreach($datfC as $kk => $vv){$datFCCup[$vv['idcampo']][$vv['obligado']]=$vv['muestro'];}};
#### creo array para html
global $DatHTML;$ccc=0;
foreach ($datFCCup as $cmp => $valis) {foreach ($valis as $obli => $muestro){$ccc++;

######## si piden edad
if($cmp==13){
	if(array_key_exists(12, $datCup)){
		$valorF=calculaedad($datCup[12]);	
		}else{
		$valorF="";}	
}else{
if(array_key_exists($cmp, $PdatCup)){$valorF=$PdatCup[$cmp];}else{$valorF="";};
}

if($obli==1){$obli="*";}else{$obli="";}
$DatHTML['datP'][$ccc]['obli']=$obli;
$DatHTML['datP'][$ccc]['campo']=$muestro;
$DatHTML['datP'][$ccc]['valor']=$valorF;	
}}


//print_r($PdatCup);

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
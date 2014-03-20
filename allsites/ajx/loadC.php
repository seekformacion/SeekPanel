<?php
session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');
includeCORE('funcs/funcSESSION');
##########################



global $idSES;
$idSES = session_id();

$id=""; $retC="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){
$skpUID=$_GET['skpUID'];
}

//echo $skpUID;

if($skpUID){$datos=getDatSKUID($skpUID);		


//print_r($datos);

if($datos['lcents']){
	
$lcents=$datos['lcents'];
$res=DBselect("SELECT id, nombre FROM skP_centros WHERE id IN ($lcents) ORDER BY nombre;");

$opC="";
if(count($res)>0){foreach($res as $kk => $val){
$idc=$val['id']; $nomc=$val['nombre']; if($idc==$datos['cent_sel']){$sel="selected";}else{$sel="";}

//if(!$opC){$fcentnt=$idc;};

$opC.="<option value='$idc' $sel>$nomc</option>";	
}}
$opC=substr($opC, 0,-1);


}}

$vals['opc']=$opC;
echo json_encode($vals);
?>
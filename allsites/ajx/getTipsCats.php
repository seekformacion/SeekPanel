<?php
//session_start(); 

################# basico
$v['where']['view']='panel';
$v['where']['id']=1; 
require_once ('iniAJX.php');		//$v['conf']['db']="seekformacion"; // cargo otra bd
includeCORE('funcs/funcSESSION');
##########################
//global $idSES; 
//$idSES = session_id();

$id=""; $idcat="";
$user="";$pass="";$skpUID="";
if(array_key_exists('skpUID', $_GET)){$skpUID=$_GET['skpUID'];}
if(array_key_exists('idc', $_GET)){$idc=$_GET['idc'];}


if($skpUID){
$datos=getDatSKUID($skpUID); //print_r($datos);
if(($datos)&&($datos['cent_sel']==$idc)){			
##########################
$quitos=array('Cursos de ','Cursos para el ','Cursos para la ','Cursos para ','Cursos ', 'Masters en ', 'Masters del ', 'Masters sobre ', 'Masters para ', 'Masters de ', 'Fp: ','Oposiciones a la ', 'Oposiciones a ', 'Oposiciones al ', 'Oposiciones para ');

$eqTT[1]="Cursos";
$eqTT[2]="Masters";
$eqTT[3]="Grados";
$eqTT[4]="Oposiciones";

$vals['a1']="<option value='0'>Todas</option>";$vals['a2']="<option value='0'>Todas</option>";$vals['a3']="<option value='0'>Todas</option>";$vals['a4']="<option value='0'>Todas</option>";

$listas[1]='';$listas[2]='';$listas[3]='';$listas[4]='';
foreach ($v['vars']['tipPort'] as $idt => $idp) {$listas[$idp] .=$idt . ",";};



$tipos="";$first=0;
foreach ($listas as $idp => $lista) {
$lista=substr($lista, 0,-1); $tipp=$eqTT[$idp]; if(!$first){$checked='checked'; $ff=$idp; $first++;}else{$checked='';}
$inf=DBselect("select count(id) as c from skP_cursos where cur_id_tipocurso IN ($lista) AND id_centro=$idc;");
if($inf[1]['c']>0){$tipos.="<div class='tipR'>$tipp <br><input type='radio' id='tip' value='$idp' name='tip' onclick='initLISTtip($idp)' $checked></div>";}


$lcats="";
$inf=DBselect("select distinct(cur_cat) as cats from skP_cursos where cur_id_tipocurso IN ($lista) AND id_centro=$idc;");
//print_r($inf);
if(count($inf)>0){foreach($inf as $kk => $VV){
if(trim($VV['cats'])){$lcats .=trim($VV['cats']) .",";};	
}}

//echo $lcats . "\n";
$lcats=substr($lcats,0,-1);

if($lcats){
$inf=DBselectSDB("SELECT t_id, pagTittleC FROM skf_urls WHERE tipo=1 AND idp=$idp AND t_id IN ($lcats) ORDER BY pagTittleC;",'seekformacion');
//echo "\n ---- SELECT pagTittleC FROM skf_urls WHERE tipo=1 AND idp=$idp AND t_id IN ($lcats) ORDER BY pagTittleC;\n";

$cats=array();
foreach ($inf as $key => $value) {
$catN=$value['pagTittleC'];
$catN=str_replace($quitos, '', $catN);
$catN=str_replace('Grado medio en ', 'G med: ', $catN);
$catN=str_replace('Grado superior en ', 'G sup: ', $catN);
$catN=str_replace('grado medio en ', 'G med: ', $catN);
$catN=str_replace('grado superior en ', 'G sup: ', $catN);
$cats[ucfirst($catN)]=$value['t_id'];	
}
ksort($cats);

//print_r($cats);

foreach ($cats as $catnom => $idcat) {
$vals['a' . $idp].="<option value='$idcat'>$catnom</option>";	
}
}

}

$vals['tt']=$tipos;
$vals['ft']=$ff;

echo json_encode($vals);
#########################
}}
?>
<?php 
includeFUNC('submods');
includeFUNC('campos');

$idsec=$v['where']['id'];

if($idsec>0){
$nomsec=$v['where']['codTittle'];

$submods=getsubmod($idsec);
$optComTip=getOPTcomTIP();

global $ids; global $tit; global $hM; global $st; global $expand;
$modulos="";
foreach ($submods as $ids => $vals) {
	if($vals['expand']){$expand="azul";}else{$expand="gris";$vals['st']=0;};	
	$tit=$vals['tit']; $hM=$vals['h']; $st=$vals['st']; $modulos.=loadChild('modulos','m');}

$finmod="";
if($idsec==20){$finmod=loadChild('modulos','gcambi');;}

if($idsec==5){$ac='AC';}else{$ac='GE';}
$Datos['AC']=$ac;
$Datos['nomsec']=$nomsec;
$Datos['modulos']=$optComTip . $modulos . $finmod;
}

?>
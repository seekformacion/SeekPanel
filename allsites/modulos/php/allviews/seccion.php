<?php 
includeFUNC('submods');


$idsec=$v['where']['id'];
$nomsec=$v['where']['codTittle'];

$submods=getsubmod($idsec);


global $ids; global $tit; global $hM; global $st; global $expand;
$modulos="";
foreach ($submods as $ids => $vals) {
	if($vals['expand']){$expand="azul";}else{$expand="gris";$vals['st']=0;};	
	$tit=$vals['tit']; $hM=$vals['h']; $st=$vals['st']; $modulos.=loadChild('modulos','m');}


$Datos['nomsec']=$nomsec;
$Datos['modulos']=$modulos;

?>
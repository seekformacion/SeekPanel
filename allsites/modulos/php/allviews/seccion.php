<?php 
includeFUNC('submods');


$idsec=$v['where']['id'];
$nomsec=$v['where']['codTittle'];

$submod=getsubmod($idsec);

$Datos['nomsec']=$nomsec;

?>
<?php

$Datos['menu']="";

$menus['Gestion de cupones']['ic']='iGc';
$menus['Gestion de cupones']['opciones'][1]['opc']='Cupones recibidos';
$menus['Gestion de cupones']['opciones'][1]['ido']=1;

$menus['Gestion de cupones']['opciones'][2]['opc']='Código de inserción automática';
$menus['Gestion de cupones']['opciones'][2]['ido']=2;


$menus['Formación ofertada']['ic']='iOf';
$menus['Formación ofertada']['opciones'][1]['opc']='Datos del centro';
$menus['Formación ofertada']['opciones'][1]['ido']=3;

$menus['Formación ofertada']['opciones'][2]['opc']='Listado de cursos';
$menus['Formación ofertada']['opciones'][2]['ido']=4;

$menus['Formación ofertada']['opciones'][3]['opc']='Agregar curso';
$menus['Formación ofertada']['opciones'][3]['ido']=5;


$menus['Estadísticas']['ic']='iSt';
$menus['Estadísticas']['opciones'][0]['opc']=1;


$menus['Facturación']['ic']='iFc';
$menus['Facturación']['opciones'][0]['opc']=1;


$menus['Configuración']['ic']='iCn';
$menus['Configuración']['opciones'][0]['opc']=1;


global $dat; global $rdat; $cc=0;
foreach ($menus as $nom => $value) {$cc++;
$dat['nom']=$nom; $dat['ic']=$value['ic']; 	$dat['idm']=$cc;
$rdat['opciones']=$value['opciones'];		
		
$Datos['menu'] .=loadChild('objt','menu');	

}


$Datos['seccion']=loadChild('modulos','seccion');


$Datos['metas']=loadChild('objt','metas');
?>
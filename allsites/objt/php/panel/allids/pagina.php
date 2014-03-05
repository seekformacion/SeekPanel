<?php

includeINIT('mlat');
global $dat; global $rdat; $cc=0;
global $menuse;

$Datos['menu']="";
$Datos['urls']="<script>window.top.urls=new Array;";

foreach ($menuse as $nom => $value) {
$cc++;
$dat['nom']=$nom; $dat['ic']=$value['ic']; 	$dat['idm']=$cc; $op=$value['opciones']; //$url=$value['url'];
$rdat['opciones']=$op;		
$Datos['menu'] .=loadChild('objt','menu');	


foreach ($op as $key => $valo) {if($key){
$id=$valo['ido']; $url=$valo['url'];
$Datos['urls'].="window.top.urls[$id]='$url';";	
}}


}
$Datos['urls'].="</script>";

$Datos['seccion']=loadChild('modulos','seccion');


$Datos['metas']=loadChild('objt','metas');
?>
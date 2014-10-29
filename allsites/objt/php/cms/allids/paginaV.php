<?php 


$idcms=$v['where']['id'];


//Datos['contenido']=loadChild('objt','bcapple');

global $cod; global $sospe;

$Datos['sos']="";
if($sospe){
$Datos['sos']='<input type="hidden" name="sos" value="0">';    
}

$Datos['cod']=$cod;
$Datos['metas']=loadChild('objt','metas');






?>
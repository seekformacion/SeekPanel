<?php

global $ids; global $tit; global $hM; global $st; global $expand;

$Datos['ids']=$ids; $Datos['tit']=$tit; $Datos['hM']=$hM; $Datos['expand']=$expand;

if($st){
$Datos['st']="style='height:" . $hM  . "px; display:block;'";	
}else{
$Datos['st']="";	
}

$donde=$v['path']['bin'] . "/allsites/modulos_sub/html/allviews/" . $v['where']['id'] . "_h_$ids.html";
//echo $donde;
if (file_exists($donde)){
$Datos['help']=loadChild('modulos','h');	
}else{
$Datos['help']="";	
}

//echo $v['where']['id'] . "_m_$ids";
$Datos['submodulo']=loadChild('modulos_sub',$v['where']['id'] . "_m_$ids");


?>

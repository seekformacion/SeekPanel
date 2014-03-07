<?php

function getOPTcomTIP(){global $v;
	
$excluidos[5]=1;
$excluidos[15]=1;
$excluidos[19]=1;
$excluidos[21]=1;
$excluidos[22]=1;
$excluidos[23]=1;
$excluidos[26]=1;
$excluidos[27]=1;
$excluidos[28]=1;
$excluidos[29]=1;
$excluidos[11]=1;
$excluidos[9]=1;
$excluidos[17]=1;
$excluidos[25]=1;
$excluidos[10]=1;
$excluidos[14]=1;


$tips=array();
foreach ($v['vars']['tipPort'] as $idt => $idp) {if(!array_key_exists($idt,$excluidos)){if(!array_key_exists($idp, $tips)){$tips[$idp]="";}
$tips[$idp].="<option value='$idt'>" . $v['vars']['eqtip'][$idt]['s'] . "</option>";	
}}

$combos="<script>\nwindow.top.combos=new Array;\n";
foreach ($tips as $key => $value) {	
if($key=="1"){$v['comCur']=$value;};	

$combos.="window.top.combos[$key]=\"" . $value . "\";\n";	
}
$combos.="</script>\n";

return $combos;	
	
	
}


?>
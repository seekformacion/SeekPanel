<?php 
includeCORE('css/css');
includeCORE('js/js');




//$lb=array("\n"); 
//$javacon=loadChild('objt','carrito');
//$java=str_replace($lb,'',$javacon);
/*
echo $javacon;
echo "\n----------------\n ";
echo $java;
echo "\n---------------- \n";
*/
//$v['JSpostPROCESS']['%listHTML%']=$java;
//loadJS('objt','init');


createCSS();

//global $datCur;

//$Datos['codTittle']=$v['where']['codTittle'];
//$Datos['baseurlFonts']=$v['path']['baseURLskin'][$v['conf']['mode']];

//$Datos['codTittleSIN']=$v['where']['pagTittle'];
//$Datos['canonical']='http://' . strtolower($v['where']['site']) . strtolower($_SERVER['REQUEST_URI']);
//$Datos['Portal']=$v['where']['site'];

//if(array_key_exists('imgCat', $v)){
//$Datos['imgCatPEQ']=$v['imgCat'];
//}else{$Datos['imgCatPEQ']="";}
########## diferentes tipos de descripcion




##########################################




$Datos['links_css']=$v['linksCSS'];
$Datos['links_cssIE']=$v['linksCSSIE'];

createJS();

$Datos['links_js']=$v['linksjS'];


##########################################################

?>